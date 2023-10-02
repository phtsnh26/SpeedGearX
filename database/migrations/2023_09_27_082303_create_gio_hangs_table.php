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
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_xe');
            $table->integer('so_luong');
            $table->dateTime('ngay_dat');
            $table->dateTime('ngay_tra');
            $table->double('tong_tien');
            $table->double('tien_coc')->nullable();
            $table->integer('id_khach_hang');
            $table->integer('id_xe');
            $table->integer('id_thue_xe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gio_hangs');
    }
};
