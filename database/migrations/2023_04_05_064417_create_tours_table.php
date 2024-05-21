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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('tenTour');
            $table->string('hinh_anh');
            $table->text('moTa');
            $table->dateTime('thoiGianBatDau');
            $table->dateTime('thoiGianKetThuc');
            $table->integer('gia');
            $table->integer('trangThai');
            $table->string('diemDon');
            $table->unsignedBigInteger('idDiaDiem');
            $table->timestamps();

            $table->foreign('idDiaDiem')->references('id')->on('diadiems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
