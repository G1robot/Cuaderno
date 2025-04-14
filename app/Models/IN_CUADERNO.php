<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IN_CIRCUITO;
use App\Models\AC_TECNICO;

class IN_CUADERNO extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'IN_CUADERNO';
    protected $fillable = [
        'ing_turno',
        'operador',
        'tecnico1_id',
        'tecnico2_id',
        'c_center',
        'sin_energia',
        'reg',
        'fecha',
        'hora_i',
        'hora_f',
        'circuito_id',
        'segun',
        'informo_a',
        'causa',
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function circuito()
    {
        return $this->belongsTo(IN_CIRCUITO::class, 'circuito_id', 'CI_SERIAL');
    }
    public function tecnico2()
    {
        return $this->belongsTo(AC_TECNICO::class, 'tecnico2_id', 'TE_ID');
    }
    public function tecnico1()
    {
        return $this->belongsTo(AC_TECNICO::class, 'tecnico1_id', 'TE_ID');
    }
}
