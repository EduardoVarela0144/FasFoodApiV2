<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Food;

class FoodController extends Controller
{
    
    public function index()
    {
        $productos = Food::all();

        return response()->json([
            'message' => 'Lista de prodcutos obtenida exitosamente',
            'productos' => $productos,
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|numeric',
            ]);

            $comida = Food::create($validatedData);

            return response()->json([
                'message' => 'Comida creada exitosamente',
                'Comida' => $comida,
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la comida: ' . $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



}
