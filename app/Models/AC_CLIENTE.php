<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AC_CLIENTE extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'AC_CLIENTE';
    //protected $primaryKey = 'CL_ID';
    

    protected $fillable = [
        'CL_CTACLI',
        'CL_CIRUN',
        'CL_CICOMPLEMENTO',
        'CL_RUC',
        'CL_TIPODOCUMENTO',
        'CL_PATERNO',
        'CL_MATERNO',
        'CL_NOMBRE',
        'CL_DIREC1',
        'CL_DIREC',
        'CL_NRO',
        'CL_DIRENTRE',
        'CL_DIRY',
        'CL_TELEFONO',
        'CL_LOCALIDAD',
        'CL_ZONA',
        'CL_DESCDIR',
        'CL_TIPOCONST',
        'CL_ACTIVI',
        'CL_RUTA',
        'CL_ITEMRUTA',
        'CL_CATEG',
        'CL_TARIFA',
        'CL_POSTE',
        'CL_NROVANO',
        'CL_ESTAACOM',
        'CL_CONEXACOM',
        'CL_UBCAJA',
        'CL_TIPOCONEX',
        'CL_LONGACOM',
        'CL_TIPOCAJA',
        'CL_CONDUCT',
        'CL_CALIBRE',
        'CL_AWG',
        'CL_FASEA',
        'CL_FASEB',
        'CL_FASEC',
        'CL_NEUTRO',
        'CL_POTCKW',
        'CL_ESTADO',
        'CL_FECHAI',
        'CL_CONTRATO',
        'CL_POSTE_AUX',
        'CL_RAMAL',
        'CL_TENCON',
        'CL_CATEGORIANEW',
        'CL_CATEGORIASUBNEW',
        'CL_TARIFANEW',
        'CL_ACTIVIDADNEW',
        'CL_ISRECATEGORIA',
        'CL_OBSERVACIONACTIVIDAD',
        'CL_ACTUALIZACIONID',
        'CL_REFERENCIANOMBRE',
        'CL_LOCALIZADO',
        'CL_REVISADO',
        'CL_STATUS',
        'CL_MENSAJES',
        'CL_CORREOS',
        'CL_CHANGES',
        'CL_JSONANT',
        'CL_LATITUD',
        'CL_LONGI',
        'CL_ALTITUD',
        'lat',
        'lng',
        'X',
        'Y',
        'ZONA',
        'ECUADOR',
        'lat_poste',
        'lng_poste',
        'lat_trafo',
        'lng_trafo',
        'CL_IS_GD',
        'CL_POSTE_ANTERIOR',
        'CL_NROVANO_ANTERIOR',
    ];

    protected $primaryKey = '[CL_ID]';
}
