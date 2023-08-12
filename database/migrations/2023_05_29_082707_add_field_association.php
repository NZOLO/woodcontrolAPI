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
            $table->string('pv')->nullable();
            $table->date('datesignature')->nullable();
            $table->string('nompresident')->nullable();
            $table->string('prenompresident')->nullable();
            $table->string('telpresident')->nullable();
            $table->string('emailpresident')->nullable();
            $table->string('nomsecretaire')->nullable();
            $table->string('prenomsecretaire')->nullable();
            $table->string('telsecretaire')->nullable();
            $table->string('emailsecretaire')->nullable();
            $table->string('nomtresorier')->nullable();
            $table->string('prenomtresorier')->nullable();
            $table->string('teltresorier')->nullable();
            $table->string('emailtresorier')->nullable();
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
