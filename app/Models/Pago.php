<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';
    protected $prefix = 'pag';
    protected $primaryKey = 'pag_id';

    protected $fillable = [
        'pag_id',
        'pag_razon_social',
        'pag_cuenta',
        'pag_identificacion',
        'pag_referencia',
        'pag_clase_documento',
        'pag_numero_documento',
        'pag_fecha_documento',
        'pag_vencimiento_neto',
        'pag_importe_moneda',
        'pag_moneda_documento',
        'pag_texto',
        'pag_asignacion',
        'pag_demora_vencimiento',
        'pag_tipo_pago_id',
        'pag_estado',
        'pag_planta_id',
        'pag_log_carga_id',
    ];


    /***********************************************************
     *  Eloquent relationships
     ************************************************************/

     public function tipoPago()
     {
         return $this->belongsTo(TipoPago::class, 'pag_tipo_pago_id', 'tip_id');
     }
}
