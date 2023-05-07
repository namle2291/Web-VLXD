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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('tensanpham')->nullable();
            $table->string('hinhanh')->nullable();
            $table->integer('gia')->nullable();
            $table->text('mota')->nullable();
            $table->tinyInteger('trangthai')->nullable();

            $table->bigInteger('danhmuc_id')->unsigned()->nullable();
            $table->foreign('danhmuc_id')->references('id')->on('danh_mucs');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
