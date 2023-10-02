<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('permisions')->delete();
        DB::table('permisions')->truncate();
        DB::table('permisions')->insert([
            [
                'ten_quyen' => "Giám Đốc"
            ],
            [
                'ten_quyen' => "Trợ lý lao công"
            ],
        ]);
    }
}
