<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name' => 'Alex',
        'email' => 'alex@gmail.com',
        'password' => '12345678'
    ]);
    
    
        User::create([
        'name' => 'Rahul',
        'email' => 'rahul@gmail.com',
        'password' => '123456789'
    ]);
    
    
        User::create([
        'name' => 'Darshan',
        'email' => 'darshan@gmail.com',
        'password' => '1234567890'
    ]);
    }   
}