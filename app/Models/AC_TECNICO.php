<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AC_TECNICO extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'AC_TECNICO';
    protected $fillable = ['TE_NOMBRE'];
    protected $primaryKey = 'TE_ID';
    public $timestamps = false;
}
