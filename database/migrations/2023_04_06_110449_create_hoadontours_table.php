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
        Schema::create('hoadontours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idTour');
            $table->unsignedBigInteger('idCustomer');
            $table->string('hoTen');
            $table->string('email');
            $table->string('soDienThoai',10);
            $table->string('diaChi');
            $table->integer('soVe');
            $table->integer('tongTien');
            $table->integer('trangThai')->default(0);
            $table->timestamps();

            $table->foreign('idTour')->references('id')->on('tours');
            $table->foreign('idCustomer')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoadontours');
    }
};
