<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pago'10);
            $table->string('pago',3);
            $table->double('desde');
            $table->double('hasta');
            $table->double('porcentaje');
            $table->double('exceso');
            $table->double('cuota');
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
        Schema::drop('rentas');
    }
}
