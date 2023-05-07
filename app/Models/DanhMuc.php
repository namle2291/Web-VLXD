<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DanhMuc extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function sanpham()
    {
        return $this->HasMany(SanPham::class, 'danhmuc_id', 'id');
    }
}
