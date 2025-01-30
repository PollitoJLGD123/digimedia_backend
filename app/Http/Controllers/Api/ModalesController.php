<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModalesController extends Controller
{
    public function get(Request $request)
{
    $page = $request->query('page', 1); // Página actual, por defecto 1
    $limit = 20; // Número de registros por página
    $offset = ($page - 1) * $limit;

    try {
        // Obtener los registros paginados y el total de elementos
        $data = DB::table('modalservicios')
            ->skip($offset)
            ->take($limit)
            ->get();

        $totalItems = DB::table('modalservicios')->count();

        return response()->json([
            'data' => $data,
            'pagination' => [
                'currentPage' => $page,
                'totalPages' => ceil($totalItems / $limit),
                'totalItems' => $totalItems,
                'itemsPerPage' => $limit
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error al obtener los datos',
            'details' => $e->getMessage()
        ], 500);
    }
}

    // Método para crear un nuevo registro en modalservicios
    public function create(Request $request)
{
    try {
        // Validar los datos del request
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:9',
            'correo' => 'required|email|max:200|unique:modalservicios',
            'servicio_id' => 'required|integer|exists:modalservicios,servicio_id', // Validar que el servicio_id exista
        ]);

        // Insertar el registro en la tabla
        $newRecord = DB::table('modalservicios')->insertGetId([
            'nombre' => $validatedData['nombre'],
            'telefono' => $validatedData['telefono'],
            'correo' => $validatedData['correo'],
            'servicio_id' => $validatedData['servicio_id'], // Guardar el servicio_id
            
        ]);

        // Respuesta exitosa
        return response()->json([
            'message' => 'Registro creado exitosamente',
            'data' => [
                'id' => $newRecord,
                'nombre' => $validatedData['nombre'],
                'telefono' => $validatedData['telefono'],
                'correo' => $validatedData['correo'],
                'servicio_id' => $validatedData['servicio_id'],
            ]
        ], 201);
    } catch (\Illuminate\Validation\ValidationException $error) {
        return response()->json([
            'error' => 'Error en la validación',
            'details' => $error->errors()
        ], 400);
    } catch (\Exception $error) {
        return response()->json([
            'error' => 'Error al crear el registro',
            'details' => $error->getMessage()
        ], 500);
    }
}


    // Método para eliminar un registro por ID
    public function delete($id)
    {
        try {
            // Validar si el ID es numérico
            if (!is_numeric($id)) {
                return response()->json([
                    'status' => 400,
                    'message' => 'El ID debe ser un valor numérico válido'
                ], 400);
            }

            // Eliminar el registro por ID
            $deleted = DB::table('modalservicios')->where('id', $id)->delete();

            if ($deleted) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Registro eliminado exitosamente'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No se encontró el registro con el ID proporcionado'
                ], 404);
            }
        } catch (\Exception $error) {
            return response()->json([
                'status' => 500,
                'message' => 'Error en el servidor',
                'details' => $error->getMessage()
            ], 500);
        }
    }
}
