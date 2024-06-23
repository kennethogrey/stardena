<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Samie Edu',
            'email' => 'info@stardena.com',
            'phone' => '0776263482',
            'staff' => 'admin',
            'role' => 'admin',
            'status' => 1,
            'password' => bcrypt('Samuel@90'),
        ]);
    }
}
