<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('segurados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_segurado');
            $table->date('data_nascimento');
            $table->boolean('genero_segurado')->default(0);
            $table->string('morada_seguardo');
            $table->string('contacto_segurado');
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
        Schema::dropIfExists('segurados');
    }
}
