<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'Admin',
            'email'=>'admin@gmail.com.my',
            'password'=>bcrypt('secret123'),
            'userLevel' => '0',
            'userCategory' => 'Admin'
        ]);

        User::create([
            'name' => 'Nisa',
            'email' => 'nisa@gmail.com.my',
            'password' => bcrypt('secret123'),
            'userLevel' => '1',
            'userCategory' => 'Volunteer'
        ]);

        
        
    }
}
