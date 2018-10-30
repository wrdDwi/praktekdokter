<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_obats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',100);
            $table->dateTime('create_date');
            $table->string('create_by',50);
            $table->string('modified_by')->nullable();
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
        Schema::dropIfExists('jenis_obats');
    }
}
