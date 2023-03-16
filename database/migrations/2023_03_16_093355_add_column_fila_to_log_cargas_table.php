<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFilaToLogCargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_cargas', function (Blueprint $table) {
            $table->integer('log_fila')->nullable()->after('log_archivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_cargas', function (Blueprint $table) {
            $table->dropColumn('log_fila');
        });
    }
}
