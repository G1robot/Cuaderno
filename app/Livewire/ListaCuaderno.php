<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\IN_CUADERNO;
use App\Models\IN_CIRCUITO;

class ListaCuaderno extends Component
{
    public $search = '';
    public $circuitoId;

    public $ing_turno, $operador, $tecnico1_id, $tecnico2_id, $c_center;
    public $sin_energia, $reg, $fecha, $hora_i, $hora_f;
    public $segun, $informo_a, $causa;
    public $showModal=true;
    public $cuadernoId;

    public function render()
    {
        $cuadernos = IN_CUADERNO::all();
        $ListCir = IN_CIRCUITO::select('CI_SERIAL', 'CI_CIRCUITO')
        ->get();
        return view('livewire.lista-cuaderno',compact('cuadernos'),compact('ListCir'));
    }

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
            $this->hora_i = $cuaderno->hora_i;
            $this->hora_f = $cuaderno->hora_f;
            $this->segun = $cuaderno->segun;
            $this->informo_a = $cuaderno->informo_a;
            $this->causa = $cuaderno->causa;

            // Open the modal
            $this->showModal = true;
        } else {
            session()->flash('error', 'Cuaderno not found.');
        }
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
                    'segun' => $this->segun,
                    'informo_a' => $this->informo_a,
                    'causa' => $this->causa
                ]);
                session()->flash('message', 'Cuaderno updated successfully.');
            } else {
                session()->flash('error', 'Cuaderno not found.');
            }
        }
       

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
