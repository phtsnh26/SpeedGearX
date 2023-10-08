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
                'dia_chi' => "Đà Nẵng",
                'ngay_sinh' => '2002-02-21',
                'gioi_tinh' => 'Nam',
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
                'dia_chi' => "Đà Nẵng",
                'ngay_sinh' => '2002-02-21',
                'gioi_tinh' => 'Nữ',
                'so_dien_thoai' => "0706085418",
                'cccd' => "321321213321",
                'anh_minh_chung' => "https://3.bp.blogspot.com/-vufFZu5Q6-s/WQrdE20X1eI/AAAAAAAACUM/qOvhpDZwjY4wxKAGiFKuVv6Rn7mASBMGQCLcB/s1600/phim-xi-trum-ngoi-lang-ki-bi-1.jpg",
                'tinh_trang' => 1,
                'id_phan_quyen' => 0,
            ],
            [
                'ho_va_ten' => "Phạm Ngọc Sang",
                'ten_dang_nhap' => 'sangtute',
                'email' => 'Sangtute4@gmail.com',
                'password' => bcrypt('123456'),
                'dia_chi' => "Đà Nẵng",
                'ngay_sinh' => '2002-02-21',
                'gioi_tinh' => 'Nam',
                'so_dien_thoai' => "0903245678",
                'cccd' => "321321213321",
                'anh_minh_chung' => "https://toquoc.mediacdn.vn/thumb_w/640/280518851207290880/2022/12/15/p0dnxrcv-16710704848821827978943.jpg",
                'tinh_trang' => 1,
                'id_phan_quyen' => 0,
            ],
            [
                'ho_va_ten' => "Nguyễn Bảo Hưng",
                'ten_dang_nhap' => 'hungnhutnhat',
                'email' => 'nbhungdcvc@gmail.com',
                'password' => bcrypt('123456'),
                'dia_chi' => "Đà Nẵng",
                'ngay_sinh' => '2002-02-21',
                'gioi_tinh' => 'Nam',
                'so_dien_thoai' => "0904573521",
                'cccd' => "321321213321",
                'anh_minh_chung' => "https://ecdn.game4v.com/g4v-content/uploads/2022/09/01082309/Gojo-Satoru-2-game4v-1661995388-35.jpg",
                'tinh_trang' => 1,
                'id_phan_quyen' => 0,
            ],
            [
                'ho_va_ten' => "Lê Tôm",
                'ten_dang_nhap' => 'tomngusi',
                'email' => 'conganh2122003@gmail.com',
                'password' => bcrypt('123456'),
                'dia_chi' => "Đà Nẵng",
                'ngay_sinh' => '2002-02-21',
                'gioi_tinh' => 'Nam',
                'so_dien_thoai' => "0904573521",
                'cccd' => "321321213321",
                'anh_minh_chung' => "https://i.pinimg.com/736x/b6/7c/ac/b67cac539e88419a68ed070b579af91c.jpg",
                'tinh_trang' => 1,
                'id_phan_quyen' => 0,
            ],
        ]);
    }
}
