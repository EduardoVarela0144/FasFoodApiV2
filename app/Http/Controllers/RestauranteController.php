<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RestauranteController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
        ]);

        $restaurante = Restaurante::create($validatedData);

        return response()->json([
            'message' => 'Restaurante creado exitosamente',
            'restaurante' => $restaurante,
        ], Response::HTTP_CREATED);
    }
}
