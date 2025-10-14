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
        Schema::create('aparatur_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('foto')->nullable();
            $table->timestamps();
        });

        DB::table('aparatur_desas')->insert([
            [
                'nama' => 'Kepala Desa',
                'jabatan' => 'Kepala Desa',
                'foto' => 'user-default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sekretaris Desa',
                'jabatan' => 'Sekretaris Desa',
                'foto' => 'user-default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kaur Pemerintahan',
                'jabatan' => 'Kaur Pemerintahan',
                'foto' => 'user-default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kaur Keuangan',
                'jabatan' => 'Kaur Keuangan',
                'foto' => 'user-default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kaur Umum',
                'jabatan' => 'Kaur Umum',
                'foto' => 'user-default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kadus 1',
                'jabatan' => 'Kadus 1',
                'foto' => 'user-default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kadus 2',
                'jabatan' => 'Kadus 2',
                'foto' => 'user-default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kadus 3',
                'jabatan' => 'Kadus 3',
                'foto' => 'user-default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kepala Seksi Pelayanan',
                'jabatan' => 'Kepala Seksi Pelayanan',
                'foto' => 'user-default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kepala Seksi Kesejahteraan',
                'jabatan' => 'Kepala Seksi Kesejahteraan',
                'foto' => 'user-default.png',
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
        Schema::dropIfExists('aparatur_desas');
    }
};
