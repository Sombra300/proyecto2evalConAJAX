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
        Schema::create('events', function (Blueprint $table) {
            $table->id()->autoincrement();//autoincrement
            $table->string('name',30);//cadena de longitud 30
            $table->string('description');//texto
            $table->string('location');//texto
            $table->date('date');//fecha
            $table->time('hour');//time
            $table->enum('type',['official','exhibition','charity'])->default('official');//Enum: official, exhibition, charity (por defecto oficial)
            $table->string('tags');//texto
            $table->boolean('visible');//bool por defecto falso
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
