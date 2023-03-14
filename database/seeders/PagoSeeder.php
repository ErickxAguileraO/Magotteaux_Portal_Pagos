<?php

namespace Database\Seeders;

use App\Models\Pago;
use Illuminate\Database\Seeder;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            Pago::create([
                'pag_razon_social' => 'aaaaaa' . $i,
                'pag_cuenta' => 'bbbbb' . $i,
                'pag_identificacion' => random_int(1000, 9999999),
                'pag_referencia' => random_int(10000, 999999999),
                'pag_clase_documento' => 'clase-doc-prueba' . $i,
                'pag_numero_documento' => 'numero-doc' . $i,
                'pag_fecha_documento' => now()->format('Y-m-d'),
                'pag_vencimiento_neto' => now()->format('Y-m-d'),
                'pag_importe_moneda' => random_int(1000, 9999999),
                'pag_moneda_documento' => 'CLP',
                'pag_texto' => 'texto de ejemplo' . $i,
                'pag_asignacion' => 'asignacion de ejemplo' . $i,
                'pag_demora_vencimiento' => random_int(1, 1000),
                'pag_forma_pago' => 'campo formato' . $i,
                'pag_estado' => 1,
                'pag_planta_id' => rand(1, 2),
                'pag_log_carga_id' => rand(1, 5),
            ]);
        }
    }
}
