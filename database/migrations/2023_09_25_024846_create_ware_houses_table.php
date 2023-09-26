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
        Schema::create('ware_houses', function (Blueprint $table) {
            $table->id();
            $table->string('ma_nhap');
            $table->dateTime('ngay_nhap');
            $table->string('ten_xe');
            $table->integer('so_luong');
            $table->double('don_gia');
            $table->double('thanh_tien');
            $table->text('ghi_chu')->nullable();
            $table->integer('id_xe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ware_houses');
    }
};
