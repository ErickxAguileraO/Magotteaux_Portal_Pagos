<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoPagoIdToPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->unsignedBigInteger('pag_tipo_pago_id')->after('pag_log_carga_id');

            $table->foreign('pag_tipo_pago_id')->references('tip_id')->on('tipo_pagos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropForeign('pagos_pag_tipo_pago_id_foreign');
            $table->dropColumn('pag_tipo_pago_id');
        });
    }
}
