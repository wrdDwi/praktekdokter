<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nama');
			$table->integer('kd_jenis');
			$table->integer('stok');
			$table->decimal('harga_beli',6,2);
			$table->decimal('harga_jual',6,2);
			$table->integer('kd_satuan');
			$table->dateTime('create_at');
			$table->string('create_by');
			$table->dateTime('modified_at')->nullable();
			$table->string('modified_by')->nullable();
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
        Schema::dropIfExists('obats');
    }
}
