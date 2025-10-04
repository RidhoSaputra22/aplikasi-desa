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
        Schema::create('domisili_certificates', function (Blueprint $table) {
            $table->id();

            // Data diri
            $table->string('name');
            $table->string('id_card_number');
            $table->string('place_of_birth');
            $table->string('day_of_birth');
            $table->string('month_of_birth');
            $table->string('year_of_birth');
            $table->string('religion');
            $table->enum('gender', ['L', 'P']); // L = Laki-laki, P = Perempuan
            $table->string('profession');
            $table->string('neighbourhood');
            $table->string('hamlet');
            $table->string('village');
            $table->text('address');

            // Lampiran persyaratan
            $table->string('attachment')->nullable();

            // Status dan kode surat
            $table->string('code')->unique(); // Format: UXTI-UTQG-ZTEW
            $table->enum('confirmation_status', ['pending', 'confirm', 'success'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domisili_certificates');
    }
};
