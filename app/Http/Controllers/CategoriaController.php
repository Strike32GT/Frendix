<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    


    public function index()
    {
        $categorias=Categoria::all();
        return view('categoria.index',compact('categorias'));
    }

    


    public function create()
    {
        return view('categoria.create');
    }

    



    public function store(Request $request)
    {
        $request->validate([
        'Nombre' => 'required|string|max:100',
        ]);

        Categoria::create([
        'Nombre' => $request->Nombre,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría registrada correctamente.');
    }

    


    public function show(string $id)
    {
         $categoria = Categoria::with('peliculas')->findOrFail($id);
        return view('categoria.show', compact('categoria'));
    }

    


    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    


    public function update(Request $request, string $id)
    {
        $request->validate([
        'Nombre' => 'required|string|max:100',
        ]);

        $categoria = Categoria::findOrFail($id);

        $categoria->update([
        'Nombre' => $request->Nombre,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente.');

    }

    


    public function destroy(string $id)
    {
        $categoria = Categoria::with('peliculas')->findOrFail($id);

        if ($categoria->peliculas->count() > 0) {
            return redirect()->route('categorias.index')
                ->with('error', 'No se puede eliminar la categoría porque tiene películas asociadas.');
            }

        $categoria->delete();
        return redirect()->route('categorias.index')->with('success','Categoría eliminada correctamente.');
    }
}
