<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory; protected $guarded = [];
    
    public function donhang(){
        return $this->hasOne(DonHang::class, 'id', 'donhang_id');
    }
}
