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
        Schema::create('birth_certificates', function (Blueprint $table) {
            $table->id();

            // Data bayi
            $table->string('baby_name');
            $table->string('place_of_birth');
            $table->string('day_of_birth');
            $table->string('month_of_birth');
            $table->string('year_of_birth');
            $table->string('hour_of_birth');
            $table->string('minute_of_birth');
            $table->enum('gender', ['L', 'P']); // L = Laki-laki, P = Perempuan

            // Data ibu
            $table->string('mother_name');
            $table->string('mother_id_card_number');
            $table->integer('mother_age');
            $table->string('mother_profession');
            $table->text('mother_address');

            // Data ayah
            $table->string('father_name');
            $table->string('father_id_card_number');
            $table->integer('father_age');
            $table->string('father_profession');
            $table->text('father_address');

            // Data pelapor
            $table->string('reporter_name');
            $table->string('reporter_id_card_number');
            $table->integer('reporter_age');
            $table->string('reporter_profession');
            $table->text('reporter_address');

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
        Schema::dropIfExists('birth_certificates');
    }
};
