<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('images')->delete();
        DB::table('images')->truncate();
        DB::table('images')->insert([
            [
                'hinh_anh_xe' => '/image/fr488_1.jpg',
                'id_xe' => 1,
            ],
            [
                'hinh_anh_xe' => '/image/fr488_2.jpg',
                'id_xe' => 1,
            ],
            [
                'hinh_anh_xe' => '/image/fr488_3.jpg',
                'id_xe' => 1,
            ],
            [
                'hinh_anh_xe' => '/image/frsf_1.jpg',
                'id_xe' => 2,
            ],
            [
                'hinh_anh_xe' => '/image/frsf_2.jpg',
                'id_xe' => 2,
            ],
            [
                'hinh_anh_xe' => '/image/frsf_3.jpg',
                'id_xe' => 2,
            ],
            [
                'hinh_anh_xe' => '/image/frp_1.jpg',
                'id_xe' => 3,
            ],
            [
                'hinh_anh_xe' => '/image/frp_2.jpg',
                'id_xe' => 3,
            ],
            [
                'hinh_anh_xe' => '/image/frp_3.jpg',
                'id_xe' => 3,
            ],
            [
                'hinh_anh_xe' => '/image/la_1.jpg',
                'id_xe' => 4,
            ],
            [
                'hinh_anh_xe' => '/image/la_2.jpg',
                'id_xe' => 4,
            ],
            [
                'hinh_anh_xe' => '/image/la_3.jpg',
                'id_xe' => 4,
            ],
            [
                'hinh_anh_xe' => '/image/lh_1.jpg',
                'id_xe' => 5,
            ],
            [
                'hinh_anh_xe' => '/image/lh_2.jpg',
                'id_xe' => 5,
            ],
            [
                'hinh_anh_xe' => '/image/lh_3.jpg',
                'id_xe' => 5,
            ],
            [
                'hinh_anh_xe' => '/image/ms_1.jpg',
                'id_xe' => 6,
            ],
            [
                'hinh_anh_xe' => '/image/ms_2.jpg',
                'id_xe' => 6,
            ],
            [
                'hinh_anh_xe' => '/image/ms_3.jpg',
                'id_xe' => 6,
            ],
            [
                'hinh_anh_xe' => '/image/mc_1.jpg',
                'id_xe' => 7,
            ],
            [
                'hinh_anh_xe' => '/image/mc_2.jpg',
                'id_xe' => 7,
            ],
            [
                'hinh_anh_xe' => '/image/mc_3.jpg',
                'id_xe' => 7,
            ],
            [
                'hinh_anh_xe' => '/image/bm51.jpg',
                'id_xe' => 8,
            ],
            [
                'hinh_anh_xe' => '/image/bm52.jpg',
                'id_xe' => 8,
            ],
            [
                'hinh_anh_xe' => '/image/bm53.jpg',
                'id_xe' => 8,
            ],
            [
                'hinh_anh_xe' => '/image/bx51.jpg',
                'id_xe' => 9,
            ],
            [
                'hinh_anh_xe' => '/image/bx52.jpg',
                'id_xe' => 9,
            ],
            [
                'hinh_anh_xe' => '/image/bx53.jpg',
                'id_xe' => 9,
            ],
            [
                'hinh_anh_xe' => '/image/rrc1.jpg',
                'id_xe' => 10,
            ],
            [
                'hinh_anh_xe' => '/image/rrc2.jpg',
                'id_xe' => 10,
            ],
            [
                'hinh_anh_xe' => '/image/rrc3.jpg',
                'id_xe' => 10,
            ],
            [
                'hinh_anh_xe' => '/image/rrp1.jpg',
                'id_xe' => 11,
            ],
            [
                'hinh_anh_xe' => '/image/rrp2.jpg',
                'id_xe' => 11,
            ],
            [
                'hinh_anh_xe' => '/image/rrp3.jpg',
                'id_xe' => 11,
            ],
        ]);
    }
}
