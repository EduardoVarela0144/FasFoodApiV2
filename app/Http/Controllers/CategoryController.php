<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categorias = Category::all();

        return response()->json([
            'message' => 'Lista de categorias obtenida exitosamente',
            'categorias' => $categorias,
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
            ]);

            $categoria = Category::create($validatedData);

            return response()->json([
                'message' => 'Categoria creada exitosamente',
                'categoria' => $categoria,
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la categoria: ' . $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
