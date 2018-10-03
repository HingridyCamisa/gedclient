<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_segurado');
            $table->string('nome_seguradora');
            $table->string('tipo_seguro');
            $table->string('numero_apolice');
            $table->string('numero_recibo');
            $table->string('periodicidade_pagamento');
            $table->date('data_inicio');
            $table->date('data_proximo_pagamento');
            $table->integer('dias_cobertos');
            $table->integer('dias_proximo_pagamento');
            $table->float('capital_seguro');
            $table->float('premio_total');
            $table->float('premio_simples');
            $table->float('taxa_corretagem');
            $table->float('comissao');
            $table->string('item_segurado');
            $table->string('situacao');
            $table->string('consultor');
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
        Schema::dropIfExists('contratos');
    }
}
