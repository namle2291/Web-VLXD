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
    function createOrUpdate($id = null)
    {
        $tintuc_edit = null;
        if($id){
            $tintuc_edit = TinTuc::findOrFail($id);
        }
        return view('admin.tintuc.themsua',compact('tintuc_edit'));
    }
    function store(Request $request, $id=null)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'tieude' => 'required',
            'hinhanh' => $id ? '' : 'required',
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

        if($request->hinhanh){
            $data['hinhanh'] = $this->uploadFile($request->hinhanh, 'tintuc');
        }

        $data['user_id'] = Auth::user()->id;

        $tintuc = TinTuc::updateOrCreate(['id'=>$id],$data);
        $tintuc->save();

        return redirect(route('admin.tintuc'));
    }
}
