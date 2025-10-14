<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'judul' => 'Desa Kotomesjid Mengadakan Kegiatan Gotong Royong',
                'slug' => 'desa-kotomesjid-mengadakan-kegiatan-gotong-royong',
                'isi' => 'Desa Kotomesjid mengadakan kegiatan gotong royong untuk membersihkan lingkungan desa. Kegiatan ini diikuti oleh seluruh warga desa dan berlangsung dengan semangat kebersamaan yang tinggi.',
                'gambar' => 'https://picsum.photos/seed/gotongroyong/600/400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pembangunan Infrastruktur Jalan di Desa Kotomesjid',
                'slug' => 'pembangunan-infrastruktur-jalan-di-desa-kotomesjid',
                'isi' => 'Pemerintah Desa Kotomesjid memulai proyek pembangunan infrastruktur jalan untuk meningkatkan aksesibilitas dan mobilitas warga desa. Proyek ini diharapkan dapat mendukung pertumbuhan ekonomi lokal.',
                'gambar' => 'https://picsum.photos/seed/pembangunanjalan/600/400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Festival Budaya Desa Kotomesjid Sukses Digelar',
                'slug' => 'festival-budaya-desa-kotomesjid-sukses-digelar',
                'isi' => 'Festival Budaya Desa Kotomesjid berhasil digelar dengan sukses, menampilkan berbagai pertunjukan seni dan budaya lokal. Acara ini menarik banyak pengunjung dari luar desa dan memberikan dampak positif bagi perekonomian setempat.',
                'gambar' => 'https://picsum.photos/seed/festivalbudaya/600/400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pelatihan Kewirausahaan untuk Pemuda Desa Kotomesjid',
                'slug' => 'pelatihan-kewirausahaan-untuk-pemuda-desa-kotomesjid',
                'isi' => 'Pemerintah Desa Kotomesjid mengadakan pelatihan kewirausahaan bagi para pemuda desa untuk meningkatkan keterampilan dan mendorong munculnya usaha baru di tingkat lokal.',
                'gambar' => 'https://picsum.photos/seed/kewirausahaan/600/400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Penanaman Pohon di Sekitar Area Sungai Desa Kotomesjid',
                'slug' => 'penanaman-pohon-di-sekitar-area-sungai-desa-kotomesjid',
                'isi' => 'Dalam rangka menjaga kelestarian lingkungan, warga Desa Kotomesjid melakukan kegiatan penanaman pohon di sekitar area sungai untuk mengurangi erosi dan menjaga ekosistem air.',
                'gambar' => 'https://picsum.photos/seed/penanamanpohon/600/400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Lomba Kebersihan Antar Dusun di Desa Kotomesjid',
                'slug' => 'lomba-kebersihan-antar-dusun-di-desa-kotomesjid',
                'isi' => 'Dalam rangka memperingati Hari Kemerdekaan, Desa Kotomesjid mengadakan lomba kebersihan antar dusun untuk menumbuhkan kesadaran masyarakat akan pentingnya kebersihan lingkungan.',
                'gambar' => 'https://picsum.photos/seed/lombakebersihan/600/400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Posyandu Desa Kotomesjid Rutin Adakan Pemeriksaan Balita',
                'slug' => 'posyandu-desa-kotomesjid-rutin-adakan-pemeriksaan-balita',
                'isi' => 'Kader Posyandu Desa Kotomesjid rutin mengadakan pemeriksaan kesehatan balita setiap bulan untuk memastikan tumbuh kembang anak-anak berjalan dengan baik.',
                'gambar' => 'https://picsum.photos/seed/posyandu/600/400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pemerintah Desa Salurkan Bantuan Sosial kepada Warga Kurang Mampu',
                'slug' => 'pemerintah-desa-salurkan-bantuan-sosial-kepada-warga-kurang-mampu',
                'isi' => 'Pemerintah Desa Kotomesjid menyalurkan bantuan sosial berupa sembako dan kebutuhan pokok kepada warga kurang mampu sebagai bentuk kepedulian terhadap masyarakat.',
                'gambar' => 'https://picsum.photos/seed/bantuansosial/600/400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Senam Pagi Bersama Warga Desa Kotomesjid',
                'slug' => 'kegiatan-senam-pagi-bersama-warga-desa-kotomesjid',
                'isi' => 'Untuk menjaga kesehatan dan mempererat kebersamaan, warga Desa Kotomesjid mengadakan kegiatan senam pagi bersama di lapangan desa setiap hari Minggu pagi.',
                'gambar' => 'https://picsum.photos/seed/senampagi/600/400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pemerintah Desa Kotomesjid Gelar Musyawarah Perencanaan Pembangunan',
                'slug' => 'pemerintah-desa-kotomesjid-gelar-musyawarah-perencanaan-pembangunan',
                'isi' => 'Pemerintah Desa Kotomesjid menggelar musyawarah perencanaan pembangunan untuk membahas rencana strategis pembangunan desa tahun mendatang bersama seluruh perangkat dan perwakilan warga.',
                'gambar' => 'https://picsum.photos/seed/musyawarahdesa/600/400',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        \App\Models\BeritaDesa::insert($data);
    }
}
