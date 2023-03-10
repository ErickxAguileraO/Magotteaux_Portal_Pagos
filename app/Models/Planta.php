<?php

namespace App\Models;

use App\Traits\StatusConvert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Planta extends Model
{
    use HasFactory, StatusConvert, SoftDeletes;

    public $timestamps = false;
    protected $table = 'plantas';
    protected $prefix = 'pla';
    protected $primaryKey = 'pla_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pla_id',
        'pla_nombre',
        'pla_estado',
        'pla_pais_id',
    ];

    /***********************************************************
     *  Local scope
     ************************************************************/

    public function scopeActive($query)
    {
        return $query->where('pla_estado', 1);
    }


    /***********************************************************
     *  Eloquent relationships
     ************************************************************/
}
