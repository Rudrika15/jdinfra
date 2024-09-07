<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //SliderSeeder::class,
            //TopbarSeeder::class,
            // ProjectSeeder::class,
            // SectormasterSeeder::class,
            // PlotmasterSeeder::class,
            // ProjectgalleryrSeeder::class,
            AdminSeeder::class
        ]);
    }
}
