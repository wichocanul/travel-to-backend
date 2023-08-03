<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Create seeder:
// php artisan make:seeder CategoriesSeeder

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => "Turismo"
        ]);
        DB::table('categories')->insert([
            'name' => "Eventos"
        ]);
        DB::table('categories')->insert([
            'name' => "Hoteles"
        ]);
        DB::table('categories')->insert([
            'name' => "Restaurantes"
        ]);
    }
}
