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
        Schema::table('birth_certificates', function (Blueprint $table) {
            $table->string('no_surat')->after('id')->nullable();
        });
        Schema::table('death_certificates', function (Blueprint $table) {
            $table->string('no_surat')->after('id')->nullable();
        });
        Schema::table('parent_income_certificates', function (Blueprint $table) {
            $table->string('no_surat')->after('id')->nullable();
        });
        Schema::table('domisili_certificates', function (Blueprint $table) {
            $table->string('no_surat')->after('id')->nullable();
        });
        Schema::table('tidak_mampu_certificates', function (Blueprint $table) {
            $table->string('no_surat')->after('id')->nullable();
        });
        Schema::table('usaha_certificates', function (Blueprint $table) {
            $table->string('no_surat')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('birth_certificates', function (Blueprint $table) {
            $table->dropColumn('no_surat');
        });
        Schema::table('death_certificates', function (Blueprint $table) {
            $table->dropColumn('no_surat');
        });
        Schema::table('parent_income_certificates', function (Blueprint $table) {
            $table->dropColumn('no_surat');
        });
        Schema::table('domisili_certificates', function (Blueprint $table) {
            $table->dropColumn('no_surat');
        });
        Schema::table('tidak_mampu_certificates', function (Blueprint $table) {
            $table->dropColumn('no_surat');
        });
        Schema::table('usaha_certificates', function (Blueprint $table) {
            $table->dropColumn('no_surat');
        });
    }
};
