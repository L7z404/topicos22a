<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class DetalleProveedorController extends Controller
{
    public function proveedor()
    {
        $proveedores = Proveedores::all();
        return view('Proveedores.proveedores', compact('proveedores'));
    }

    public function create_proveedor()
    {
        return view('Proveedores.create_proveedores');
    }

    public function store(request $request)
    {
        Proveedores::create($request->only('name', 'email')
            + [
                'password' => bcrypt($request->input('password')),

            ]);
        return redirect()->route('proveedor')->with('success', 'Proveedor registrado correctamente');
    }

    public function edit($id)
    {
        $proveedor = Proveedores::find($id);
        return view('Proveedores.editar_proveedor', compact('proveedor'));
    }

    public function details($id)
    {
        $proveedor = Proveedores::find($id);
        return view('Proveedores.detalles_proveedor', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedores::findorFail($id);
        $data = $request->only('name', 'email');
        if (trim($request->password) == '') {
            $data = $request->except('password');
        } else {
            $data = $request->all();
            $data['password'] = bcrypt($request->password);
        }

        $proveedor->update($data);
        return redirect()->route('proveedor')->with('success', 'Proveedor actualizado exitosamente');
    }

    public function delete($id)
    {
        $proveedor = Proveedores::findOrFail($id);
        $proveedor->delete();
        return redirect()->route('proveedor')->with('success', 'Proveedor eliminado exitosamente');
    }
}
