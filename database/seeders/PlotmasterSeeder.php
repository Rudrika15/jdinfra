<?php

namespace Database\Seeders;

use App\Models\Plotmaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlotmasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plotmaster::create([
            'sectormasterid' => 1,
            'plotnumber' => 15,
            'area' => 150,
            'status' => 'Sold'
        ]);
    }
}
