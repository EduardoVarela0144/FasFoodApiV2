<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'message' => 'Lista de categorias obtenida exitosamente',
            'categories' => $categories,
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
            ]);

            $categorie = Category::create($validatedData);

            return response()->json([
                'message' => 'Categoria creada exitosamente',
                'categorie' => $categorie,
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la categoria: ' . $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
