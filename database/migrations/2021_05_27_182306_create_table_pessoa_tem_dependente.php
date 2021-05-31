<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePessoaTemDependente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pessoa_tem_dependente', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('pessoa_id');
            $table->unsignedBigInteger('dependente_id');
            
            $table->foreign('pessoa_id')->references('id')->on('table_pessoa');
            $table->foreign('dependente_id')->references('id')->on('table_dependente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pessoa_tem_dependente');
    }
}
