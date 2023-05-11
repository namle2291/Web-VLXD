<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('dienthoai');
            $table->string('diachi');
            $table->string('tinh');
            $table->string('huyen');
            $table->string('xa');
            $table->integer('tongtien');
            $table->bigInteger('khachhang_id')->unsigned();
            $table->foreign('khachhang_id')->references('id')->on('khach_hangs');
            $table->timestamps();
        });
        
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->integer('soluong');
            $table->integer('gia');
            $table->bigInteger('donhang_id')->unsigned();
            $table->foreign('donhang_id')->references('id')->on('don_hangs');
            $table->bigInteger('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('san_phams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
