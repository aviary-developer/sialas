<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancoserviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancoservicios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('banco_id');
            $table->double('cantidad');
            $table->string('detalle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bancoservicios');
    }
}
