<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    function index()
    {
        $donhang = DonHang::orderByDesc('id')->get();
        return view('admin.donhang.danhsach', compact('donhang'));
    }
    function update($id = null)
    {
        $donhang_edit = DonHang::findOrFail($id);
        return view('admin.donhang.sua', compact('donhang_edit'));
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $donhang = DonHang::updateOrCreate(['id' => $id], $data);
        $donhang->save();

        return redirect(route('admin.donhang'));
    }
    function detail($id = null)
    {
        $donhang_id = $id;
        $ctdh = ChiTietDonHang::where('donhang_id', $id)->get();
        return view('admin.donhang.chitiet', compact(['ctdh', 'donhang_id']));
    }
    function delete($id = null)
    {
        $donhang = DonHang::find($id);
        if ($donhang->chitietdonhang) {
            foreach ($donhang->chitietdonhang as $item) {
                ChiTietDonHang::destroy($item->id);
            }
            DonHang::destroy($id);
        }
        return back();
    }
    function delete_ctdh($id = null)
    {
        ChiTietDonHang::destroy($id);
        return back();
    }
    function print_order($id = null)
    {
        $ctdh = ChiTietDonHang::where('donhang_id', $id)->get();

        $pdf = Pdf::loadView('pdf.order', [
            'ctdh' => $ctdh
        ]);

        return $pdf->stream();
    }
}
