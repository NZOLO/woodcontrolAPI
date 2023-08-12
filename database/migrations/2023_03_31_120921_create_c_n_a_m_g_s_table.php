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
        Schema::create('c_n_a_m_g_s', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation');
            $table->date('datecreation');
            $table->date('validite');
            $table->unsignedBigInteger('entrepriseID')->nullable();
            $table->foreign('entrepriseID')->references('id')->on('entreprises')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_n_a_m_g_s');
    }
};
