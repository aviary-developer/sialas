<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banconombre');
            $table->integer('caja_id')->unsigned()->nullable();
            $table->foreign('caja_id')->references('id')->on('cajas');
            $table->integer('banco_id')->unsigned()->nullable();
            $table->foreign('banco_id')->references('id')->on('bancos');
            $table->integer('cuenta',15);
            $table->double('monto');
            $table->double('interes');
            $table->integer('num_cuotas');
            $table->double('valor_cuotas');
            $table->integer('dia_pago');
            $table->boolean('deposito');
            $table->text('garantia')->nullable();
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
        Schema::drop('prestamos');
    }
}
