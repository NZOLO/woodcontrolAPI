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
        Schema::table('c_n_a_m_g_s', function (Blueprint $table) {
            $table->integer('employe');
            $table->integer('montant');
            $table->integer('paye');
            $table->integer('quittance');
            $table->integer('restant');
            $table->date('delailegal')->nullable();
            $table->date('delaimoratoire')->nullable();
            $table->string('scanquittance')->nullable();
            $table->string('scanmoratoire')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('c_n_a_m_g_s', function (Blueprint $table) {
            //
        });
    }
};
