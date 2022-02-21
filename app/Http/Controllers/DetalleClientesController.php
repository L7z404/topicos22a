<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetalleClientesController extends Controller
{
    public function cliente()
    {
        return view('Clientes.clientes');
    }
}
