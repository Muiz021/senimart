<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'admin',
            'nomor_ponsel' => '123456789',
            'roles' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('123'),
        ]);
    }
}
