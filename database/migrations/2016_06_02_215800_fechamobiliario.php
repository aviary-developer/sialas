<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fechamobiliario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobiliarios', function (Blueprint $table) {
            //
            $table->date('fecha_compra');
             $table->string('fecha')->nullable()->change();
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobiliarios', function (Blueprint $table) {
            //
        });
    }
}
