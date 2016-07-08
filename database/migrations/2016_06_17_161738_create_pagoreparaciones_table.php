<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoreparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagoreparaciones', function (Blueprint $table) {
            $table->increments('id');
          $table->string('factura',40);
          $table->integer('reparacion_id')->unsigned()->nullable();
          $table->foreign('reparacion_id')->references('id')->on('reparaciones');
          $table->integer('caja_id')->unsigned()->nullable();
          $table->foreign('caja_id')->references('id')->on('cajas');
          $table->integer('banco_id')->unsigned()->nullable();
          $table->foreign('banco_id')->references('id')->on('bancos');
          //Monto abonado o pagado
          $table->double('monto');
          //Valor por interes
          $table->double('interes')->nullable();
          //Valor cancelado por mora
          $table->double('mora')->nullable();
          //Valor de iva que se cance la por el bien
          $table->double('iva')->nullable();
          //Número de cheque con que se cancela
          $table->string('cheque')->nullable();
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
        Schema::drop('pagoreparaciones');
    }
}
