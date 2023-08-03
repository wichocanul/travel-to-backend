<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('places')->insert([
            'name' => "Festival de la luz y la vida",
            'description' => "Evento en la laguna del pueblo",
            'coordinates' => json_encode(['lat' => 40.7128, 'lng' => -74.0060]),
            'images' => json_encode(['img1.jpg', 'img2.jpg']),
            'type' => 2,
            'nameEvent' => 'Festival de la luz y la vida',
            'dayEvent' => '2023-08-03',
            'hourEvent' => '18:30',
        ]);
        DB::table('places')->insert([
            'name' => "Hotel 9 manantiales",
            'description' => "Hotel 5 estrellas",
            'coordinates' => json_encode(['lat' => 40.7128, 'lng' => -74.0060]),
            'images' => json_encode(['img1.jpg', 'img2.jpg']),
            'type' => 3,
            'nameEvent' => 'pool party',
            'dayEvent' => '2023-08-03',
            'hourEvent' => '22:30',
        ]);
        DB::table('places')->insert([
            'name' => "Rincon Mexicano",
            'description' => "Disfruta de la mejor comida mexicana",
            'coordinates' => json_encode(['lat' => 40.7128, 'lng' => -74.0060]),
            'images' => json_encode(['img1.jpg', 'img2.jpg']),
            'type' => 4,
            'nameEvent' => 'Musica en vivo',
            'dayEvent' => '2023-08-03',
            'hourEvent' => '14:00',
        ]);
    }
}
