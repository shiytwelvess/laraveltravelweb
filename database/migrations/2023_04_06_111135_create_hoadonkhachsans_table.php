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
        Schema::create('hoadonkhachsans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idKhachSan');
            $table->unsignedBigInteger('idCustomer');
            $table->string('hoTen');
            $table->string('email');
            $table->string('soDienThoai',10);
            $table->string('diaChi');
            $table->integer('soPhong');
            $table->integer('tongTien');
            $table->integer('trangThai')->default(0);
            $table->timestamps();

            $table->foreign('idKhachSan')->references('id')->on('khachsans');
            $table->foreign('idCustomer')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoadonkhachsans');
    }
};
