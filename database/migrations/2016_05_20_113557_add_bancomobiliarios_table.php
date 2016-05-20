<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBancomobiliariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bancomobiliarios', function (Blueprint $table) {
            $table->integer('mobiliario_id')->unsigned();
            $table->foreign('mobiliario_id')->references('id')->on('mobiliarios');
            $table->integer('banco_id')->unsigned()->change();
            $table->foreign('banco_id')->references('id')->on('bancos');
            $table->string('cheque');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bancomobiliarios', function (Blueprint $table) {
            //
        });
    }
}
