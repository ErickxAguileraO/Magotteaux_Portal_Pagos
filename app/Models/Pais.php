<?php

namespace App\Models;

use App\Traits\StatusConvert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pais extends Model
{
    use HasFactory, StatusConvert, SoftDeletes;
    public $timestamps = false;
    protected $prefix = 'pai';
    protected $table = 'paises';
    protected $primaryKey = 'pai_id';
}
