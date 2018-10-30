<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResepdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resepdetail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kd_resep');
            $table->integer('kd_obat');
            $table->integer('jumlah');
            $table->string('aturan',100);
            $table->float('harga');
            $table->string('keterangan')->nullable();
            $table->tinyInteger('beli_luar');
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
        Schema::dropIfExists('resepdetail');
    }
}
