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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('ma_hoa_don');
            $table->double('thanh_tien');
            $table->dateTime('ngay_dat');
            $table->dateTime('ngay_tra');
            $table->dateTime('ngay_nhan_xe');
            $table->text('ghi_chu')->nullable();
            $table->integer('tinh_trang')->default(0);
            $table->integer('id_khach_hang');
            $table->integer('id_hop_dong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
