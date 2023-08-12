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
        Schema::table('entreprises', function (Blueprint $table) {
            $table->string('immCNAMGS')->nullable();
            $table->string('validiteCNAMGS')->nullable();
            $table->string('justificatifCNAMGS')->nullable();
            $table->string('immCNSS')->nullable();
            $table->string('validiteCNSS')->nullable();
            $table->string('justificatifCNSS')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entreprises', function (Blueprint $table) {
            //
        });
    }
};
