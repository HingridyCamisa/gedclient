<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPessoaContactoCollumnToProspecaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prospecaos', function (Blueprint $table) {
            $table->string('pessoa_contacto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prospecaos', function (Blueprint $table) {
            $table->dropColumn('pessoa_contacto');
        });
    }
}
