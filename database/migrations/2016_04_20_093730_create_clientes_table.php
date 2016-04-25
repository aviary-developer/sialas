<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dui', 10);
            $table->string('nit', 16);
            $table->string('nombre', 30);
            $table->string('apellido', 30);
            $table->text('direccion'); 
            $table->string('correo');
            $table->string('telefono', 9);  
            $table->boolean('estado')->default(true); 
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
        Schema::drop('clientes');
    }
}
