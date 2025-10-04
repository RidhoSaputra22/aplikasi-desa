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
        Schema::create('death_certificates', function (Blueprint $table) {
            $table->id();

            // Data diri almarhum
            $table->string('name');
            $table->string('place_of_birth');
            $table->integer('day_of_birth');
            $table->integer('month_of_birth');
            $table->integer('year_of_birth');
            $table->string('religion');
            $table->string('profession');
            $table->text('address');

            // Data keterangan kematian
            $table->string('place_of_death');
            $table->integer('day_of_death');
            $table->integer('month_of_death');
            $table->integer('year_of_death');
            $table->string('cause_of_death'); // Fixed typo from couse_of_death

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
        Schema::dropIfExists('death_certificates');
    }
};
