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
        Schema::create('parent_income_certificates', function (Blueprint $table) {
            $table->id();

            // Data diri
            $table->string('name');
            $table->string('place_of_birth');
            $table->string('day_of_birth');
            $table->string('month_of_birth');
            $table->string('year_of_birth');
            $table->string('religion');
            $table->string('profession');
            $table->text('address');

            // Data orang tua atau wali
            $table->string('parent_name');
            $table->string('parent_place_of_birth');
            $table->string('parent_day_of_birth');
            $table->string('parent_month_of_birth');
            $table->string('parent_year_of_birth');
            $table->string('parent_religion');
            $table->string('parent_profession');
            $table->text('parent_address');

            // Data keterangan penghasilan
            $table->decimal('nominal_income', 15, 2);
            $table->integer('number_depandent'); // Note: keeping original typo from Livewire component
            $table->string('used_for');

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
        Schema::dropIfExists('parent_income_certificates');
    }
};
