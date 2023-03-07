<?php

namespace App\Models;

use App\Traits\StatusConvert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory, StatusConvert, SoftDeletes;

    protected $table = 'proveedores';
    protected $prefix = 'pro';
    protected $primaryKey = 'pro_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pro_id',
        'pro_razon_social',
        'pro_identificacion',
        'pro_telefono',
        'pro_estado',
        'pro_pais_id',
    ];

    /***********************************************************
     *  Local scope
     ************************************************************/

    public function scopeActive($query)
    {
        return $query->where('pro_estado', 1);
    }


    /***********************************************************
     *  Eloquent relationships
     ************************************************************/
}
