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
        Schema::create('u_f_g_s', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->unsignedBigInteger('cfadID')->nullable();
            $table->unsignedBigInteger('entrepriseID')->nullable();
            $table->foreign('cfadID')->references('id')->on('c_f_a_d_s')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('entrepriseID')->references('id')->on('entreprises')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_f_g_s');
    }
};
