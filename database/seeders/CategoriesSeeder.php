<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'slug' => 'teknologi',
                'category' => 'Teknologi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'lifestyle',
                'category' => 'Lifestyle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'bisnis',
                'category' => 'Bisnis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
