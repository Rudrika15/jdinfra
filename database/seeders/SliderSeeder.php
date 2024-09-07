<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     Slider::create([
        'title' => 'slider 1',
        'subtitle' => 'slider 1',
        'navigation' => 'slider 1',
        'imageurl' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FImage&psig=AOvVaw1Pvl33ntV-yKf5awBd-LIL&ust=1703767780959000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNi7l93Tr4MDFQAAAAAdAAAAABAJ',
        'order' => '1'
     ]);
    }
}
