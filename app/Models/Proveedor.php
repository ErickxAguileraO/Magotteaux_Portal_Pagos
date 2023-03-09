<?php

namespace App\Models;

use App\Traits\StatusConvert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory, StatusConvert, SoftDeletes;

    public $timestamps = false;
    protected $prefix = 'pro';
    protected $table = 'proveedores';
    protected $primaryKey = 'pro_id';
    protected $fillable = [
        'pro_id',
        'pro_razon_social',
        'pro_identificacion',
        'pro_telefono',
        'pro_estado',
        'pro_pais_id',
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pro_pais_id', 'pai_id');
    }
}
