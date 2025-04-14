<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\AC_TECNICO;
use App\Models\IN_CIRCUITO;
use App\Models\IN_CUADERNO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Cuaderno extends Component
{
    public $searchCircuito='';
    public $circuitos= [];

    public $ciCircuito;
    public $search = '';
    public $circuitoId;

    public $ing_turno, $operador, $tecnico1_id, $tecnico2_id, $c_center;
    public $sin_energia, $reg, $fecha, $hora_i, $hora_f;
    public $segun, $informo_a, $causa;
    

    
    public function render()
    {
        $ListCir = IN_CIRCUITO::select('CI_SERIAL', 'CI_CIRCUITO')
        ->get();
        $ListTec = AC_TECNICO::select('TE_ID', 'TE_NOMBRE')
        ->get();
        return view('livewire.cuaderno',compact('ListCir'),compact('ListTec'));
    }


    public function guardar()
    {
        IN_CUADERNO::create([
            'ing_turno' => $this->ing_turno,
            'operador' => $this->operador,
            'tecnico1_id' => $this->tecnico1_id,
            'tecnico2_id' => $this->tecnico2_id,
            'c_center' => $this->c_center,
            'sin_energia' => $this->sin_energia,
            'reg' => $this->reg,
            'fecha' => $this->fecha,
            'hora_i' => $this->hora_i,
            'hora_f' => $this->hora_f,
            'circuito_id' => $this->circuitoId,
            'segun' => $this->segun,
            'informo_a' => $this->informo_a,
            'causa' => $this->causa,
        ]);

        $this->reset([
            'ing_turno', 'operador', 'tecnico2_id', 'c_center',
            'sin_energia', 'reg', 'fecha', 'hora_i', 'hora_f',
            'circuitoId', 'segun', 'informo_a', 'causa', 'searchCircuito'
        ]);
    }
}
