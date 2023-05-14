<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function dashboard()
    {
        return view('admin.dashboard');
    }
    function login()
    {
        if (Auth::user()) {
            return redirect(route('dashboard'));
        }
        return view('admin.login');
    }
    function register()
    {
        return view('admin.register');
    }
    function store_register(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'name' => 'min:3|string',
            'email' => 'email',
            'password' => 'min:5',
            'confirm_password' => 'min:5|same:password'
        ];
        $message = [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'confirm_password' => 'Nhập lại mật khẩu'
        ];
        $this->customValidate($data, $rules, $message);

        $data['password'] = Hash::make($request->password);
        unset($data['confirm_password']);

        $user = User::updateOrCreate($data);
        $user->save();

        return redirect(route('admin.login'));
    }
    function store_login(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $this->customValidate($data, [
            'email' => 'email',
            'password' => 'min:5'
        ], [
            'email' => 'Email',
            'password' => 'Mật khẩu'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect(route('dashboard'));
        }
        return back();
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();
        return redirect(route('admin.login'));
    }

    function info()
    {
        $user = Auth::user();
        return view('admin.info', compact('user'));
    }
}
