<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListPermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('list_permisions')->delete();

        DB::table('list_permisions')->truncate();

        DB::table('list_permisions')->insert([
            [
                'ten_hanh_dong' => "Quản Lý Xe",
                'tinh_trang' => 1,
            ],
            [
                'ten_hanh_dong' => "Quản Lý Nhân Sự",
                'tinh_trang' => 1,
            ],
            [
                'ten_hanh_dong' => "Quản Lý Thương Hiệu",
                'tinh_trang' => 1,
            ],
            [
                'ten_hanh_dong' => "Quản Lý Kho",
                'tinh_trang' => 1,
            ],
            [
                'ten_hanh_dong' => "Quản Lý Đơn Hàng",
                'tinh_trang' => 1,
            ],
            [
                'ten_hanh_dong' => "Quản Lý Người Dùng",
                'tinh_trang' => 1,
            ],
            [
                'ten_hanh_dong' => "Quản Lý Phân Quyền",
                'tinh_trang' => 1,
            ],
        ]);
    }
}
