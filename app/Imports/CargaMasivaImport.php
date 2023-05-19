<?php

namespace App\Imports;

use App\Models\LogCarga;
use App\Models\Pago;
use App\Models\Proveedor;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CargaMasivaImport implements ToModel, WithHeadingRow, SkipsEmptyRows, WithValidation
{

    private $id_carga;
    private $planta;
    private $rows = 0;
    private $identificadores = [];
    private $identificadoresModificados = [];
    private $cambioEstado = [];
    private $factura = [];

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
        ++$this->rows;

        $existingPago = Pago::where('pag_numero_documento', $row['no_documento'])->first();
        if ($existingPago !== null) {
            $existingPago->update([
                'pag_tipo_pago_id' => $row['pago'],
                'pag_importe_moneda' => $row['importe_en_moneda_doc'],
                'pag_moneda_documento' => $row['moneda_del_documento'],
            ]);
        }

        if ($existingPago) {
            if ($existingPago->pag_estado === $row['estado']) {
                return null;
            }

            $existingPago->update([
                'pag_estado' => $row['estado'],
            ]);
            $this->cambioEstado[] = $row['estado'];
            $this->factura[] = $row['no_documento'];
            $this->identificadoresModificados[] = $row['no_identfis1'];
            return null;
        }
        $this->identificadores[] = $row['no_identfis1'];
        $fecha1 = Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($row['fecha_de_documento'] - 2)->toDateString();
        $fecha2 = Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($row['vencimiento_neto'] - 2)->toDateString();

        return new Pago([
            'pag_razon_social' => $row['razon_social'],
            'pag_cuenta' => $row['cuenta'],
            'pag_identificacion' => $row['no_identfis1'],
            'pag_referencia' => $row['referencia'],
            'pag_clase_documento' => $row['clase_de_documento'],
            'pag_numero_documento' => $row['no_documento'],
            'pag_fecha_documento' => $fecha1,
            'pag_vencimiento_neto' => $fecha2,
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

    public function rules(): array
    {
        return [
            '*.razon_social' => ['required'],
            '*.cuenta' => ['required','numeric'],
            '*.no_identfis1' => ['required'],
            '*.referencia' => ['required','numeric'],
            '*.clase_de_documento' => ['required'],
            '*.no_documento' => ['required','numeric'],
            '*.importe_en_moneda_doc' => ['numeric'],
            '*.demora_tras_vencimiento_neto' => ['numeric'],
            '*.pago' => ['numeric', 'in:1,2'],
        ];
    }

    public function getRowCount(){
        return $this->rows;
    }

    public function getIndentificadores(){

        return collect($this->identificadores)->unique()->values();
    }

    public function getCambioEstado(){
        $finalEstado=[];
        $this->cambioEstado;
        $this->factura;
        $c=0;
        foreach ($this->cambioEstado as  $estado) {
            $finalEstado[]=$this->factura[$c].' a '.$estado;
            $c++;
        }
        return $finalEstado;
    }

    public function getProveedor(){
        $identificaciones_encontradas = [];
        $proveedores = Proveedor::whereIn('pro_identificacion', $this->identificadoresModificados)->get();

        foreach ($proveedores as $proveedor) {
            $identificacion = $proveedor->pro_identificacion;
            if (!in_array($identificacion, $identificaciones_encontradas)) {
                $identificaciones_encontradas[] = $identificacion;
            }
        }
        return $identificaciones_encontradas;
    }

}
