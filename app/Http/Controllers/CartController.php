<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use App\ShoppingCart\Cart;

class CartController extends Controller
{
    function add(Request $request, Cart $cart, $id)
    {
        $quantity = 1;
        if ($request->quantity) {
            $quantity = $request->quantity;
        }
        $sanpham = SanPham::findOrFail($id);
        $cart->add($sanpham, $quantity);
        return back();
    }

    function update(Cart $cart, Request $request, $id)
    {
        $quantity = $request->quantity;
        $cart->update($id, $quantity);
        return back();
    }

    function delete(Cart $cart, $id = null)
    {
        $cart->delete($id);
        return back();
    }

    function removeAll(Cart $cart)
    {
        $cart->removeAll();
        return back();
    }
}