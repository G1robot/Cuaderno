<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\IN_CUADERNO;
use App\Models\IN_CIRCUITO;
use App\Models\AC_TECNICO;

class ListaCuaderno extends Component
{
    public $search = '';
    public $circuitoId;
    public $fecha_inicio;
    public $fecha_fin;


    public $ing_turno, $operador, $tecnico1_id, $tecnico2_id, $c_center;
    public $sin_energia, $reg, $fecha, $hora_i, $hora_f, $ci_circuito;
    public $segun, $informo_a, $causa;
    public $showModal=false;
    public $cuadernoId;
    public $nom_tecnico1;
    public $nom_tecnico2;
    public $tecnico1, $tecnico2;

    public function render()
    {
        $cuadernos = IN_CUADERNO::query()
        ->when($this->fecha_inicio, fn($query) =>
            $query->where('fecha', '>=', $this->fecha_inicio)
        )
        ->when($this->fecha_fin, fn($query) =>
            $query->where('fecha', '<=', $this->fecha_fin)
        )
        ->get();

        $ListCir = IN_CIRCUITO::select('CI_SERIAL', 'CI_CIRCUITO')
        ->get();
        $ListTecnico = AC_TECNICO::select('TE_ID', 'TE_NOMBRE')
        ->get();
        // $this->fecha_inicio = null;
        // $this->fecha_fin = null;
        return view('livewire.lista-cuaderno', compact('cuadernos', 'ListCir', 'ListTecnico'));
    }
    public function filtrar(){}

    public function openModal(){
        $this->showModal=true;
    }
    public function closeModal(){
        $this->showModal=false;
    }

    public function editar($id)
    {
        $this->cuadernoId = $id;
        $cuaderno = IN_CUADERNO::find($id);
        if ($cuaderno) {
            $this->ing_turno = $cuaderno->ing_turno;
            $this->operador = $cuaderno->operador;
            $this->tecnico1_id = $cuaderno->tecnico1_id;
            $this->tecnico2_id = $cuaderno->tecnico2_id;
            $this->c_center = $cuaderno->c_center;
            $this->sin_energia = $cuaderno->sin_energia;
            $this->reg = $cuaderno->reg;
            $this->fecha = $cuaderno->fecha;
            $this->hora_i = substr($cuaderno->hora_i, 0, 5);
            $this->hora_f = substr($cuaderno->hora_f, 0, 5);
            $this->circuitoId = $cuaderno->circuito_id;
            $this->segun = $cuaderno->segun;
            $this->informo_a = $cuaderno->informo_a;
            $this->causa = $cuaderno->causa;

            $this->showModal = true;
        } 
        $circuito = IN_CIRCUITO::where('CI_SERIAL', $this->circuitoId)->first();
        if ($circuito) {
            $this->ci_circuito = $circuito->CI_CIRCUITO;
        }
        $tecnico1 = AC_TECNICO::where('TE_ID', $this->tecnico1_id)->first();
        if ($tecnico1) {
            $this->nom_tecnico1 = $tecnico1->TE_NOMBRE;
        }
        $tecnico2 = AC_TECNICO::where('TE_ID', $this->tecnico2_id)->first();
        if ($tecnico2) {
            $this->nom_tecnico2 = $tecnico2->TE_NOMBRE;
        }

        //dd($this->nom_tecnico1, $this->nom_tecnico2);
    }

    public function actualizar()
    {
        if ($this->cuadernoId) {
            $cuaderno = IN_CUADERNO::find($this->cuadernoId);
            if ($cuaderno) {
                $cuaderno->update([
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
                    'causa' => $this->causa
                ]);
            } 
        }
        $this->closeModal();
       

    }

    public function delete($id)
    {
        $cuaderno = IN_CUADERNO::find($id);
        if ($cuaderno) {
            $cuaderno->delete();
            session()->flash('message', 'Cuaderno deleted successfully.');
        } else {
            session()->flash('error', 'Cuaderno not found.');
        }
    }
}
