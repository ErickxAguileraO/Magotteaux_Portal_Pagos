<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogCarga extends Model
{
    use HasFactory;

    protected $table = 'log_cargas';
    protected $prefix = 'log';
    protected $primaryKey = 'log_id';

    protected $fillable = [
        'log_id',
        'log_archivo',
        'log_usuario_id'
    ];
}
