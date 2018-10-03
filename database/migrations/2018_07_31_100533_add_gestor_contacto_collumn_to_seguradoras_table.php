<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGestorContactoCollumnToSeguradorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seguradoras', function (Blueprint $table) {
            $table->integer('gestor_contacto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seguradoras', function (Blueprint $table) {
            $table->dropCollumn('gestor_contacto');
        });
    }
}
