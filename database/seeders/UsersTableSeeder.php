<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin / Executive accounts
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Executive User',
                'email' => 'executive@requinbd.com',
                'password' => Hash::make('password123'),
                'role' => 'executive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Sample Intern accounts
        DB::table('users')->insert([
            [
                'name' => 'Intern One',
                'email' => 'intern1@requinbd.com',
                'password' => Hash::make('password123'),
                'role' => 'intern',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Intern Two',
                'email' => 'intern2@requinbd.com',
                'password' => Hash::make('password123'),
                'role' => 'intern',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
