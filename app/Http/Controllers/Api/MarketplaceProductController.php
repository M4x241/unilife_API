<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketplaceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = \App\Models\MarketplaceProduct::with(['owner', 'comprador'])->get();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'imagen_url' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'cu_owner' => 'required|exists:universitarios,cu',
        ]);

        $product = \App\Models\MarketplaceProduct::create($validated);
        $product->load(['owner', 'comprador']);

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = \App\Models\MarketplaceProduct::with(['owner', 'comprador'])->findOrFail($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = \App\Models\MarketplaceProduct::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'sometimes|string',
            'descripcion' => 'sometimes|string',
            'imagen_url' => 'sometimes|string',
            'precio' => 'sometimes|numeric|min:0',
            'cu_owner' => 'sometimes|exists:universitarios,cu',
            'cu_comprador' => 'sometimes|nullable|exists:universitarios,cu',
            'status' => 'sometimes|in:publicado,reservado,vendido',
        ]);

        $product->update($validated);
        $product->load(['owner', 'comprador']);

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = \App\Models\MarketplaceProduct::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Producto eliminado exitosamente']);
    }

    /**
     * Mark product as purchased
     */
    public function purchase(Request $request, string $id)
    {
        $product = \App\Models\MarketplaceProduct::findOrFail($id);

        $validated = $request->validate([
            'cu_comprador' => 'required|exists:universitarios,cu',
        ]);

        $product->update(['cu_comprador' => $validated['cu_comprador']]);
        $product->load(['owner', 'comprador']);

        return response()->json($product);
    }
}
