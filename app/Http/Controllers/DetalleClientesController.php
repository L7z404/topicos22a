<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetalleClientesController extends Controller{
    public function cliente(){
        return view('Clientes.clientes');
    }
    
    public function create_cliente(){
        return view('Clientes.create_cliente');
    }
}
