<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        $empleado = Empleado::find($id);

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
        $empleados = Empleado::orderBy('id', 'desc')->paginate(20);

        return response()->json([
            "status" => 200,
            'data' => $empleados->items(),
            'total' => $empleados->total(),
            'page' => $empleados->currentPage()
        ]);
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
            $user = User::create([
                'name' => $request->nombre . ' ' . $request->apellido,
                'email' => $request->email,
                'password' => Hash::make('1234'), 
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


    public function update(Request $request, $id)
    {
        $validate = Validator::make(["id" => $id], [
            "id" => "required|numeric",
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => 422, "message" => "Error de validación", "Errors" => $validate->errors()]);
        }

        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(["status" => 404, "message" => "Empleado no encontrado"]);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|string|max:255',
            'apellido' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:empleados,email,' . $id,
            'dni' => 'sometimes|string|max:20|unique:empleados,dni,' . $id,
            'telefono' => 'nullable|string|max:20',
            'id_rol' => 'sometimes|exists:roles,id_rol',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
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

        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(["status" => 404, "message" => "Empleado no encontrado"]);
        }

        // id user del empleado
        $userId = $empleado->id_user;

        // updatePass del user controller
        $userController = new UserController();
        return $userController->updatePass($request, $userId);
    }

    public function delete(Request $request, $id)
    {
        $validate = Validator::make(["id" => $id], [
            "id" => "required|numeric",
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => 422, "message" => "Error de validación", "Errors" => $validate->errors()]);
        }

        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(["status" => 404, "message" => "Empleado no encontrado"]);
        }

        // elimina user vinculado
        $user = User::find($empleado->id_user);
        if ($user) {
            $user->delete();
        }

        // elimina empleado
        $empleado->delete();

        return response()->json([
            "status" => 200,
            "message" => "Empleado eliminado correctamente"
        ]);
    }
}
