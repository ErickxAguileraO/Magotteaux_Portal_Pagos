<?php

namespace App\Imports;

use App\Models\LogCarga;
use App\Models\Pago;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CargaMasivaImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{

    private $id_carga;
    private $planta;

    public function __construct(int $id_carga, int $planta)
    {
        $this->id_carga = $id_carga;
        $this->planta = $planta;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $count = Pago::where('pag_numero_documento',$row['no_documento'])->count();
        if($count > 0){
            return null;
        }
        return new Pago([
            'pag_razon_social' => $row['razon_social'],
            'pag_cuenta' => $row['cuenta'],
            'pag_identificacion' => $row['no_identfis1'],
            'pag_referencia' => $row['referencia'],
            'pag_clase_documento' => $row['clase_de_documento'],
            'pag_numero_documento' => $row['no_documento'],
            'pag_fecha_documento' => date('Y-m-d', $row['fecha_de_documento']),
            'pag_vencimiento_neto' =>  date('Y-m-d', $row['vencimiento_neto']),
            'pag_importe_moneda' => $row['importe_en_moneda_doc'],
            'pag_moneda_documento' => $row['moneda_del_documento'],
            'pag_texto' => $row['texto'],
            'pag_asignacion' => $row['asignacion'],
            'pag_demora_vencimiento' => $row['demora_tras_vencimiento_neto'],
            'pag_tipo_pago_id' => $row['pago'],
            'pag_estado' => $row['estado'],
            'pag_planta_id' => $this->planta,
            'pag_log_carga_id' => $this->id_carga,
        ]);
    }


}
