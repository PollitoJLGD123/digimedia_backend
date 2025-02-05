<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\MailService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ModalesController extends Controller
{
    public function get(Request $request)
    {
        $page = $request->query('page', 1);
        $limit = 20;
        $offset = ($page - 1) * $limit;
    
        try {
            // Agregar orderBy para ordenar descendentemente
            $data = DB::table('modalservicios')
                ->orderBy('fecha_registro', 'DESC')
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
                'correo' => 'required|email|max:200',
                'servicio_id' => 'required|integer|min:1|max:4', // Validar rango válido
            ]);

            // Enviar el primer correo inmediatamente
            dispatch(new SendEmailJob(0, $request->servicio_id, $request->correo));

            // Enviar el segundo correo después de 1 minuto
            dispatch(new SendEmailJob(1, $request->servicio_id, $request->correo))->delay(Carbon::now()->addMinutes(3));

            // Enviar el tercer correo después de 2 minutos
            dispatch(new SendEmailJob(2, $request->servicio_id,$request->correo))->delay(Carbon::now()->addMinutes(6));

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
