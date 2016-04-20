<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');//NO TOCAR
            $table->string('name');//NO TOCAR
            $table->string('email')->unique();/////////NO TOCAR
            $table->string('password', 60);//////////NOOOO TOCAR
            $table->rememberToken();
            $table->timestamps();
            $table->string('nom_usuario');
            $table->double('salario');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->double('comision');
            $table->date('fecha_de_nacimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
