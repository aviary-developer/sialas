<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleventas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('venta_id')->unsigned();
          $table->foreign('venta_id')->references('id')->on('ventas');
          $table->integer('producto_id')->unsigned();
          $table->foreign('producto_id')->references('id')->on('productos');
          $table->integer('presentacion_id')->unsigned();
          $table->foreign('presentacion_id')->references('id')->on('presentaciones');
          $table->integer('cantidad');
          $table->double('precio');
          $table->boolean('credito');
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
        Schema::drop('detalleventas');
    }
}
