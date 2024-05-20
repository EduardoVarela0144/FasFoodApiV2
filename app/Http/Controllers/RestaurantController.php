<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();

        return response()->json([
            'message' => 'Lista de restaurantes obtenida exitosamente',
            'restaurants' => $restaurants,
        ], Response::HTTP_OK);
    }

    public function show($id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json([
                'message' => 'Restaurante no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'message' => 'Restaurante obtenido exitosamente',
            'restaurant' => $restaurant,
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

        $restaurant = Restaurant::create($validatedData);

        return response()->json([
            'message' => 'Restaurante creado exitosamente',
            'restaurant' => $restaurant,
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

        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json([
                'message' => 'Restaurante no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }

        $restaurant->update($validatedData);

        return response()->json([
            'message' => 'Restaurante actualizado exitosamente',
            'restaurant' => $restaurant,
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json([
                'message' => 'Restaurante no encontrado',
            ], Response::HTTP_NOT_FOUND);
        }

        $restaurant->delete();

        return response()->json([
            'message' => 'Restaurante eliminado exitosamente',
        ], Response::HTTP_OK);
    }
}
