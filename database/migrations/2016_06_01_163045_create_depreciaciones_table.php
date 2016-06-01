<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepreciacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depreciaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mobiliario_id')->unsigned();
            $table->foreign('mobiliario_id')->references('id')->on('mobiliarios');
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
        Schema::drop('depreciaciones');
    }
}
