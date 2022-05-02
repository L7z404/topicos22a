<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class DetalleProductosController extends Controller
{
    public function producto()
    {
        $productos = Productos::all();
        return view('Productos.productos', compact('productos'));
    }

    public function create_producto()
    {
        return view('Productos.create_productos');
    }

    public function store(request $request)
    {
        Productos::create($request->only('name', 'email')
            + [
                'password' => bcrypt($request->input('password')),

            ]);
        return redirect()->route('producto')->with('success', 'Producto registrado correctamente');
    }

    public function edit($id)
    {
        $producto = Productos::find($id);
        return view('Productos.editar_productos', compact('producto'));
    }

    public function details($id)
    {
        $producto = Productos::find($id);
        return view('Productos.detalles_productos', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Productos::findorFail($id);
        $data = $request->only('name', 'email');
        if (trim($request->password) == '') {
            $data = $request->except('password');
        } else {
            $data = $request->all();
            $data['password'] = bcrypt($request->password);
        }

        $producto->update($data);
        return redirect()->route('producto')->with('success', 'Producto actualizado exitosamente');
    }

    public function delete($id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete();
        return redirect()->route('producto')->with('success', 'Producto eliminado exitosamente');
    }
}
