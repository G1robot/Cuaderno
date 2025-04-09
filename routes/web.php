<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\AC_CLIENTE;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CuadernoController;
use App\Livewire\Cuaderno;


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/Home',[HomeController::class,'index'])->name('home');
Route::get('/cuadernoLista',[CuadernoController::class,'lista'])->name('cuaderno.list');
Route::get('/livewire/buscar-circuitos', [Cuaderno::class, 'buscarCircuitos']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        //$clientes = DB::connection('sqlsrv')->select('select top(10) * from AC_CLIENTE');
        // $clientes = AC_CLIENTE::all();
        //dd('hola');
        return redirect('/Home');
    })->name('dashboard');
});
