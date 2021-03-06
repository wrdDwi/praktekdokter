<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekammedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekammedis', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kd_rm',8);
            $table->integer('kd_pasien');
            $table->string('keluhan');
            $table->string('tindakan');
            $table->string('diagnosa');
            $table->integer('kd_dokter');
            $table->string('create_by',50);
            $table->dateTime('create_date');
            $table->string('modified_by',50)->nullable();
            $table->dateTime('modified_date')->nullable();
            $table->tinyInteger('is_deleted');
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
        Schema::dropIfExists('rekammedis');
    }
}
