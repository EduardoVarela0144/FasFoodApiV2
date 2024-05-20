<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json(['users' => $users]);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json(['user' => $user]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'middleName' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'registrationNumber' => 'required|string|unique:users,registrationNumber',
            'accountNumber' => 'required|string|unique:users,accountNumber',
            'profilePicture' => 'nullable|string',
            'major' => 'nullable|string',
            'building' => 'nullable|string',
            'rol' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $user = User::create($validator->validated());

        return response()->json(['message' => 'Usuario creado exitosamente', 'user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'middleName' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'registrationNumber' => 'required|string|unique:users,registrationNumber',
            'accountNumber' => 'required|string|unique:users,accountNumber',
            'profilePicture' => 'nullable|string',
            'major' => 'nullable|string',
            'building' => 'nullable|string',
            'rol' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $user->update($validator->validated());

        return response()->json(['message' => 'Usuario actualizado exitosamente', 'user' => $user]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado exitosamente']);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        return response()->json(['message' => 'Inicio de sesión exitoso', 'user' => $user]);
    }
}
