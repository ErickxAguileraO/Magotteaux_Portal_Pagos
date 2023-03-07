<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantas', function (Blueprint $table) {
            $table->id('pla_id');
            $table->string('pla_nombre');
            $table->boolean('pla_estado')->default(true);
            $table->unsignedBigInteger('pla_pais_id');
            $table->softDeletes();

            $table->foreign('pla_pais_id')->references('pai_id')->on('paises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantas');
    }
}
