<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('tanggal_lahir')->nullable();

            $table->string('penghasilan_bulanan')->nullable();
            // bantuan

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penduduks');
    }
};
