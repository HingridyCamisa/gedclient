<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataNascimentoCollumnToConsultorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultors', function (Blueprint $table) {
            $table->date('data_nascimento')->default('1970-01-01');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultors', function (Blueprint $table) {
            $table->dropCollumn('data_nascimento');
        });
    }
}
