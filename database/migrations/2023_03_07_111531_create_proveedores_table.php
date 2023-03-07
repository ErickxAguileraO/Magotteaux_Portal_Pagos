<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('pro_id');
            $table->string('pro_razon_social');
            $table->string('pro_identificacion');
            $table->string('pro_telefono');
            $table->boolean('pro_estado')->default(true);
            $table->unsignedBigInteger('pro_pais_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pro_pais_id')->references('pai_id')->on('paises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
