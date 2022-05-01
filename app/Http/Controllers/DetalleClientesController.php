<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class DetalleClientesController extends Controller{
    public function cliente(){
        $clientes = Cliente::all();
        return view('Clientes.clientes', compact('clientes'));
    }
    
    public function create_cliente(){
        return view('Clientes.create_cliente');
    }

    public function store(request $request)
    {
        Cliente::create($request->only('name', 'email')
        + [
            'password' => bcrypt($request->input('password')),

        ]);
        return redirect()->route('cliente')->with('success', 'Cliente registrado correctamente');
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('Clientes.editar_cliente', compact('cliente'));
    }

    public function details($id)
    {
        $cliente = Cliente::find($id);
        return view('Clientes.detalles_cliente', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findorFail($id);
        $data = $request->only('name', 'email');
        if (trim($request->password) == '') {
            $data = $request->except('password');
        } else {
            $data = $request->all();
            $data['password'] = bcrypt($request->password);
        }

        $cliente->update($data);
        return redirect()->route('cliente')->with('success', 'Cliente actualizado exitosamente');
    }

    public function delete($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente')->with('success', 'Cliente eliminado exitosamente');
    }
}
