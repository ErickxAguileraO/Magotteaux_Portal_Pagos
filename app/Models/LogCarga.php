<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogCarga extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $prefix = 'log';
    protected $table = 'log_cargas';
    protected $primaryKey = 'log_id';
    protected $fillable = [
        'pro_id',
        'log_archivo',
        'log_usuario_id',
    ];

    /***********************************************************
     *  Eloquent relationships
     ************************************************************/
    public function pais()
    {
        return $this->belongsTo(User::class, 'log_usuario_id', 'usu_id');
    }
}
