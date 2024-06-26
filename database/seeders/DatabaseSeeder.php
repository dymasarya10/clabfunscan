<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'email' => 'superadmin@labjkt.com',
            'nama_pengguna' => 'superadmin',
            'nama' => 'Admin Pusat',
            'password' => Hash::make('claboratorium2024'),
            'peran' => 'superadmin',
            'foto' => 'noFoto'
        ]);

        // \App\Models\Content::factory(100)->create();
    }
}
