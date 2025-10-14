<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\KategoriUmkm;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        KategoriUmkm::create([
            'nama_kategori' => 'TEST'
        ]);




        $this->call([
            ProfilSeeder::class,
            LookupDataSeeder::class,
            // UmkmSeeder::class,
            // pendudukSeeder::class
            // pendudukSeeder::class,
        ]);
    }
}
