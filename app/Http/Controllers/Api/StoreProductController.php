<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = \App\Models\StoreProduct::with('category');

        // Filter by category if provided
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('nombre', $request->category);
            });
        }

        $products = $query->get();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:store_categories,id',
            'nombre' => 'required|string',
            'imagen_url' => 'required|string',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        $product = \App\Models\StoreProduct::create($validated);
        $product->load('category');

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = \App\Models\StoreProduct::with('category')->findOrFail($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = \App\Models\StoreProduct::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'sometimes|exists:store_categories,id',
            'nombre' => 'sometimes|string',
            'imagen_url' => 'sometimes|string',
            'cantidad' => 'sometimes|integer|min:0',
            'precio' => 'sometimes|numeric|min:0',
        ]);

        $product->update($validated);
        $product->load('category');

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = \App\Models\StoreProduct::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Producto eliminado exitosamente']);
    }

    /**
     * Get products by category name
     */
    public function byCategory(string $categoryName)
    {
        $products = \App\Models\StoreProduct::with('category')
            ->whereHas('category', function($q) use ($categoryName) {
                $q->where('nombre', $categoryName);
            })
            ->get();

        return response()->json($products);
    }
}
