<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('banco_id')->unsigned();
            $table->foreign('banco_id')->references('id')->on('bancos');
            $table->integer('caja_id')->unsigned();
            $table->foreign('caja_id')->references('id')->on('cajas');
            $table->boolean('transaccion')->default(false);
            $table->double('monto');
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
        Schema::drop('remesas');
    }
}
