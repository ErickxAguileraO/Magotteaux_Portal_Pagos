<?php

use App\Models\TipoPago;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_pagos', function (Blueprint $table) {
            $table->id('tip_id');
            $table->string('tip_nombre');
        });

        TipoPago::insert([
            ['tip_id' => 1, 'tip_nombre' => 'Transferencias'],
            ['tip_id' => 2, 'tip_nombre' => 'Vale vistas'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_pagos');
    }
}
