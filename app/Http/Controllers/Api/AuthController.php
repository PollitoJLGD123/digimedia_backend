<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:empleados|unique:users',
            'dni' => 'required|string|max:20|unique:empleados',
            'telefono' => 'nullable|string|max:20',
            'id_rol' => 'required|exists:roles,id_rol',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();
        try {
            // crea usuario
            $user = User::create([
                'name' => $request->nombre . ' ' . $request->apellido,
                'email' => $request->email,
                'password' => Hash::make('1234'),
            ]);

            // crea empleado
            $empleado = Empleado::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'email' => $request->email,
                'dni' => $request->dni,
                'telefono' => $request->telefono,
                'id_user' => $user->id,
                'id_rol' => $request->id_rol,
            ]);

            DB::commit();

            // token incluyendo rol
            $rol = Rol::find($request->id_rol);
            $abilities = [$rol->nombre]; // capacidad del token => rol

            $token = $user->createToken('auth_token', $abilities)->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Usuario registrado exitosamente',
                'user' => $user,
                'empleado' => $empleado,
                'rol' => $rol->nombre,
                'token' => $token,
            ], 201);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => 'Error al registrar usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales proporcionadas son incorrectas.'],
            ]);
        }

        // obtener rol del empleado realacionado al usuario
        $empleado = $user->empleado;

        if (!$empleado || !$empleado->rol) {
            return response()->json([
                'status' => 'error',
                'message' => 'El usuario no tiene un rol asignado'
            ], 403);
        }

        $rol = $empleado->rol;
        $abilities = [$rol->nombre];

        // quitar tokens anteriores
        $user->tokens()->delete();

        // token incluyendo rol (capcidad)
        $token = $user->createToken('auth_token', $abilities)->plainTextToken;

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'empleado' => $empleado,
            'rol' => $rol->nombre,
            'token' => $token,
        ]);
    }

    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Sesión cerrada exitosamente'
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'El usuario no existe'
            ], 404);
        }

        $token = Str::random(60);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => $token,
                'created_at' => now()
            ]
        );

        Mail::to($user->email)->send(new ForgotPassword($user, $token));

        return response()->json([
            'status' => 'success',
            'message' => 'Token de restablecimiento de contraseña enviado'
        ]);
    }

    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $tokenUser = DB::table('password_reset_tokens')->where('token', $request->token)->first();

        if (!$tokenUser) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token inválido'
            ], 404);
        }

        $user = User::where('email', $tokenUser->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_reset_tokens')->where('token', $request->token)->delete();

        return response()->json(['message' => 'Contraseña actualizada correctamente, ingresa desde el login'], 200);
    }

    public function me(Request $request)
    {
        $user = $request->user();
        $empleado = $user->empleado;
        $rol = $empleado ? $empleado->rol : null;

        return response()->json([
            'user' => $user,
            'empleado' => $empleado,
            'rol' => $rol ? $rol->nombre : null,
            'permissions' => $user->currentAccessToken()->abilities
        ]);
    }
}
