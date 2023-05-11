<?php

namespace App\ShoppingCart;

class Cart
{
    public $items = [];
    public $total_price = 0;
    public $total_quantity = 0;
    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_price = $this->get_total_quantity();
    }
    public function add($product, $quantity = 1)
    {

        $item = [
            'id'=>$product->id,
            'tensanpham' => $product->tensanpham,
            'hinhanh' => $product->hinhanh,
            'gia' => $product->gia,
            'mota' => $product->mota,
            'danhmuc'=>$product->danhmuc->tendanhmuc,
            'quantity' => $quantity
        ];

        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += 1;
        } else {
            $this->items[$product->id] = $item;
        }
        session(['cart' => $this->items]);
    }
    public function update($id, $quantity)
    {
        $this->items[$id]['quantity'] = $quantity;
        session(['cart'=>$this->items]);
    }
    public function delete($id)
    {
        unset($this->items[$id]);
        session(['cart'=>$this->items]);
    }
    public function removeAll()
    {
        session(['cart'=>[]]);
    }

    public function get_total_price()
    {
        $sum = 0;

        foreach($this->items as $item){
            $sum += $item['quantity'] * $item['gia'];
        }

        return $sum;
    }

    public function get_total_quantity()
    {
        return count($this->items);
    }
    
    public function format_price($number){
        return number_format($number, 0, ',', '.') . "đ";
    }
}
