<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->delete();
        DB::table('brands')->truncate();
        DB::table('brands')->insert([
            [
                'ten_thuong_hieu' => 'Roll Royce',
                'slug_thuong_hieu' => 'roll-royce',
                'tinh_trang' => 0,
                'hinh_anh' => 'https://brademar.com/wp-content/uploads/2022/05/Rolls-Royce-Logo-PNG-1.png',
            ],
            [
                'ten_thuong_hieu' => 'BMW',
                'slug_thuong_hieu' => 'bmw',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/BMW.svg/2048px-BMW.svg.png',
            ],
            [
                'ten_thuong_hieu' => 'Mercedes',
                'slug_thuong_hieu' => 'mercedes',
                'tinh_trang' => 0,
                'hinh_anh' => 'https://choxe.vn/blog/wp-content/uploads/2019/01/Mercedes-Benz.png',
            ],
            [
                'ten_thuong_hieu' => 'Ferrari',
                'slug_thuong_hieu' => 'ferrari',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://www.freeiconspng.com/thumbs/ferrari-logo-icon-png/ferrari-logo-icon-png-0.png',
            ],
            [
                'ten_thuong_hieu' => 'Lamborghini',
                'slug_thuong_hieu' => 'lamborghini',
                'tinh_trang' => 1,
                'hinh_anh' => 'https://1000logos.net/wp-content/uploads/2018/03/Lamborghini-logo.png',
            ],



        ]);
    }
}
