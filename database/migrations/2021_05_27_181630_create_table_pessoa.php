<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePessoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pessoa', function (Blueprint $table) {
            $table->id();
            $table->string('Nome');
            $table->string('CPF');
            $table->string('Email');
            $table->string('Telefone');
            $table->integer('Acompanhantes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pessoa');
    }
}
