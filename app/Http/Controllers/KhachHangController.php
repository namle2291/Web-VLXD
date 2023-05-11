<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KhachHangController extends Controller
{
    function login()
    {
        return view('khachhang.dangnhap');
    }
    function store_login(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $this->customValidate($data, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ], [
            'email' => 'Email',
            'password' => 'Mật khẩu'
        ]);

        if (Auth::guard('khachhang')->attempt($data)) {
            $request->session()->regenerate();
            return redirect(route('trangchu'));
        }

        return back();
    }
    function register()
    {
        return view('khachhang.dangky');
    }
    function store_register(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'ten' => 'required|min:3',
            'email' => 'required|email',
            'dienthoai' => 'required',
            'password' => 'required|min:5',
            'nhaplaimatkhau' => 'required|same:password|min:5'
        ];
        $messages = [
            'ten' => 'Họ tên',
            'email' => 'Email',
            'dienthoai' => 'Điện thoại',
            'password' => 'Mật khẩu',
            'nhaplaimatkhau' => 'Nhập lại mật khẩu'
        ];

        $this->customValidate($data, $rules, $messages);

        $data['password'] = Hash::make($request->password);
        $data['anhdaidien'] = 'default.png';
        unset($data['nhaplaimatkhau']);

        $khachhang = KhachHang::create($data);
        $khachhang->save();

        return redirect(route('khachhang.dangnhap'));
    }
    function logout(Request $request)
    {
        Auth::guard('khachhang')->logout();
        $request->session()->regenerateToken();
        return redirect(route('trangchu'));
    }
    function info()
    {
        $account = null;
        $order = null;
        if (Auth::guard('khachhang')) {
            $account = Auth::guard('khachhang')->user();
            $order = DonHang::where('khachhang_id', $account->id)->orderByDesc('id')->get();
        }
        return view('taikhoan', compact('account', 'order'));
    }
    function store_info(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        if ($request->anhdaidien) {
            $file = $request->anhdaidien;
            $filename = $file->hashName();
            $file->storeAs('/public/avatar', $filename);
            $data['anhdaidien'] = $filename;
        }

        $id = Auth::guard('khachhang')->user()->id;
        $khachhang = KhachHang::findOrFail($id);
        $khachhang->update($data);
        $khachhang->save();

        return back()->with('message', 'Cập nhật thông tin thành công!');
    }
}
