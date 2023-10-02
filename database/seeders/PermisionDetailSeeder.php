<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permision_details')->delete();
        DB::table('permision_details')->truncate();
        DB::table('permision_details')->insert([
            [
                "id_quyen" => 1,
                "id_hanh_dong" => 1,
            ],
            [
                "id_quyen" => 1,
                "id_hanh_dong" => 2,
            ],
            [
                "id_quyen" => 1,
                "id_hanh_dong" => 3,
            ],
            [
                "id_quyen" => 1,
                "id_hanh_dong" => 4,
            ],
            [
                "id_quyen" => 1,
                "id_hanh_dong" => 5,
            ],
            [
                "id_quyen" => 1,
                "id_hanh_dong" => 6,
            ],
            [
                "id_quyen" => 1,
                "id_hanh_dong" => 7,
            ],
        ]);
    }
}
