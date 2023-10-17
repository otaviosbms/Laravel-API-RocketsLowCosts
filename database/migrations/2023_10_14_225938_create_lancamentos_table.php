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
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->id();
            $table->integer('foguete_id');
            $table->string('foguete_nome');
            $table->string('foguete_imagem');
            $table->date('data_de_lancamento');
            $table->integer('lucro');
            $table->integer('valor');
            $table->integer('faturamento');
            $table->timestamps();



            $table->foreign('foguete_id')->references('id')->on('foguetes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lancamentos');
    }
};
