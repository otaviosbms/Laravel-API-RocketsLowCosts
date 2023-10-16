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
            $table->string('foguete_id');
            $table->date('data_de_lancamento');
            $table->boolean('status');
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
