<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\LienHe;
use App\Models\SanPham;
use App\Models\TinTuc;
use App\ShoppingCart\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    function index()
    {
        $sanphammoi = SanPham::orderByDesc('id')->get();
        return view('welcome', compact('sanphammoi'));
    }

    function product()
    {
        $sanpham = SanPham::all();
        return view('sanpham', compact('sanpham'));
    }
    function product_detail($id = null)
    {
        $product = SanPham::findOrFail($id);
        $related_product = SanPham::where('danhmuc_id', $product->danhmuc_id)->orderBy('gia', 'asc')->get();
        return view('chitietsanpham', compact('product', 'related_product'));
    }
    function cart()
    {
        return view('giohang');
    }
    function checkout()
    {
        return view('thanhtoan');
    }
    function store_checkout(Request $request, Cart $cart)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'ten' => 'required',
            'dienthoai' => 'required',
            'diachi' => 'required',
            'tinh' => 'required',
            'huyen' => 'required',
            'xa' => 'required'
        ];
        $messages = [
            'ten' => 'Tên',
            'dienthoai' => 'Điện thoại',
            'diachi' => 'Địa chỉ',
            'tinh' => 'Tỉnh',
            'huyen' => 'Huyện',
            'xa' => 'Xã'
        ];

        $this->customValidate($data, $rules, $messages);

        $data['tongtien'] = $cart->get_total_price();
        $data['khachhang_id'] = Auth::guard('khachhang')->user()->id;

        if (count($cart->items) > 0) {
            $donhang = DonHang::create($data);
            foreach ($cart->items as $item) {
                $item = [
                    'sanpham_id' => $item['id'],
                    'donhang_id' => $donhang->id,
                    'soluong' => $item['quantity'],
                    'gia' => $item['gia']
                ];
                ChiTietDonHang::create($item);
            }
            $cart->removeAll();
            return back()->with('message', 'Đơn hàng đã được đặt thành công!');
        }
    }
    function search(Request $request)
    {
        $key = $request->key;
        $result = SanPham::where('tensanpham', 'like', '%' . $key . '%')->orderByDesc('id')->get();
        return view('timkiem', compact('result'));
    }
    function product_category($id = null)
    {
        $sanpham = SanPham::where('danhmuc_id', $id)->orderByDesc('id')->get();
        return view('danhmucsanpham', compact('sanpham'));
    }
    function news()
    {
        $tintuc = TinTuc::all();
        return view('tintuc', compact('tintuc'));
    }
    function new_detail($id = null)
    {
        $tintuc = TinTuc::findOrFail($id);
        return view('chitiettintuc', compact('tintuc'));
    }
    function contact()
    {
        return view('lienhe');
    }
    function store_contact(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'hoten' => 'required',
            'email' => 'required|email',
            'noidung' => 'required'
        ];
        $messages = [
            'hoten' => 'Họ tên',
            'email' => 'Email',
            'noidung' => 'Nội dung'
        ];
        $this->customValidate($data, $rules, $messages);
        $data['khachhang_id'] = Auth::guard('khachhang')->user()->id;
        if (LienHe::create($data)) {
            return back()->with('message', 'Cảm ơn bạn đã liên hệ!');
        }
    }
}
