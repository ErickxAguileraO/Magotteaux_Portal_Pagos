<?php

use App\Models\Planta;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertRecordToPlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Planta::insert([
            [
                'pla_nombre' => 'Antofagásta ',
                'pla_estado' => 1,
                'pla_pais_id' => 1,
            ],
            [
                'pla_nombre' => 'Til Til ',
                'pla_estado' => 1,
                'pla_pais_id' => 1,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Planta::query()->delete();
    }
}
