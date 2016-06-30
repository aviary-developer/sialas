<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajausuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajausuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('caja_id');
            $table->foreign('caja_id')->references('id')->on('cajas');
            $table->integer('planilla_id');
            $table->foreign('planilla_id')->references('id')->on('planillas');
            $table->double('cantidad');
            $table->string('detalle');
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
        Schema::drop('cajausuarios');
    }
}
