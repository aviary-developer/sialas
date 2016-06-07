<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullPagoServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagoservicios', function (Blueprint $table) {
            $table->integer('caja_id')->nullable()->change();
            $table->integer('banco_id')->nullable()->change();
            $table->string('cheque',20)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagoservicios', function (Blueprint $table) {
            //
        });
    }
}
