<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->delete();

        DB::table('admins')->truncate();

        DB::table('admins')->insert([
            [
                'ho_va_ten'         => 'Phan Tánh',
                'hinh_anh'          => 'https://pbs.twimg.com/media/EYVxlOSXsAExOpX.jpg',
                'ten_dang_nhap'     => 'admin',
                'email'             => 'admin@master.com',
                'so_dien_thoai'     => '1231231231',
                'dia_chi'           => 'Đà Nẵng',
                'password'          => bcrypt('123456'),
                'is_active'         => 1,
                'hash_reset'        => '',
                'id_rule'           => 0,
            ],
        ]);
    }
}
