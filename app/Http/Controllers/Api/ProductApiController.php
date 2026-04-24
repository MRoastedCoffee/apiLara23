<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::query()
            ->with('category')
            ->orderBy('numero', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return response()->json([
            'message' => 'Productos obtenidos correctamente.',
            'data' => $products,
        ]);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());
        $product->load('category');

        return response()->json([
            'message' => 'Producto creado correctamente.',
            'data' => $product,
        ], 201);
    }

    public function show(Product $product): JsonResponse
    {
        $product->load('category');

        return response()->json([
            'message' => 'Producto obtenido correctamente.',
            'data' => $product,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $product->update($request->validated());
        $product->load('category');

        return response()->json([
            'message' => 'Producto actualizado correctamente.',
            'data' => $product,
        ]);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json([
            'message' => 'Producto eliminado correctamente.',
        ]);
    }
}
