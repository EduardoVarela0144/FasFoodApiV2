<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'message' => 'Lista de productos obtenida exitosamente',
            'products' => $products,
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

            $product = Product::create($validatedData);

            return response()->json([
                'message' => 'Producto creado exitosamente',
                'product' => $product,
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear el producto: ' . $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



}
