<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function user(User $user)
    {
        $users = User::all();
        return view('Usuarios.usuarios', compact('users'));
    }
    
    public function create_user(){
        return view('Usuarios.create_usuario');
    }
    
    public function store(request $request){
        User::create($request->only('name','email')
        +[
            'password'=>bcrypt($request->input('password')),
            
        ]);
        return redirect()->route('usuarios.index')->with('success','Usuario registrado correctamente');
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('Usuarios.editar_usuario', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = user::find($id);
        $user->update($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }
    
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
