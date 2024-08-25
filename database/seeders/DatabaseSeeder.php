<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123123123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'pengguna@example.com'],
            [
                'name' => 'Pengguna Biasa',
                'password' => Hash::make('qweqweqwe'),
                'role' => 'user',
            ]
        );

        User::updateOrCreate(
            ['email' => 'perusahaan@example.com'],
            [
                'name' => 'Perusahaan',
                'password' => Hash::make('asdasdasd'),
                'role' => 'perusahaan',
            ]
        );
    }
}