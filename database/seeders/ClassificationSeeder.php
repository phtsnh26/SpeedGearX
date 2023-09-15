<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classifications')->delete();
        DB::table('classifications')->truncate();
        DB::table('classifications')->insert([
            [
                'so_cho_ngoi' => 2,
            ],
            [
                'so_cho_ngoi' => 7,
            ],
            [
                'so_cho_ngoi' => 5,
            ],

        ]);
    }
}
