<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignToUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('usu_planta_id')->references('pla_id')->on('plantas');
            $table->foreign('usu_proveedor_id')->references('pro_id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('usuarios_usu_planta_id_foreign');
            $table->dropForeign('usuarios_usu_proveedor_id_foreign');
        });
    }
}
