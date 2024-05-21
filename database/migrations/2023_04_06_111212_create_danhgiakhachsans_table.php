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
        Schema::create('danhgiakhachsans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idHDKhachSan');
            $table->integer('diemDanhGia');
            $table->string('noiDung');
            $table->timestamps();

            $table->foreign('idHDKhachSan')->references('id')->on('hoadonkhachsans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhgiakhachsans');
    }
};
