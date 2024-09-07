<?php

namespace Database\Seeders;

use App\Models\Sectormaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectormasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sectormaster::create([
            'projectid' => '1',
            'sectorname' =>'sector 1' 
        ]);
    }
}
