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
        Schema::create('ligne_activites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activiteID');
            $table->unsignedBigInteger('entrepriseID');
            $table->foreign('entrepriseID')->references('id')->on('entreprises')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('activiteID')->references('id')->on('activites')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_activites');
    }
};
