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
        Schema::create('ligne_bordereaus', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->decimal('volume', 8, 3);
            $table->unsignedBigInteger('essenceID')->nullable();
            $table->unsignedBigInteger('bordereauID')->nullable();
            $table->unsignedBigInteger('aacID')->nullable();
            $table->foreign('bordereauID')->references('id')->on('bordereaus')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('aacID')->references('id')->on('a_a_c_s')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_bordereaus');
    }
};
