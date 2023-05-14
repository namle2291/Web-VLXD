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
    // Manager
    function index()
    {
        $khachhang = KhachHang::orderByDesc('id')->get();
        return view('admin.khachhang.danhsach', compact('khachhang'));
    }
    function createOrUpdate($id = null)
    {
        $khachhang_edit = null;
        if ($id) {
            $khachhang_edit = KhachHang::find($id);
        }
        return view('admin.khachhang.themsua', compact('khachhang_edit'));
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'ten' => 'required|min:3',
            'email' => $id ? '' : 'required|email|unique:khach_hangs',
            'dienthoai' => 'required',
            'diachi' => 'required',
            'password' => !$id ? 'required|min:6' : '',
            'confirm_password' => !$id ? 'required|same:password' : 'same:password'
        ];
        $messages = [
            'ten' => 'Họ tên',
            'email' => 'Email',
            'dienthoai' => 'Điện thoại',
            'diachi' => 'Địa chỉ',
            'password' => 'Mật khẩu',
            'confirm_password' => 'Nhập lại mật khẩu'
        ];

        $this->customValidate($data, $rules, $messages);

        if ($id) {
            // has password
            if ($request->password && $request->confirm_password) {
                $data['password'] = Hash::make($data['password']);
            } else { // null password
                $data['password'] = KhachHang::find($id)->password;
            }
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        unset($data['confirm_password']);

        $khachhang = KhachHang::updateOrCreate(['id' => $id], $data);
        $khachhang->save();

        return redirect(route('admin.khachhang'));
    }
    function delete($id = null)
    {
        KhachHang::destroy($id);
        return back();
    }
}
