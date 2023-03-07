<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogCargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_cargas', function (Blueprint $table) {
            $table->id('log_id');
            $table->string('log_archivo');
            $table->unsignedBigInteger('log_usuario_id');
            $table->timestamps();

            $table->foreign('log_usuario_id')->references('usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_cargas');
    }
}
