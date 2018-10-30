<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kd_pasien');
            $table->string('nama_lengkap',100);
            $table->string('tmp_lahir',30);
            $table->date('tgl_lahir');
            $table->char('gender',1);
            $table->integer('no_ktp')->nullable();
            $table->string('alamat');
            $table->string('nama_ibu');
            $table->string('no_telp',15);
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
        Schema::dropIfExists('pasiens');
    }
}
