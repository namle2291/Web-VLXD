<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index($id = null)
    {
        $banner_edit = null;
        if ($id) {
            $banner_edit = Banner::find($id);
        }
        $banner = Banner::all();
        return view('admin.banner.danhsach', compact('banner', 'banner_edit'));
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $this->customValidate($data, [
            'hinhanh' => 'required|file'
        ], [
            'hinhanh' => 'Hình ảnh'
        ]);

        if ($request->file('hinhanh')) {
            $file = $request->hinhanh;
            $filename = $file->hashName();
            $file->storeAs('/public/banner', $filename);
            $data['hinhanh'] = $filename;
        }

        $banner = Banner::updateOrCreate(['id' => $id], $data);
        $banner->save();

        return back();
    }
    function destroy($id = null)
    {
        Banner::destroy($id);
        return back();
    }
}
