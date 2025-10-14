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








        $this->call([

            LookupDataSeeder::class,
            PariwisataSeeder::class,
            BeritaSeeder::class,
            UmkmSeeder::class,
            // pendudukSeeder::class
        ]);
    }
}
