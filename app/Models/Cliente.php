<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'Cliente'; 
    protected $fillable = ['Nombre','Apellido','Ci','nit','Telefono','id_categoria'];
    protected $primaryKey = '[IdCliente]';
}
