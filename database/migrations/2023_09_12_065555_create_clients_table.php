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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('ho_va_ten');
            $table->string('ten_dang_nhap');
            $table->string('password');
            $table->string('dia_chi');
            $table->date('ngay_sinh');
            $table->string('gioi_tinh')->nullable();
            $table->string('so_dien_thoai');
            $table->string('cccd')->nullable();
            $table->string('bang_lai_xe')->nullable();
            $table->integer('tinh_trang')->default(1);
            $table->integer('is_active')->default(0);
            $table->string('hash_reset')->nullable();
            $table->string('hash_active')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
