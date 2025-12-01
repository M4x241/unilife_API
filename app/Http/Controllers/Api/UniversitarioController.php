<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UniversitarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universitarios = \App\Models\Universitario::all();
        return response()->json($universitarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cu' => 'required|string|unique:universitarios,cu',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email|unique:universitarios,correo',
        ]);

        // Auto-generate password: CU + apellido
        $validated['contrasena'] = bcrypt($validated['cu'] . $validated['apellidos']);

        $universitario = \App\Models\Universitario::create($validated);

        return response()->json($universitario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cu)
    {
        $universitario = \App\Models\Universitario::where('cu', $cu)->firstOrFail();
        return response()->json($universitario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $cu)
    {
        $universitario = \App\Models\Universitario::where('cu', $cu)->firstOrFail();

        $validated = $request->validate([
            'nombres' => 'sometimes|string',
            'apellidos' => 'sometimes|string',
            'correo' => 'sometimes|email|unique:universitarios,correo,' . $universitario->id,
        ]);

        // Update password if apellidos changed
        if (isset($validated['apellidos'])) {
            $validated['contrasena'] = bcrypt($universitario->cu . $validated['apellidos']);
        }

        $universitario->update($validated);

        return response()->json($universitario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cu)
    {
        $universitario = \App\Models\Universitario::where('cu', $cu)->firstOrFail();
        $universitario->delete();

        return response()->json(['message' => 'Universitario eliminado exitosamente']);
    }
}
