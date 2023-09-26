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
        Schema::create('temporary_ware_houses', function (Blueprint $table) {
            $table->id();
            $table->integer('id_xe');
            $table->integer('so_luong')->default(1);
            $table->double('don_gia')->default(0);
            $table->double('thanh_tien')->default(0);
            $table->string('ghi_chu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_ware_houses');
    }
};
