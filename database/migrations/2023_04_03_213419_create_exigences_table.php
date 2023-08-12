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
        Schema::create('exigences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entrepriseID');
            $table->string('taxe')->nullable();
            $table->integer('montant')->nullable();
            $table->string('quittance')->nullable();
            $table->integer('montantnotpaid')->nullable();
            $table->date('delai')->nullable();
            $table->date('derogation')->nullable();
            $table->string('refDocument')->nullable();
            $table->boolean('statut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exigences');
    }
};
