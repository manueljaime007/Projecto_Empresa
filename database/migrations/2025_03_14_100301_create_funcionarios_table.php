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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('sobrenome', 50);
            $table->integer('idade');
            $table->string('telefone', 100);
            $table->string('email', 225);
            $table->unsignedBigInteger('id_cargo')->default(1);
            $table->foreign('id_cargo')->references('id')->on('cargos')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
