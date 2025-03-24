<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\CredencialesEmpleadoMail;

class EmpleadoController extends Controller
{
    public function getById($id)
    {
        $validate = Validator::make(["id" => $id], [
            "id" => "required|numeric",
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => 422, "message" => "Error de validación", "Errors" => $validate->errors()]);
        }

        $empleado = Empleado::with('rol')->where('id_empleado', $id)->first();

        if (!$empleado) {
            return response()->json(["status" => 404, "message" => "Empleado no encontrado"]);
        }

        return response()->json([
            "status" => 200,
            "data" => $empleado
        ]);
    }

    public function getAllByPage(Request $request)
    {
        Log::info("Solicitud recibida para obtener empleados paginados");

        try {
            $empleados = Empleado::with('rol')->orderBy('id_empleado', 'asc')->paginate(20);

            Log::info("Empleados obtenidos correctamente:", $empleados->toArray());

            $empleados->getCollection()->transform(function ($empleado) {
                return [
                    'id_empleado' => $empleado->id_empleado,
                    'nombre' => $empleado->nombre,
                    'apellido' => $empleado->apellido,
                    'email' => $empleado->email,
                    'dni' => $empleado->dni,
                    'telefono' => $empleado->telefono,
                    'rol' => $empleado->rol->nombre,
                ];
            });

            return response()->json([
                "status" => 200,
                'data' => $empleados->items(),
                'total' => $empleados->total(),
                'page' => $empleados->currentPage()
            ]);
        } catch (\Exception $e) {
            Log::error("Error al obtener empleados:", ["error" => $e->getMessage()]);
            return response()->json([
                "status" => 500,
                "message" => "Error interno del servidor",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function create(Request $request)
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

            $password = $this->createPassword($request->dni, $request->nombre, $request->apellido);

            $user = User::create([
                'name' => $request->nombre . ' ' . $request->apellido,
                'email' => $request->email,
                'password' => Hash::make($password),
            ]);

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

            Mail::to($user->email)->send(new CredencialesEmpleadoMail($user, $password));

            return response()->json([
                "status" => 200,
                "message" => "Empleado creado correctamente",
                "user" => $user,
                "empleado" => $empleado,
            ], 201);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Error al crear empleado:", ["error" => $e->getMessage()]);
            return response()->json([
                "status" => 500,
                "message" => "Error al crear empleado",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    private function createPassword(string $dni, string $nombre, string $apellidos)
    {

        $apellidoIniciales = strtoupper(substr($nombre, 0, 2));
        $nombreIniciales = strtolower(substr($apellidos, 0, 2));
        $dniParte = substr($dni, -3);

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);

        $password= "{$apellidoIniciales}{$dniParte}";

        for ($i = 0; $i < 5; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }

        $password .= $nombreIniciales;

        return $password;
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make(["id" => $id], [
            "id" => "required|numeric",
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => 422, "message" => "Error de validación", "Errors" => $validate->errors()]);
        }

        $empleado = Empleado::where('id_empleado', $id)->first();
        $empleado = Empleado::where('id_empleado', $id)->first();

        if (!$empleado) {
            return response()->json(["status" => 404, "message" => "Empleado no encontrado"]);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|string|max:255',
            'apellido' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:empleados,email,' . $id . ',id_empleado|unique:users,email,' . $empleado->id_user,
            'dni' => 'sometimes|string|max:20|unique:empleados,dni,' . $id . ',id_empleado',
            'telefono' => 'nullable|string|max:20',
            'id_rol' => 'sometimes|exists:roles,id_rol',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->has('email') && $request->email != $empleado->email) {
            $user = User::find($empleado->id_user);
            if ($user) {
                $user->email = $request->email;
                $user->save();
            }
        }

        // Si se actualiza el nombre o apellido, también actualizar el name en users
        if (($request->has('nombre') && $request->nombre != $empleado->nombre) ||
            ($request->has('apellido') && $request->apellido != $empleado->apellido)) {
            $user = User::find($empleado->id_user);
            if ($user) {
                $nombre = $request->has('nombre') ? $request->nombre : $empleado->nombre;
                $apellido = $request->has('apellido') ? $request->apellido : $empleado->apellido;
                $user->name = $nombre . ' ' . $apellido;
                $user->save();
            }
        }

        if ($request->has('email') && $request->email != $empleado->email) {
            $user = User::find($empleado->id_user);
            if ($user) {
                $user->email = $request->email;
                $user->save();
            }
        }

        // actualizar nombre o apellido, actualiza name de users
        if (($request->has('nombre') && $request->nombre != $empleado->nombre) ||
            ($request->has('apellido') && $request->apellido != $empleado->apellido)) {
            $user = User::find($empleado->id_user);
            if ($user) {
                $nombre = $request->has('nombre') ? $request->nombre : $empleado->nombre;
                $apellido = $request->has('apellido') ? $request->apellido : $empleado->apellido;
                $user->name = $nombre . ' ' . $apellido;
                $user->save();
            }
        }

        $empleado->update($request->all());

        return response()->json([
            "status" => 200,
            "message" => "Empleado actualizado correctamente",
            "data" => $empleado
        ]);
    }

    public function updatePass(Request $request, $id)
    {
        $validate = Validator::make(["id" => $id], [
            "id" => "required|numeric",
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => 422, "message" => "Error de validación", "Errors" => $validate->errors()]);
        }

        $empleado = Empleado::where('id_empleado', $id)->first();

        if (!$empleado) {
            return response()->json(["status" => 404, "message" => "Empleado no encontrado"]);
        }

        // id user del empleado
        $userId = $empleado->id_user;

        // updatePass del user controller
        $userController = new UserController();
        return $userController->updatePass($request, $userId);
    }

    public function verifyPassword(Request $request)
    {
        try {
            Log::info('Datos recibidos: ' . json_encode($request->all()));
            Log::info('Token: ' . $request->bearerToken());

            $request->validate([
                'currentPassword' => 'required',
                'id_empleado' => 'required|exists:empleados,id_empleado'
            ]);

            $empleado = Empleado::with('user')->findOrFail($request->id_empleado);

            if (!$empleado->user) {
                return response()->json([
                    'valid' => false,
                    'message' => 'No se encontró el usuario asociado al empleado'
                ], 404);
            }

            if (!Hash::check($request->currentPassword, $empleado->user->password)) {
                return response()->json([
                    'valid' => false,
                    'message' => 'La contraseña actual es incorrecta'
                ], 400);
            }

            return response()->json([
                'valid' => true,
                'message' => 'Contraseña verificada correctamente'
            ]);
        } catch (\Exception $e) {
            Log::error('Error en verifyPassword: ' . $e->getMessage());
            return response()->json([
                'error' => 'Ocurrió un error al procesar la solicitud',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function delete(Request $request, $id)
    {
        Log::info("Intentando eliminar empleado con ID: $id");

        $validate = Validator::make(["id" => $id], [
            "id" => "required|numeric",
        ]);

        if ($validate->fails()) {
            Log::error("Validación fallida: ", $validate->errors()->toArray());
            return response()->json([
                "status" => 422,
                "message" => "Error de validación",
                "errors" => $validate->errors()
            ], 422);
        }

        $empleado = Empleado::where('id_empleado', $id)->first();
        $empleado = Empleado::where('id_empleado', $id)->first();

        if (!$empleado) {
            Log::error("Empleado no encontrado con ID: $id");
            return response()->json([
                "status" => 404,
                "message" => "Empleado no encontrado"
            ], 404);
        }

        Log::info("Empleado encontrado: ", $empleado->toArray());

        $user = User::find($empleado->id_user);
        if ($user) {
            Log::info("Eliminando usuario vinculado con ID: " . $user->id);
            $user->delete();
        }

        Log::info("Eliminando empleado con ID: $id");
        $empleado->delete();

        Log::info("Empleado eliminado correctamente");
        return response()->json([
            "status" => 200,
            "message" => "Empleado eliminado correctamente"
        ], 200);
    }
}
