<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Categoria;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{

    public function index()
    {
        $peliculas = Pelicula::with('categoria')->get();
        return view('pelicula.index', compact('peliculas'));
    }



    public function create()
    {
        $categorias = Categoria::all();
        return view('pelicula.subir', compact('categorias'));
    }



    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'nombre'              => 'required|string|max:255',
            'Categoria_Pelicula'  => 'required|integer|exists:categories,_id_categories',
            'descripcion'         => 'required|string',
            'url_trailer'         => 'nullable|url',
            'url_pelicula'        => 'required|url',
            'imagen'              => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Subida de imagen
        $miniatura = null;
        if ($request->hasFile('imagen')) {
            $miniatura = $request->file('imagen')->store('miniaturas', 'public');
        }

        // Creación de película
        Pelicula::create([
            'Nombre'              => $request->nombre,
            'Admin_id_admin'      => 1, // Cambiar por auth()->id() si se usa autenticación
            'Trailer'             => $request->url_trailer,
            'Descripcion'         => $request->descripcion,
            'URL'                 => $request->url_pelicula,
            'Miniatura'           => $miniatura,
            'Fecha_Subida'        => now(),
            'Categoria_Pelicula'  => $request->Categoria_Pelicula,
        ]);

        return redirect()->route('peliculas.index')->with('success', 'Película registrada correctamente.');
    }


    public function show(string $id)
    {
        //
    }



    public function edit(string $id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $categorias = Categoria::all();
        return view('pelicula.edit', compact('pelicula', 'categorias'));
    }



    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre'              => 'required|string|max:255',
            'Categoria_Pelicula'  => 'required|integer|exists:categories,_id_categories',
            'descripcion'         => 'required|string',
            'url_trailer'         => 'nullable|url',
            'url_pelicula'        => 'required|url',
            'imagen'              => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pelicula = Pelicula::findOrFail($id);

        $miniatura = $pelicula->Miniatura;
        if ($request->hasFile('imagen')) {
            $miniatura = $request->file('imagen')->store('miniaturas', 'public');
        }

        $pelicula->update([
            'Nombre'              => $request->nombre,
            'Trailer'             => $request->url_trailer,
            'Descripcion'         => $request->descripcion,
            'URL'                 => $request->url_pelicula,
            'Miniatura'           => $miniatura,
            'Categoria_Pelicula'  => $request->Categoria_Pelicula,
        ]);

        return redirect()->route('peliculas.index')->with('success', 'Película actualizada correctamente.');
    }




    public function destroy(string $id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->delete();

        return redirect()->route('peliculas.index')->with('success', 'Película eliminada exitosamente');
    }
}
