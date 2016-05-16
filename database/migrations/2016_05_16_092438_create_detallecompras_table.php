<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallecomprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecompras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compra_id')->unsigned();
            $table->foreign('compra_id')->references('id')->on('compras');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->integer('presentacion_id')->unsigned();
            $table->foreign('presentacion_id')->references('id')->on('presentaciones');
            $table->integer('cantidad');
            $table->double('precio');
            $table->boolean('entrega');
            $table->date('fecha_caducidad');
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
        Schema::drop('detallecompras');
    }
}
