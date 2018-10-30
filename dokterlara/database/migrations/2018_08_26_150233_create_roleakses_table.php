<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleaksesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roleakses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kd_role');
            $table->integer('kd_menu');
            $table->char('action',2);
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
        Schema::dropIfExists('roleakses');
    }
}
