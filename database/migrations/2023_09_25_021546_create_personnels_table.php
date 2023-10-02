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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->string('ten_dang_nhap');
            $table->string('email');
            $table->string('password');
            $table->string('dia_chi');
            $table->date('ngay_sinh');
            $table->string('gioi_tinh');
            $table->string('so_dien_thoai');
            $table->string('cccd')->nullable();
            $table->string('anh_minh_chung');
            $table->integer('tinh_trang');
            $table->integer('id_phan_quyen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
