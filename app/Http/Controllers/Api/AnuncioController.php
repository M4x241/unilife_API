<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = \App\Models\Anuncio::query()->orderBy('fecha_inicio', 'desc');

        // Filter by carrera if provided
        if ($request->has('carrera')) {
            $query->where('carrera', $request->carrera);
        }

        // Filter by categoria if provided
        if ($request->has('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        $anuncios = $query->get();
        return response()->json($anuncios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'carrera' => 'required|in:Ciencias de la Computación,Telecomunicaciones,TIC,Sistemas',
            'anuncio' => 'required|string',
            'categoria' => 'required|in:academico,evento,importante,deportes',
        ]);

        $anuncio = \App\Models\Anuncio::create($validated);

        return response()->json($anuncio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anuncio = \App\Models\Anuncio::findOrFail($id);
        return response()->json($anuncio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $anuncio = \App\Models\Anuncio::findOrFail($id);

        $validated = $request->validate([
            'carrera' => 'sometimes|in:Ciencias de la Computación,Telecomunicaciones,TIC,Sistemas',
            'anuncio' => 'sometimes|string',
            'categoria' => 'sometimes|in:academico,evento,importante,deportes',
        ]);

        $anuncio->update($validated);

        return response()->json($anuncio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anuncio = \App\Models\Anuncio::findOrFail($id);
        $anuncio->delete();

        return response()->json(['message' => 'Anuncio eliminado exitosamente']);
    }

    /**
     * Get announcements by career
     */
    public function byCarrera(string $carrera)
    {
        $anuncios = \App\Models\Anuncio::where('carrera', $carrera)->get();
        return response()->json($anuncios);
    }

    /**
     * Get announcements by category
     */
    public function byCategoria(string $categoria)
    {
        $anuncios = \App\Models\Anuncio::where('categoria', $categoria)->get();
        return response()->json($anuncios);
    }
}
