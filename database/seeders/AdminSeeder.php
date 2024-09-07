<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'agentcode' => 'parvej2003',
            'name' => 'parvez',
            'mobile' => '8487868595',
            'alternatemobile' => '8141219160',
            'email' =>   'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'doctype' => 'aadhaar',
            'docnumber' => '123456789012',
            'address' => 'Surendranagar',
            'usertype' => 'admin'
        ]);
    }
}
