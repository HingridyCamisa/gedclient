<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspecaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospecaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_cliente');
            $table->string('nome_consultor');
            $table->string('endereco_cliente');
            $table->integer('contacto_cliente');
            $table->string('email_cliente')->unique();
            $table->date('data_inicio')->format('d-m-Y H:i');
            $table->date('data_prevista_fim');
            $table->string('tipo_prospecao');
            $table->string('origem_prospecao');
            $table->double('valor_estipulado_carteira');
            $table->longText('detalhes_prospecao');
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
       Schema::dropIfExists('prospecaos');
    }
}
