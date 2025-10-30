<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        # metode untuk membuat tabel
        User::factory()->create([
            'name' => 'Tes Hangeul',
            'email' => 'tes@hangeul.com',
            'password' => Hash::make('hangeul12345'),

        ]);
        
            
        $this->call([
            JenisSeeder::class,
        ]);

        
        
    }

    
}
