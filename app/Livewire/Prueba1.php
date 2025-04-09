<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\models\Cliente;

class Prueba1 extends Component
{
    
    public function render()
    {
        // $clientes = Cliente::all();
        // dd($clientes);

        $clientes = DB::connection('sqlsrv')->table('AC_CLIENTE')->take(5)->get();
        dd($clientes);
        return view('livewire.prueba1');
    }
}
