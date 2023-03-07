<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('pag_id');
            $table->string('pag_razon_social');
            $table->string('pag_cuenta');
            $table->string('pag_identificacion');
            $table->integer('pag_referencia');
            $table->string('pag_clase_documento');
            $table->string('pag_numero_documento');
            $table->date('pag_fecha_documento');
            $table->date('pag_vencimiento_neto');
            $table->integer('pag_importe_moneda');
            $table->string('pag_moneda_documento');
            $table->string('pag_texto');
            $table->string('pag_asignacion')->nullable();
            $table->integer('pag_demora_vencimiento');
            $table->string('pag_forma_pago')->nullable();
            $table->string('pag_estado')->nullable();
            $table->unsignedBigInteger('pag_planta_id');
            $table->unsignedBigInteger('pag_log_carga_id');
            $table->timestamps();
            
            $table->foreign('pag_planta_id')->references('pla_id')->on('plantas');
            $table->foreign('pag_log_carga_id')->references('log_id')->on('log_cargas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
