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
        Schema::table('parent_income_certificates', function (Blueprint $table) {
            //
            $table->string('gender')->after('name')->nullable();
            $table->string('anak_ke')->after('gender')->nullable();
            $table->string('nama_sekolah')->after('anak_ke')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parent_income_certificates', function (Blueprint $table) {
            //
        });
    }
};
