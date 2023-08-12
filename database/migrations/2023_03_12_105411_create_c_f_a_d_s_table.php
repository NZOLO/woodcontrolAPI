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
        Schema::create('c_f_a_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->boolean('type')->default(0); //0:CFAD, 1:UFA
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
        Schema::dropIfExists('c_f_a_d_s');
    }
};
