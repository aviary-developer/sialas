<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSueldonetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datosplanillas', function (Blueprint $table) {
            $table->double('salario_neto');
            $table->double('valor_renta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datosplanillas', function (Blueprint $table) {
            //
        });
    }
}
