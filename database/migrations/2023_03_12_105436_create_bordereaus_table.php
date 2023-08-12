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
        Schema::create('bordereaus', function (Blueprint $table) {
            $table->id();
            $table->integer('statut')->default(0); //0:en attente, 1:confirme, 2:Valide
            $table->string('num_bord');
            $table->string('num_spec');
            $table->string('chauffeur')->nullable();
            $table->date('dateBord');
            $table->decimal('volume_total', 8, 3);
            $table->decimal('volume_spec', 8, 3);
            $table->unsignedBigInteger('agentID')->nullable();
            $table->unsignedBigInteger('societeProductionID')->nullable();
            $table->unsignedBigInteger('societeDestinataireID')->nullable();
            $table->unsignedBigInteger('societeTransportID')->nullable();
            $table->unsignedBigInteger('vehiculeID')->nullable();
            $table->unsignedBigInteger('cfadID')->nullable();
            $table->unsignedBigInteger('ufgID')->nullable();
            
            $table->foreign('agentID')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('societeProductionID')->references('id')->on('entreprises')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('societeDestinataireID')->references('id')->on('entreprises')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('societeTransportID')->references('id')->on('entreprises')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('vehiculeID')->references('id')->on('vehicules')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('cfadID')->references('id')->on('c_f_a_d_s')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('ufgID')->references('id')->on('u_f_g_s')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bordereaus');
    }
};
