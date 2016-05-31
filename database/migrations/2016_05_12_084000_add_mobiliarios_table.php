<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMobiliariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobiliarios', function (Blueprint $table) {
            $table->integer('idTipo');
            $table->integer('idDistribuidor');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('fecha');
            $table->double('precio');
            $table->text('descripcion');
            $table->tinyInteger('activo');
            $table->string('razon');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobiliarios', function (Blueprint $table) {
            //
        });
    }
}
