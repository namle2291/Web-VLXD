<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SanPham extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function danhmuc(): BelongsTo
    {
        return $this->BelongsTo(DanhMuc::class);
    }
}
