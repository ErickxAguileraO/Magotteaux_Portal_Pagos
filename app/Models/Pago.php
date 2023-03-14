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

    /***********************************************************
     *  Local scope
     ************************************************************/

    public function scopeWithFilters($query)
    {
        $proveedor = auth()->user()->proveedor;

        return $query->when(request('inicio'), function ($query, $inicio) {
            $query->where('pag_fecha_documento', '>=', $inicio);
        })->when(request('termino'), function ($query, $termino) {
            $query->where('pag_vencimiento_neto', '<=', $termino);
        })->when(!$proveedor && request('planta'), function ($query) {
            $query->where('pag_planta_id', request('planta'));
        })->when($proveedor, function ($query, $proveedor) {
            $query->where('pag_identificacion', $proveedor->pro_identificacion);
        });
    }

    /***********************************************************
     *  Eloquent relationships
     ************************************************************/

    public function planta()
    {
        return $this->belongsTo(Planta::class, 'pag_planta_id', 'pla_id');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoPago::class, 'pag_tipo_pago_id');
    }
}
