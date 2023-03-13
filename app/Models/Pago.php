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
     *  Eloquent relationships
     ************************************************************/

     public function tipo()
     {
         return $this->belongsTo(Pago::class, 'pag_tipo_pago_id');
     }
}
