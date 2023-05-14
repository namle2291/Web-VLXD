<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
        $nhanvien = User::all();
        return view('admin.nhanvien.danhsach', compact('nhanvien'));
    }
    function createOrUpdate($id = null)
    {
        $nhanvien_edit = null;
        if ($id) {
            $nhanvien_edit = User::findOrFail($id);
        }
        return view('admin.nhanvien.themsua', compact('nhanvien_edit'));
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);
        // Update
        if ($id) {
            // has password
            if ($request->password && $request->confirm_password) {
                $data['password'] = Hash::make($data['password']);
            } else { // null password
                $data['password'] = User::find($id)->password;
            }
        } else { // Add
            $this->customValidate($data, [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password'
            ], [
                'name' => 'Họ tên',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'confirm_password' => 'Nhập lại mật khẩu'
            ]);
            $data['password'] = Hash::make($data['password']);
        }

        unset($data['confirm_password']);

        $nhanvien = User::updateOrCreate(['id' => $id], $data);
        $nhanvien->save();

        return back();
    }
    function delete($id = null)
    {
        User::destroy($id);
        return back();
    }
}
