<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNomeConsultorCollumnToSeguradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('segurados', function (Blueprint $table) {
            $table->string('nome_consultor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('segurados', function (Blueprint $table) {
            $table->dropColumn('nome_consultor');
        });
    }
}
