<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{

    public function getById($id)
    {
        $validate = Validator::make(["id" => $id], [
            "id" => "required|numeric",
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => 422, "message" => "Error de validación", "Errors" => $validate->errors()]);
        }

        $user = User::find($id);

        if (!$user) {
            return response()->json(["status" => 404, "message" => "Usuario no encontrado"]);
        }

        return response()->json([
            "status" => 200,
            "data" => $user
        ]);
    }

    public function getAllByPage(Request $request)
    {

        $users = User::orderBy('id', 'desc')->paginate(20);

        return response()->json([
            "status" => 200,
            'data' => $users->items(),
            'total' => $users->total(),
            'page' => $users->currentPage()
        ]);
    }

    public function login(Request $request)
    {

        $validate = Validator::make($request->all(), [
            "email" => "required|email|exists:users,email",
            "password" => "required|string|min:4",
        ]);

        if ($validate->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Fallo de validación",
                "errors" => $validate->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                "success" => false,
                "message" => "Usuario no encontrado"
            ], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                "success" => false,
                "message" => "Credenciales incorrectas"
            ], 401);
        }

        return response()->json([
            "success" => true,
            "message" => "Inicio de sesión exitoso",
            "token" => $user->createToken('auth_token')->plainTextToken,
            "user" => [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
            ]
        ], 200);
    }

    public function create(Request $request)
    {
        try {
            Log::info("Datos recibidos:", $request->all()); 

            $validate = Validator::make($request->all(), [
                "name" => "required|string|max:255",
                "email" => "required|email|unique:users,email",
                "password" => "required|string|min:4",
            ]);

            if ($validate->fails()) {
                Log::error("Error de validación:", $validate->errors()->toArray()); 
                return response()->json([
                    "status" => 422,
                    "message" => "Error de validación",
                    "errors" => $validate->errors()
                ]);
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); 

            if ($user->save()) {
                Log::info("Usuario creado correctamente:", $user->toArray()); 
                return response()->json([
                    "status" => 200,
                    "message" => "Registro creado correctamente"
                ]);
            } else {
                Log::error("Error al guardar el usuario"); 
                return response()->json([
                    "status" => 500,
                    "message" => "Error al crear el registro"
                ]);
            }
        } catch (\Exception $e) {
            Log::error("Excepción no manejada:", ["error" => $e->getMessage()]); 
            return response()->json([
                "status" => 500,
                "message" => "Error interno del servidor",
                "error" => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make(["id" => $request->id], [
            "id" => "required|numeric",
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => 422, "message" => "Error de validación", "Errors" => $validate->errors()]);
        }

        $validate = Validator::make($request->all(), [
            "name" => "required|string|max:255",
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => 422, "message" => "Error de validación", "Errors" => $validate->errors()]);
        }

        $response = User::where(["id" => intval($id)])->update(["name" => $request->name]);

        if ($response) {
            return response()->json(["status" => 200, "message" => "Registro actualizado correctamente"]);
        }
    }

    public function updatePass(Request $request, $id)
    {
        $validate = Validator::make(["id" => $request->id], [
            "id" => "required|numeric",
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => 422, "message" => "Error de validación", "Errors" => $validate->errors()]);
        }

        $validate = Validator::make($request->all(), [
            "password" => "required|string|min:4",
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => 422, "message" => "Error de validación", "Errors" => $validate->errors(), "data" => $request->all()]);
        }

        $response = User::where(["id" => intval($id)])->update(["password" => Hash::make($request->password)]);

        if ($response) {
            return response()->json(["status" => 200, "message" => "Registro actualizado correctamente"]);
        }
    }

    public function delete(Request $request, $id)
    {
        Log::info("Intentando eliminar usuario con ID: $id");

        $validate = Validator::make(["id" => $id], [
            "id" => "required|numeric",
        ]);

        if ($validate->fails()) {
            Log::error("Error de validación al eliminar usuario:", $validate->errors()->toArray()); 
            return response()->json(["status" => 422, "message" => "Error de validación", "Errors" => $validate->errors()]);
        }

        if (intval($id) == 1) {
            Log::warning("Intento de eliminar al usuario admin con ID: $id"); 
            return response()->json(["status" => 422, "message" => "El admin no puede ser eliminado"]);
        }

        $user = User::find($id);
        if (!$user) {
            Log::error("Usuario no encontrado con ID: $id");
            return response()->json(["status" => 404, "message" => "Usuario no encontrado"]);
        }

        $user->delete();
        Log::info("Usuario eliminado con ID: $id");

        $userExists = User::where('id', $id)->exists();
        if ($userExists) {
            Log::error("El usuario con ID: $id todavía existe después de la eliminación"); 
            return response()->json(["status" => 500, "message" => "Error al eliminar el registro"]);
        }

        Log::info("Usuario con ID: $id eliminado correctamente y verificado"); 
        return response()->json(["status" => 200, "message" => "Registro eliminado correctamente"]);
    }

    public function logout(Request $request)
    {

        $request->user()->tokens()->delete(); // Revoca todos los tokens del usuario
        return response()->json(["status" => 200, 'message' => 'Tokens revoked']);
    }
}
