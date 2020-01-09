<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saudes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_segurado');
            $table->date('data_nascimento');
            $table->integer('idade');
            $table->integer('ano_nascimento');
            $table->string('contacto');
            $table->string('email');
            $table->string('tipo_segurado');
            $table->string('pessoa_contacto');
            $table->string('email_pessoa_contacto');
            $table->string('contacto_pessoa_contacto');
            $table->string('seguradora');
            $table->string('plano');
            $table->string('nome_grupo');
            $table->string('tipo_membro');
            $table->string('numero_membro');
            $table->date('data_inicio_cobertura')->format('d-m-Y H:i');
            $table->date('data_fim_cobertura');
            $table->string('periodicidade_pagamento');
            $table->double('premio_mensal');
            $table->double('taxa_corretagem');
            $table->double('comissao');
            $table->string('situacao');
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
        Schema::dropIfExists('saudes');
    }
}
