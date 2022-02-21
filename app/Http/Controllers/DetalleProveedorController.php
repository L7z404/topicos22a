<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetalleProveedorController extends Controller
{
    public function proveedor()
    {
        return view('Proveedores.proveedores');
    }
}
