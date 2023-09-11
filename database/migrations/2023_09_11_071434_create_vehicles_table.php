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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('ten_xe');
            $table->string('slug_xe');
            $table->string('mo_ta_ngan')->nullable();
            $table->string('mo_ta_chi_tiet')->nullable();
            $table->integer('gia_theo_gio')->nullable();
            $table->integer('gia_theo_ngay')->nullable();
            $table->integer('so_luong')->default(1);
            $table->integer('tinh_trang')->default(1);
            $table->integer('id_thuong_hieu');
            $table->integer('id_loai_xe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
