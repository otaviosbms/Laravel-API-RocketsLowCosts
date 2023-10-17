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
        Schema::create('foguetes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('status');
            $table->integer('custo');
            $table->string('imagem');
            $table->string('motor_tipo');
            $table->string('motor_ver');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foguetes');
    }
};
