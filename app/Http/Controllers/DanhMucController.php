<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class DanhMucController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    function index($id = null)
    {
        $danhmuc_edit = null;
        if ($id) {
            $danhmuc_edit = DanhMuc::findOrFail($id);
        }
        $danhmuc = DanhMuc::orderByDesc('id')->get();
        return view('admin.danhmuc.danhsach', compact('danhmuc', 'danhmuc_edit'));
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $this->customValidate($data, [
            'tendanhmuc' => 'required|min:3'
        ], [
            'tendanhmuc' => 'Tên danh mục'
        ]);

        if ($request->hasFile('hinhanh')) {
            $file = $request->hinhanh;
            $filename = $file->hashName();
            $file->storeAs('/public/danhmuc', $filename);
            $data['hinhanh'] = $filename;
        }

        DanhMuc::updateOrCreate(['id' => $id], $data);
        return back();
    }
    function destroy($id)
    {
        DanhMuc::destroy($id);
        return back();
    }
}
