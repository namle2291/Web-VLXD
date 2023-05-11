<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TinTucController extends Controller
{
    function index()
    {
        $tintuc = TinTuc::all();
        return view('admin.tintuc.danhsach', compact('tintuc'));
    }
    function create()
    {
        return view('admin.tintuc.them');
    }
    function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'tieude' => 'required',
            'hinhanh' => 'required',
            'mota' => 'required',
            'noidung' => 'required'
        ];
        $messages = [
            'tieude' => 'Tiêu đề',
            'hinhanh' => 'Hình ảnh',
            'mota' => 'Mô tả',
            'noidung' => 'Nội dung'
        ];

        $this->customValidate($data, $rules, $messages);
        $data['hinhanh'] = $this->uploadFile($request->hinhanh, 'tintuc');

        $data['user_id'] = Auth::user()->id;

        $tintuc = TinTuc::updateOrCreate($data);
        $tintuc->save();

        return redirect(route('admin.tintuc'));
    }
}
