<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobiliariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiliarios', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('idTipo');
            $table->increments('idProveedor');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('fecha');
            $table->double('precio');
            $table->integer('depreciacion');
            $table->integer('residuo');
            $table->string('descripcion');
            $table->tinyInteger('activo');
            $table->string('razon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mobiliarios');
    }
}
