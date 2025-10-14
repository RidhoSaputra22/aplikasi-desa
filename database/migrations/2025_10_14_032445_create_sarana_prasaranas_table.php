<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sarana_prasaranas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sarana');
            $table->string('jenis_sarana');
            $table->string('kondisi_sarana');
            $table->double('kapasitas_sarana');
            $table->string('lokasi_sarana');
            $table->string('foto_sarana')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        DB::table('sarana_prasaranas')->insert([
            [
                'nama_sarana' => 'Balai Pertemuan',
                'jenis_sarana' => 'Gedung',
                'kondisi_sarana' => 'Baik',
                'kapasitas_sarana' => 100,
                'lokasi_sarana' => 'Jl. Merdeka No. 10',
                'foto_sarana' => null,
                'keterangan' => 'Digunakan untuk acara desa dan pertemuan warga.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_sarana' => 'Lapangan Olahraga',
                'jenis_sarana' => 'Lapangan',
                'kondisi_sarana' => 'Rusak Sedang',
                'kapasitas_sarana' => 200,
                'lokasi_sarana' => 'Jl. Olahraga No. 5',
                'foto_sarana' => null,
                'keterangan' => 'Tempat untuk kegiatan olahraga dan rekreasi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_sarana' => 'Perpustakaan Desa',
                'jenis_sarana' => 'Gedung',
                'kondisi_sarana' => 'Rusak Parah',
                'kapasitas_sarana' => 50,
                'lokasi_sarana' => 'Jl. Pendidikan No. 3',
                'foto_sarana' => null,
                'keterangan' => 'Menyediakan berbagai buku dan referensi untuk warga desa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarana_prasaranas');
    }
};
