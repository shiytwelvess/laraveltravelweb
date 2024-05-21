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
        Schema::create('danhgiatours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idHDTour');
            $table->integer('diemDanhGia');
            $table->string('noiDung');
            $table->timestamps();

            $table->foreign('idHDTour')->references('id')->on('hoadontours');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhgiatours');
    }
};
