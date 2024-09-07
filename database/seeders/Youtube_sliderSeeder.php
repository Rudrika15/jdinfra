<?php

namespace Database\Seeders;

use App\Models\Youtube_slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Youtube_sliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Youtube_slider::create([
        'youtubeurl' => 'https://youtu.be/6MZGqy3y6g0?si=CJoflUQq9WfOAT6y',
       ]);
    }
}
