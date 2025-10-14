<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PariwisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            $title = [
                'Pantai Indah Kotomesjid',
                'Air Terjun Alam Segar',
                'Bukit Cinta Kotomesjid',
                'Danau Biru Kotomesjid',
                'Hutan Wisata Kotomesjid',
                'Kebun Bunga Pelangi',
                'Taman Rekreasi Keluarga',
                'Goa Sejuk Kotomesjid',
                'Ladang Kopi Kotomesjid',
                'Museum Sejarah Kotomesjid',
            ][$i - 1];

            $slug = Str::slug($title);

            $data[] = [
                'title' => $title,
                'slug' => $slug,
                'deskripsi' => $faker->paragraph(3),
                'alamat' => $faker->address(),
                'gambar' => "https://picsum.photos/seed/{$slug}/600/400",
                'long' => 1.361764,
                'lat' => 124.852103,
                'galeri' => json_encode([
                    "https://picsum.photos/seed/{$slug}1/600/400",
                    "https://picsum.photos/seed/{$slug}2/600/400",
                    "https://picsum.photos/seed/{$slug}3/600/400",
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }


        foreach ($data as &$item) {
            $item['galeri'] = json_encode($item['galeri']); // 🔹 ubah ke JSON string
        }

        \App\Models\ParawisataDesa::insert($data);
    }
}
