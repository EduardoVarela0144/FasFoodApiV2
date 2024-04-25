<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RestauranteController extends Controller
{
    public function index()
    {
        $restaurantes = Restaurante::all();

        return response()->json([
            'message' => 'Lista de restaurantes obtenida exitosamente',
            'restaurantes' => $restaurantes,
        ], Response::HTTP_OK);
    }

    public function show($id)
    {
        $restaurante = Restaurante::find($id);

        if (!$restaurante) {
            return response()->json([
                'message' => 'Restaurante no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'message' => 'Restaurante obtenido exitosamente',
            'restaurante' => $restaurante,
        ], Response::HTTP_OK);
    }

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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
        ]);

        $restaurante = Restaurante::find($id);

        if (!$restaurante) {
            return response()->json([
                'message' => 'Restaurante no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }

        $restaurante->update($validatedData);

        return response()->json([
            'message' => 'Restaurante actualizado exitosamente',
            'restaurante' => $restaurante,
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $restaurante = Restaurante::find($id);

        if (!$restaurante) {
            return response()->json([
                'message' => 'Restaurante no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }

        $restaurante->delete();

        return response()->json([
            'message' => 'Restaurante eliminado exitosamente',
        ], Response::HTTP_OK);
    }
}
