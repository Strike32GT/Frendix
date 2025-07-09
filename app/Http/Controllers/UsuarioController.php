<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function index()
    {
        $usuarios=Usuario::all();
        return view('usuario.index',compact('usuarios'));
    }

    


    public function create()
    {
        $usuarios=Usuario::all();
        return view('usuario.create');
    }

    

    public function store(Request $request)
    {
        
        $request->validate([
        'Nombre' => 'required|string|max:45',
        'Password' => 'required|string|min:4',
    ]);

    Usuario::create([
        'Nombre' => $request->Nombre,
        'Password' => $request->Password,
        'Host' => 'normal',
        'Estado' => 'Inactivo',
    ]);

    return redirect()->route('usuarios.index')->with('success', 'Usuario registrado correctamente.');


    }

    


    public function show(string $id)
    {
        //
    }

    


    public function edit(string $id)
    {
         $usuario = Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    


    public function update(Request $request, string $id)
    {
        $request->validate([
        'Nombre' => 'required|string|max:45',
        'Password' => 'required|string|min:4',
        ]);

        $usuario = Usuario::findOrFail($id);

        $usuario->update([
            'Nombre' => $request->Nombre,
            'Password' => $request->Password,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');

    }

    


    public function destroy(string $id)
    {
        $usuario=Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success','Serie eliminada Correctamente');
    }
}
