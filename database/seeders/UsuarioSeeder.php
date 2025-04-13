<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
{
    User::create([
        'name' => 'Admin',
        'email' => 'admin@farmacia.com',
        'password' => Hash::make('admin123'),
        'rol' => 'admin',
    ]);

    User::create([
        'name' => 'Cliente',
        'email' => 'cliente@farmacia.com',
        'password' => Hash::make('cliente123'),
        'rol' => 'cliente',
    ]);
}
}
