<?php

namespace Database\Seeders;

use App\Models\Topbar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topbar::create([
            'title' => 'test1',
            'contact1'=> '1234567890',
            'contact2'=> '1234567890',
            'contact3'=> '1234567890',
            'email'=> 'test@gmail.com',
            'social_logo1'=> 'URL1',
            'social_logo2'=> 'URL2',
            'social_logo3'=> 'URL3',
        ]);
    }
}
