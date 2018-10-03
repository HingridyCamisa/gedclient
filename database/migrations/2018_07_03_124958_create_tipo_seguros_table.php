<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_seguros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seguradora_id')->unsigned();
            $table->foreign('seguradora_id')->references('id')->on('seguradoras')->onDelete('cascade');
            $table->string('ramo');
            $table->double('taxa_corretagem');

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
        Schema::dropIfExists('tipo_seguros');
    }
}
