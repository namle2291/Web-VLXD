<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory; protected $guarded = [];
    
    public function chitietdonhang(){
        return $this->hasMany(ChiTietDonHang::class, 'donhang_id', 'id');
    }
    public function khachhang(){
        return $this->hasOne(KhachHang::class, 'id', 'khachhang_id');
    }
}
