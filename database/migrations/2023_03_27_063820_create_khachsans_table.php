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
        Schema::create('khachsans', function (Blueprint $table) {
            $table->id();
            $table->string('tenKhachSan');
            $table->string('slug');
            $table->string('diaChi');
            $table->string('hinh_anh');
            $table->text('moTa');
            $table->integer('loaiPhong');
            $table->integer('soGiuong');
            $table->integer('soNgay');
            $table->integer('soDem');
            $table->integer('gia');
            $table->string('lienLac',10);
            $table->string('trangThai');
            $table->string('khach_hang_yeu_thich')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khachsans');
    }
};
