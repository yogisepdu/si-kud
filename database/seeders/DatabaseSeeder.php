<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::updateOrCreate(
            ['email' => 'admin@kud.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'role' => 'administrator',
            ]
        );

        // PIMPINAN
        User::updateOrCreate(
            ['email' => 'pimpinan@kud.com'],
            [
                'name' => 'Pimpinan KUD',
                'password' => Hash::make('password'),
                'role' => 'pimpinan',
            ]
        );
    }
}
