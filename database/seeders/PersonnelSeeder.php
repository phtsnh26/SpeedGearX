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
                'ho_va_ten' => "Lê Công Anh",
                'ten_dang_nhap' => 'conganh212',
                'email' => 'conganh2122003@gmail.com',
                'password' => bcrypt('123456'),
                'dia_chi' => "dô da cư",
                'ngay_sinh' => '2003-02-21',
                'gioi_tinh' => 'Nam',
                'so_dien_thoai' => "0706085418",
                'cccd' => "321321213321",
                'anh_minh_chung' => "https://ict-imgs.vgcloud.vn/2020/09/01/19/huong-dan-tao-facebook-avatar.jpg",
                'tinh_trang' => 1,
                'id_phan_quyen' => 1,
            ],
            [
                'ho_va_ten' => "Phan Công Cong",
                'ten_dang_nhap' => 'congcong123',
                'email' => 'tanhphan@gmail.com',
                'password' => bcrypt('123456'),
                'dia_chi' => "dô da cư",
                'ngay_sinh' => '2002-02-21',
                'gioi_tinh' => 'Nam',
                'so_dien_thoai' => "0706085418",
                'cccd' => "321321213321",
                'anh_minh_chung' => "https://ict-imgs.vgcloud.vn/2020/09/01/19/huong-dan-tao-facebook-avatar.jpg",
                'tinh_trang' => 1,
                'id_phan_quyen' => 2,
            ],
        ]);
    }
}
