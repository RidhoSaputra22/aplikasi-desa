<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LookupDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataAgama = [
            ['nama_agama' => 'Islam'],
            ['nama_agama' => 'Kristen'],
            ['nama_agama' => 'Katolik'],
            ['nama_agama' => 'Hindu'],
            ['nama_agama' => 'Buddha'],
            ['nama_agama' => 'Konghucu'],
        ];
        \App\Models\Agama::insert($dataAgama);

        $dataKemiskinan = [
            ['nama_kategori' => 'Sangat Miskin'],
            ['nama_kategori' => 'Miskin'],
            ['nama_kategori' => 'Rentan Miskin'],
            ['nama_kategori' => 'Tidak Miskin'],
        ];
        \App\Models\KategoriKemiskinan::insert($dataKemiskinan);

        $dataBantuan = [
            ['nama_bantuan' => 'Bantuan Langsung Tunai (BLT)'],
            ['nama_bantuan' => 'Bantuan Pangan Non Tunai (BPNT)'],
            ['nama_bantuan' => 'Program Keluarga Harapan (PKH)'],
            ['nama_bantuan' => 'Bantuan Sosial Tunai (BST)'],
            ['nama_bantuan' => 'Bantuan Iuran BPJS Kesehatan'],
            ['nama_bantuan' => 'Bantuan Usaha Mikro (UMKM)'],
        ];
        \App\Models\JenisBantuan::insert($dataBantuan);

        $dataStatusKeluarga = [
            ['nama_status' => 'Kepala Keluarga'],
            ['nama_status' => 'Istri'],
            ['nama_status' => 'Anak'],
            ['nama_status' => 'Orang Tua'],
            ['nama_status' => 'Lainnya'],
        ];
        \App\Models\StatusKeluarga::insert($dataStatusKeluarga);

        $dataStatusKawin = [
            ['nama_status' => 'Belum Kawin'],
            ['nama_status' => 'Kawin'],
            ['nama_status' => 'Cerai Hidup'],
            ['nama_status' => 'Cerai Mati'],
        ];
        \App\Models\StatusKawin::insert($dataStatusKawin);

        $dataPendidikan = [
            ['nama_pendidikan' => 'Tidak/Belum Sekolah'],
            ['nama_pendidikan' => 'SD/Sederajat'],
            ['nama_pendidikan' => 'SMP/Sederajat'],
            ['nama_pendidikan' => 'SMA/Sederajat'],
            ['nama_pendidikan' => 'Diploma'],
            ['nama_pendidikan' => 'Sarjana'],
            ['nama_pendidikan' => 'Pasca Sarjana'],
        ];
        \App\Models\Pendidikan::insert($dataPendidikan);

        $dataPekerjaan = [
            ['nama_pekerjaan' => 'Tidak Bekerja'],
            ['nama_pekerjaan' => 'Pelajar/Mahasiswa'],
            ['nama_pekerjaan' => 'PNS/ASN'],
            ['nama_pekerjaan' => 'TNI'],
            ['nama_pekerjaan' => 'Polri'],
            ['nama_pekerjaan' => 'Karyawan Swasta'],
            ['nama_pekerjaan' => 'Wiraswasta'],
            ['nama_pekerjaan' => 'Petani/Pekebun'],
            ['nama_pekerjaan' => 'Nelayan'],
            ['nama_pekerjaan' => 'Buruh Harian Lepas'],
            ['nama_pekerjaan' => 'Lainnya'],
        ];
        \App\Models\Pekerjaan::insert($dataPekerjaan);
    }
}
