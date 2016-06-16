<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosplanillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datosplanillas', function (Blueprint $table) {
          $table->integer('id');
          $table->primary('id');
          $table->integer('planilla_id');
          $table->foreign('planilla_id')->references('id')->on('planillas');
          $table->integer('user_id');
          $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('datosplanillas');
    }
}
