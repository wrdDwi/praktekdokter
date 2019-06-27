<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPasienInRmdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rekammedis', function (Blueprint $table) {
            //
            $table->dropColumn('kd_pasien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rekammedis', function (Blueprint $table) {
            //
            $table->integer('kd_pasien');
        });
    }
}
