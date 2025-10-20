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
        Schema::table('usaha_certificates', function (Blueprint $table) {
            //
            $table->string('no_hp')->nullable()->after('address');
            $table->string('nama_usaha')->nullable()->after('no_hp');
            $table->string('bussiness_address')->nullable()->after('nama_usaha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usaha_certificates', function (Blueprint $table) {
            //
            $table->dropColumn('no_hp');
            $table->dropColumn('nama_usaha');
            $table->dropColumn('bussiness_address');
        });
    }
};
