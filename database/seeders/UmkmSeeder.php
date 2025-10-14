<?php

namespace Database\Seeders;

use App\Models\KategoriUmkm;
use App\Models\UmkmDesa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        KategoriUmkm::create([
            'nama_kategori' => 'TEST'
        ]);

        $data = [
            [
                'nama_produk' => 'Kopi Bubuk Kotomesjid',
                'deskripsi' => 'Kopi bubuk khas Desa Kotomesjid dengan cita rasa kuat dan aroma khas dari biji kopi pilihan yang dipanggang secara tradisional.',
                'harga' => 25000,
                'gambar' => 'default-image.jpeg',
                'no_hp' => '081234567890',
                'kategori_umkm_id' => 1,
            ],
            [
                'nama_produk' => 'Keripik Pisang Manis',
                'deskripsi' => 'Keripik pisang dengan cita rasa manis dan renyah, dibuat dari pisang segar hasil panen lokal.',
                'harga' => 15000,
                'gambar' => 'default-image.jpeg',
                'no_hp' => '081298765432',
                'kategori_umkm_id' => 1,
            ],
            [
                'nama_produk' => 'Sambal Ikan Roa',
                'deskripsi' => 'Sambal khas dengan bahan dasar ikan roa pedas menggugah selera, cocok untuk segala hidangan.',
                'harga' => 30000,
                'gambar' => 'default-image.jpeg',
                'no_hp' => '082112223334',
                'kategori_umkm_id' => 1,
            ],
            [
                'nama_produk' => 'Kerajinan Rotan Kotomesjid',
                'deskripsi' => 'Produk anyaman rotan berupa tas dan keranjang dengan desain modern namun tetap mempertahankan nuansa tradisional.',
                'harga' => 75000,
                'gambar' => 'default-image.jpeg',
                'no_hp' => '081345678912',
                'kategori_umkm_id' => 1,
            ],
            [
                'nama_produk' => 'Kue Kering Coklat Chip',
                'deskripsi' => 'Kue kering dengan rasa coklat chip premium, cocok untuk camilan sore atau oleh-oleh khas desa.',
                'harga' => 40000,
                'gambar' => 'default-image.jpeg',
                'no_hp' => '081376543210',
                'kategori_umkm_id' => 1,
            ],
            [
                'nama_produk' => 'Minyak Kelapa Murni',
                'deskripsi' => 'Minyak kelapa alami yang diproduksi secara tradisional tanpa bahan kimia, cocok untuk masakan dan perawatan tubuh.',
                'harga' => 50000,
                'gambar' => 'default-image.jpeg',
                'no_hp' => '082198765432',
                'kategori_umkm_id' => 1,
            ],
            [
                'nama_produk' => 'Abon Sapi Pedas',
                'deskripsi' => 'Abon sapi pedas khas Kotomesjid dengan rasa gurih dan pedas pas di lidah.',
                'harga' => 35000,
                'gambar' => 'default-image.jpeg',
                'no_hp' => '081222334455',
                'kategori_umkm_id' => 1,
            ],
            [
                'nama_produk' => 'Batik Tulis Kotomesjid',
                'deskripsi' => 'Batik tulis buatan pengrajin lokal dengan motif khas budaya Kotomesjid, menggunakan pewarna alami.',
                'harga' => 120000,
                'gambar' => 'default-image.jpeg',
                'no_hp' => '081333222111',
                'kategori_umkm_id' => 1,
            ],
            [
                'nama_produk' => 'Madu Hutan Asli',
                'deskripsi' => 'Madu murni hasil panen lebah liar di hutan sekitar Kotomesjid, tanpa campuran bahan tambahan.',
                'harga' => 85000,
                'gambar' => 'default-image.jpeg',
                'no_hp' => '081477788899',
                'kategori_umkm_id' => 1,
            ],
            [
                'nama_produk' => 'Teh Daun Kelor',
                'deskripsi' => 'Teh herbal alami dari daun kelor pilihan yang kaya manfaat untuk kesehatan tubuh.',
                'harga' => 20000,
                'gambar' => 'default-image.jpeg',
                'no_hp' => '081555666777',
                'kategori_umkm_id' => 1,
            ],
        ];

        UmkmDesa::insert($data);
    }
}
