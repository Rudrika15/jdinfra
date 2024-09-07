<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Project::create([
        'title' => 'project 1',
        'location' => 'project 1',
        'description' => 'project 1',
        'brochure' => 'project 1',
        'map' => 'project 1',
        'aminities'=> 'project 1'
       ]);
    }
}
