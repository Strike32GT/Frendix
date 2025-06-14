<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Episodio;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series=Serie::with(['episodios' => function($query){
            $query->select('id_series','temporada')
            ->distinct();
        }])->get();

        return view('serie.index',compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('serie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre'=>'required|string|max:45',
            'Trailer'=>'required|string|max:255',
            'Descripcion'=>'required|string|max:255',
            'Miniatura'=>'required|string|max:255'
        ]);

        Serie::create($request->all());
        return redirect()->route('series.index')->with('success','Serie agregada :D');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $serie=Serie::findOrFail($id);
        return view('serie.edit',compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Nombre'=>'required|string|max:45',
            'Trailer'=>'required|string|max:255',
            'Descripcion'=>'required|string|max:255',
            'Miniatura'=>'required|string|max:255'
        ]);
        $serie=Serie::findOrFail($id);
        $serie->update($request->all());

        return redirect()->route('serie.index')->with('success','Serie actualizada :D');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serie=Serie::findOrFail($id);
        $serie->delete();

        return redirect()->route('serie.index')->with('success','Serie eliminada :D');
    }
}
