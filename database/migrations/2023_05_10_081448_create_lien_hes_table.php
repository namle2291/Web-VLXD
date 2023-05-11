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
        Schema::create('lien_hes', function (Blueprint $table) {
            $table->id();
            $table->string('hoten')->nullable();
            $table->string('dienthoai')->nullable();
            $table->string('email')->nullable();
            $table->text('noidung')->nullable();
            $table->unsignedBigInteger('khachhang_id');
            $table->foreign('khachhang_id')->references('id')->on('khach_hangs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lien_hes');
    }
};
