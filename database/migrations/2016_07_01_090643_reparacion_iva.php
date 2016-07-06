<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReparacionIva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reparaciones', function (Blueprint $table) {
          $table->dropColumn('dia_pago');
          $table->double('iva')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reparaciones', function (Blueprint $table) {
            //
        });
    }
}
