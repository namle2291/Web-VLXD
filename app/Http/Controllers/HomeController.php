<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    function index()
    {
        $sanphammoi = SanPham::orderByDesc('id')->get();
        return view('welcome', compact('sanphammoi'));
    }
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

        $khachhang = KhachHang::updateOrCreate($data);
        $khachhang->save();

        return redirect(route('khachhang.dangnhap'));
    }
    function logout(Request $request)
    {
        Auth::guard('khachhang')->logout();
        $request->session()->regenerateToken();
        return back();
    }
    function product(){
        $sanpham = SanPham::all();
        return view('sanpham',compact('sanpham'));
    }
    function cart(){
        return view('giohang');
    }
    function checkout(){
        return view('thanhtoan');
    }
    function search(Request $request){

        $key = $request->key;
        
        $result = SanPham::where('tensanpham', 'like', '%' . $key . '%')->orderByDesc('id')->get();

        return view('timkiem', compact('result'));
    }
    function product_category($id=null){
        $sanpham = SanPham::where('danhmuc_id',$id)->orderByDesc('id')->get();
        return view('danhmucsanpham',compact('sanpham'));
    }
    function news(){
        return view('tintuc');
    }
    function contact(){
        return view('lienhe');
    }
}
