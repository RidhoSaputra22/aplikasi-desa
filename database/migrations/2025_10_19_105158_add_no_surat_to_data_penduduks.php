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
        Schema::table('data_penduduks', function (Blueprint $table) {
            $table->string('no_surat')->after('id')->nullable();
            $table->enum('confirmation_status', ['pending', 'confirm', 'success'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_penduduks', function (Blueprint $table) {
            $table->dropColumn('no_surat');
            $table->dropColumn('confirmation_status');
        });
    }
};
