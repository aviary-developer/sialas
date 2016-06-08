<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->double('precio',2);
            $table->date('fecha_deposito');
            $table->date('fecha_entrega')->nullable();
            $table->text('diagnostico');
            $table->integer('proveedor_id')->unsigned();
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->integer('mobiliario_id')->unsigned();
            $table->foreign('mobiliario_id')->references('id')->on('mobiliarios');
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
        Schema::drop('reparaciones');
    }
}
