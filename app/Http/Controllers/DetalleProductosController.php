<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetalleProductosController extends Controller
{
    public function producto()
    {
        return view('Productos.productos');
    }
}
