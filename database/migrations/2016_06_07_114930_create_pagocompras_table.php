<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagocomprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagocompras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recibo',20);
            $table->double('monto');
            $table->double('iva')->nullable();
            $table->double('interes')->nullable();
            $table->double('mora')->nullable();
            $table->string('cheque',20)->nullable();
            $table->text('detalle')->nullable();
            $table->integer('caja_id')->unsigned()->nullable();
            $table->foreign('caja_id')->references('id')->on('cajas');
            $table->integer('banco_id')->unsigned()->nullable();
            $table->foreign('banco_id')->references('id')->on('bancos');
            $table->integer('compra_id')->unsigned();
            $table->foreign('compra_id')->references('id')->on('compras');
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
        Schema::drop('pagocompras');
    }
}
