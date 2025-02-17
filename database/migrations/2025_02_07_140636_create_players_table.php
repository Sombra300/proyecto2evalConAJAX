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
        Schema::create('players', function (Blueprint $table) {
            $table->id()->autoincrement();//autoincrement
            $table->string('name',30);//cadena longitud 30
            $table->string('twitter');//texto
            $table->string('instagram');//texto
            $table->string('twitch');//texto
            $table->string('avatar')->nullable();//texto(nullable)
            $table->boolean('visible');//bool, defecto false
            $table->string('position');//texto
            $table->integer('age');//texto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
