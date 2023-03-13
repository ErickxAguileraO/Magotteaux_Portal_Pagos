<?php

use App\Models\Pais;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertRecordToPaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Pais::insert([
            [
                'pai_nombre' => 'Chile',
                'pai_estado' => '1',
            ],
            [
                'pai_nombre' => 'Argentina',
                'pai_estado' => '1',
            ],
            [
                'pai_nombre' => 'Perú',
                'pai_estado' => '1',
            ],
            [
                'pai_nombre' => 'Bolivia',
                'pai_estado' => '1',
            ]

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Pais::query()->delete();
    }
}
