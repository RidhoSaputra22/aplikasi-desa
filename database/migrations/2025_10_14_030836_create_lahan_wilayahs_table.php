<?php

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lahan_wilayahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lahan');
            $table->string('jenis_lahan');
            $table->double('luas_lahan');
            $table->timestamps();
        });

        FacadesDB::table('lahan_wilayahs')->insert([
            [
                'nama_lahan' => 'Lahan Pertanian',
                'jenis_lahan' => 'Pertanian',
                'luas_lahan' => 150.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lahan' => 'Lahan Perkebunan',
                'jenis_lahan' => 'Perkebunan',
                'luas_lahan' => 100.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lahan' => 'Lahan Pemukiman',
                'jenis_lahan' => 'Pemukiman',
                'luas_lahan' => 50.0,
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
        Schema::dropIfExists('lahan_wilayahs');
    }
};
