<?php

namespace Database\Seeders;

use App\Models\ProfilDesa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataProfil = [
            'nama_desa' => 'Desa Maju',
            'sejarah_desa' => '<p>Kelurahan Tuwung merupakan salah satu kelurahan yang berada di ibukota Kabupaten
Barru, sebelumnya bernama Desa Tuwung, seiring perkembangan dan kemajuan
pembangunan serta terpenuhinya Persyaratan Administrasi, maka pada tahun 1981 Desa
Tuwung mengubah status menjadi Kelurahan Tuwung.
Perubahan status Desa Tuwung menjadi Kelurahan Tuwung pada bulan April 1981,
merupakan kebijakan penting yang sangat strategis. Dengan perubahan status tersebut,
maka Kepala Pemerintahan di Kelurahan Tuwung dijabat oleh seorang Lurah yang
berstatus pegawai negeri sipil yaitu Bapak Hasan L. selanjutnya pada tahun 1987, diikuti
pemekaran wilayah induk kelurahan. tuwung menjadi 3 (tiga) kelurahan yaitu Kelurahan
Sumpang Binangae, Kelurahan Coppo, dan Kelurahan Tuwung sendiri.</p>',
            'visi' => '<p>Menuju Desa Berbasis Digital, Inovatif dalam Mengelola Potensi Desa dengan Produk Unggulan di Sektor Perikanan dan Pariwisata Agar Terwujudnya Masyarakat yang Religius, Beradat, Mandiri dan Sejahtera</p>',
            'misi' => '<p>Optimalisasi Peran Pemerintah Desa dalam Pelayanan kepada Masyarakat Berbasis Digital
Berperan Aktif dan Menjalin Komunikasi dengan Kepemudaan, Mahasiswa dan Perguruan Tinggi dalam Berinovasi untuk Menopang Pengembangan Potensi Desa
Menjaga, Memelihara, Melestarikan serta Mengembangkan Nilai-Nilai Warisan Budaya Lokal yang Berkualitas dan Berkelanjutan
Meningkatkan Sumber Daya Manusia (SDM) melalui Percepatan Pembangunan dan Pengembangan di Sektor Perikanan dan Pariwisata
Memperkuat Fungsi Lembaga yang Ada di Desa
Pelaksanaan Pembangunan yang Berkesinambungan dan Mengedepankan Partisipasi Gotong Royong Masyarakat</p>',
            'alamat' => 'Jl. Merdeka No. 1, Desa Maju',
            'kode_pos' => '12345',
            'telepon' => '021-12345678',
            'email' => 'kelurahan-tuwung@gmail.com',
        ];

        ProfilDesa::create($dataProfil);
    }
}
