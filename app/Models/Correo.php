<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $prefix = 'cor';
    protected $table = 'correos';
    protected $primaryKey = 'cor_id';
    protected $fillable = [
        'cor_id',
        'cor_email',
        'cor_proveedor_id',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'cor_proveedor_id', 'pro_id');
    }
}
