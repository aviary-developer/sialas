<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajaserviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajaservicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('caja_id');
            $table->integer('servicio_id');
            $table->double('monto');
            $table->text('detalle');
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
        Schema::drop('cajaservicios');
    }
}
