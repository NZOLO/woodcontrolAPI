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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('raison');
            $table->string('sigle')->nullable();
            $table->string('codebarre')->nullable();
            $table->string('typeStructures')->nullable();
            $table->string('rccm')->nullable();
            $table->string('nif')->nullable();
            $table->string('capital')->nullable();
            $table->string('origine')->nullable();
            $table->string('bp')->nullable();
            $table->string('adresseEntreprise')->nullable();
            $table->string('telephoneEntreprise')->nullable();
            $table->string('emailEntreprise')->nullable();
            $table->date('datecreation')->nullable();
            $table->string('nomgerant')->nullable();
            $table->string('prenomgerant')->nullable();
            $table->string('piecegerant')->nullable();
            $table->string('numpiecegerant')->nullable();
            $table->date('datevaliditepiecegerant')->nullable();
            $table->string('telephonegerant')->nullable();
            $table->string('adressegerant')->nullable();
            $table->string('emailgerant')->nullable();
            $table->boolean('type')->default(0); //0:Societe 1:Transporteur 3:Association 4:Personne Physique
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
