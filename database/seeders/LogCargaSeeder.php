<?php

namespace Database\Seeders;

use App\Models\LogCarga;
use Illuminate\Database\Seeder;

class LogCargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LogCarga::insert([
            ['log_archivo' => 'archivo 1', 'log_usuario_id' => 2, 'created_at' => now()],
            ['log_archivo' => 'archivo 2', 'log_usuario_id' => 2, 'created_at' => now()],
            ['log_archivo' => 'archivo 3', 'log_usuario_id' => 2, 'created_at' => now()],
            ['log_archivo' => 'archivo 4', 'log_usuario_id' => 2, 'created_at' => now()],
            ['log_archivo' => 'archivo 5', 'log_usuario_id' => 2, 'created_at' => now()],
        ]);
    }
}
