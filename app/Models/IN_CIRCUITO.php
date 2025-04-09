<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IN_CIRCUITO extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'IN_CIRCUITO';
    protected $fillable = ['CI_CIRCUITO'];
    protected $primaryKey = 'CI_SERIAL';
    public $timestamps = false;
}
