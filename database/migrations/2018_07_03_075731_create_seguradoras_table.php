<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguradorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguradoras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_seguradora');
            $table->string('endereco_seguradora');
            $table->integer('contacto_seguradora');
            $table->string('email_seguradora');
            $table->string('tipo_seguro');
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
      Schema::dropIfExists('seguradoras');
    }
}
