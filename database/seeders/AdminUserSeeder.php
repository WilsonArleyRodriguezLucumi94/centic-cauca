<?php
// database/seeders/AdminUserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'centic.cauca@gmail.com',
            'password' => Hash::make('password123'), // Cambia esto en producción
            'email_verified_at' => now(),
        ]);
    }
}