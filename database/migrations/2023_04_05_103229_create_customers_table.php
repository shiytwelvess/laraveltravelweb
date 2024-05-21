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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('hoTen');
            $table->text('soDienThoai',10);
            $table->string('diaChi');
            $table->string('email');
            $table->string('password');
            $table->date('ngaySinh');
            $table->integer('gioiTinh');
            // $table->unsignedBigInteger('idUser');
            // $table->foreign('idUser')->references('id')->on('users');
            $table->integer('trangThai')->default(0);
            $table->string('hash_reset')->nullable();
            $table->string('hash_mail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
