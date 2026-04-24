<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryApiController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::query()
            ->withCount('products')
            ->orderBy('numero', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return response()->json([
            'message' => 'Categorias obtenidas correctamente.',
            'data' => $categories,
        ]);
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = Category::create($request->validated());

        return response()->json([
            'message' => 'Categoria creada correctamente.',
            'data' => $category,
        ], 201);
    }

    public function show(Category $category): JsonResponse
    {
        $category->loadCount('products');

        return response()->json([
            'message' => 'Categoria obtenida correctamente.',
            'data' => $category,
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $category->update($request->validated());
        $category->loadCount('products');

        return response()->json([
            'message' => 'Categoria actualizada correctamente.',
            'data' => $category,
        ]);
    }

    public function destroy(Category $category): JsonResponse
    {
        if ($category->products()->exists()) {
            return response()->json([
                'message' => 'No se puede eliminar la categoria porque tiene productos asociados.',
            ], 409);
        }

        $category->delete();

        return response()->json([
            'message' => 'Categoria eliminada correctamente.',
        ]);
    }
}
