<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clients')->delete();

        DB::table('clients')->truncate();

        DB::table('clients')->insert([
            [
                'email' => 'phtsnh26@gmail.com',
                'ho_va_ten' => 'Phan Tánh',
                'ten_dang_nhap' => 'tanhdeptrai',
                'password' => bcrypt('123123'),
                'dia_chi' => 'Đà Nẵng',
                'ngay_sinh' => '2002-02-12',
                'so_dien_thoai' => '1231231231',
                'is_active' => 1,
            ],
        ]);
    }
}
