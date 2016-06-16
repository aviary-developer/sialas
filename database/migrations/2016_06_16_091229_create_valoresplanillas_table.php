<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoresplanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoresplanillas', function (Blueprint $table) {
          $table->integer('id');
          $table->primary('id');
          $table->integer('dato_id');
          $table->foreign('dato_id')->references('id')->on('datosplanillas');
          $table->integer('desp_id');
          $table->foreign('desp_id')->references('id')->on('descuentoaportes');
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
        Schema::drop('valoresplanillas');
    }
}
