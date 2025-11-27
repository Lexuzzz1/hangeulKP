<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // GANTI 'create' JADI 'forceCreate'
        User::forceCreate([
            'nama' => 'Admin Hangeul',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
        ]);
    }
}