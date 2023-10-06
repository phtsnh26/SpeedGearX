<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('personnels')->delete();
        DB::table('personnels')->truncate();
        DB::table('personnels')->insert([
            [
                'ho_va_ten' => "Phan Công Tánh",
                'ten_dang_nhap' => 'tanhdeptrai',
                'email' => 'ptoilatanh@gmail.com',
                'password' => bcrypt('123456'),
                'dia_chi' => "dô da cư",
                'ngay_sinh' => '2002-02-21',
                'gioi_tinh' => 'Nữ',
                'so_dien_thoai' => "0123123123",
                'cccd' => "321321213321",
                'anh_minh_chung' => "https://pbs.twimg.com/media/EYVxlOSXsAExOpX.jpg",
                'tinh_trang' => 1,
                'id_phan_quyen' => 1,
            ],
            [
                'ho_va_ten' => "Võ Minh Quân",
                'ten_dang_nhap' => 'minhquan123',
                'email' => 'quanvo@gmail.com',
                'password' => bcrypt('123456'),
                'dia_chi' => "dô da cư",
                'ngay_sinh' => '2002-02-21',
                'gioi_tinh' => 'Nam',
                'so_dien_thoai' => "0706085418",
                'cccd' => "321321213321",
                'anh_minh_chung' => "https://upload.wikimedia.org/wikipedia/commons/f/fb/Bojan-avatar.jpg",
                'tinh_trang' => 1,
                'id_phan_quyen' => 2,
            ],
        ]);
    }
}
