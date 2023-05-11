<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index()
    {
        $sanpham = SanPham::orderByDesc('id')->get();
        return view('admin.sanpham.danhsach', compact('sanpham'));
    }
    function createOrUpdate($id = null)
    {
        $sanpham_edit = null;
        if ($id) {
            $sanpham_edit = SanPham::findOrFail($id);
        }
        $danhmuc = DanhMuc::all();
        return view('admin.sanpham.them', compact('danhmuc', 'sanpham_edit'));
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'tensanpham' => 'required',
            'gia' => 'required|numeric|max:99999999|min:0',
            'mota' => 'required',
            'danhmuc_id' => 'required',
        ];
        $messages = [
            'tensanpham' => 'Tên sản phẩm',
            'gia' => 'Giá',
            'mota' => 'Mô tả',
            'danhmuc_id' => 'Danh mục',
        ];

        $this->customValidate($data, $rules, $messages);


        if ($request->hasFile('hinhanh')) {
            $file = $request->hinhanh;
            $filename = $file->hashName();
            $file->storeAs('/public/sanpham', $filename);
            $data['hinhanh'] = $filename;
        }

        $sanpham = SanPham::updateOrCreate(['id' => $id], $data);
        $sanpham->save();

        return back();
    }
    function destroy($id)
    {
        SanPham::destroy($id);
        return back();
    }
}
