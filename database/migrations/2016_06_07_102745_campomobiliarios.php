<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Campomobiliarios extends Migration
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
            $table->double('precioventa',2)->nullable();
            $table->string('institucion',80)->nullable();
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
