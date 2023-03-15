<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogCarga extends Model
{
    use HasFactory;

    protected $prefix = 'log';
    protected $table = 'log_cargas';
    protected $primaryKey = 'log_id';
    protected $fillable = [
        'pro_id',
        'log_archivo',
        'log_usuario_id',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    /***********************************************************
     *  Eloquent relationships
     ************************************************************/
    public function usuario()
    {
        return $this->belongsTo(User::class, 'log_usuario_id', 'usu_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'pag_log_carga_id');
    }
}
