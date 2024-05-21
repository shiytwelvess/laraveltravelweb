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
        Schema::create('diadiems', function (Blueprint $table) {
            $table->id();
            $table->string('tenDiaDiem');
            $table->string('diaChi');
            $table->string('hinh_anh');
            $table->text('moTa');
            $table->string('lienLac');
            $table->integer('trangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diadiems');
    }
};
