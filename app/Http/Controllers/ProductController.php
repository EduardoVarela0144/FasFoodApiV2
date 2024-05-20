<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class ProductController extends Controller
{
  
    public function index(Request $request)
{
    if ($request->has('name')) {
        $products = Product::where('name', 'like', '%' . $request->input('name') . '%')->get();
    } else {
        $products = Product::all();
    }

    return response()->json([
        'message' => 'Lista de productos obtenida exitosamente',
        'products' => $products,
    ], Response::HTTP_OK);
}

  
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'image' => 'required|string|max:255',
                'description' => 'required|string',
                'seller' => 'required|exists:users,id',
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

 
    public function show(Product $product)
    {
        return response()->json([
            'message' => 'Producto obtenido exitosamente',
            'product' => $product,
        ], Response::HTTP_OK);
    }


    public function update(Request $request, Product $product)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'image' => 'required|string|max:255',
                'description' => 'required|string',
                'seller' => 'required|exists:users,id',
            ]);

            $product->update($validatedData);

            return response()->json([
                'message' => 'Producto actualizado exitosamente',
                'product' => $product,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el producto: ' . $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return response()->json([
                'message' => 'Producto eliminado exitosamente',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar el producto: ' . $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
