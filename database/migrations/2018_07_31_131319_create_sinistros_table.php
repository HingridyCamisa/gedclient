<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinistros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sinistro');
            $table->string('numero_apolice');
            $table->string('nome_segurado');
            $table->date('data_sinistro')->default('1970-01-01');
            $table->date('data_participacao_almond')->default('1970-01-01');
            $table->date('data_participacao_seguradora')->default('1970-01-01');
            $table->string('situacao');
            $table->date('data_pagamento');
            $table->integer('numero_dias');
            $table->float('valor_sinistro');
            $table->float('valor_pago_seguradora');
            $table->float('franquia');
            $table->float('valor_franquia');
           
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
        Schema::dropIfExists('sinistros');
    }
}
