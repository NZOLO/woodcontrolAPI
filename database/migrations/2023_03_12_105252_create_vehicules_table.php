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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('modele')->nullable();
            $table->string('marque')->nullable();
            $table->string('cartegrise')->nullable();
            $table->date('validitecartegrise')->nullable();
            $table->date('validiteassurance')->nullable();
            $table->string('proprietairelegal')->nullable();
            $table->string('typeVehicule')->nullable(); //0:Camion, 1:Bateau, 2:Avion
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
        Schema::dropIfExists('vehicules');
    }
};
