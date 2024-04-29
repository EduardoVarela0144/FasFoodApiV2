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

}
