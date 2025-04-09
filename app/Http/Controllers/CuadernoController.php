<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuadernoController extends Controller
{
    public function index()
    {
        return view('cuaderno.index'); 
    }
    public function lista()
    {
        return view('cuaderno.list'); 
    }
}
