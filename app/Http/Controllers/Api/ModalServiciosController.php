<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ModalServicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModalServiciosController extends Controller
{
    public function get() {
        return ModalServicios::with('servicio')
                            ->orderBy('id', 'desc')
                            ->paginate(20);
    }

    public function create(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:9',
            'correo' => 'required|email|max:200',
            'servicio_id' => 'required|exists:servicios,id'
        ]);

        $modal = ModalServicios::create($request->all());
        return response()->json([
            'message' => 'Modal servicio creado exitosamente',
            'data' => $modal
        ], 201);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validar datos
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:100',
                'telefono' => 'required|string|max:9',
                'correo' => 'required|email|max:200',
                'servicio_id' => 'required|exists:servicios,id'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }
    
            // Buscar servicio
            $modal = ModalServicios::find($id);
    
            if (!$modal) {
                return response()->json([
                    'status' => false,
                    'message' => 'Modal servicio no encontrado'
                ], 404);
            }
    
            // Actualizar campos
            $modal->nombre = $request->nombre;
            $modal->telefono = $request->telefono;
            $modal->correo = $request->correo;
            $modal->servicio_id = $request->servicio_id;
            
            // Guardar cambios
            $modal->save();
    
            return response()->json([
                'status' => true,
                'message' => 'Modal servicio actualizado exitosamente',
                'data' => $modal
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar el modal servicio',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id) {
        $modal = ModalServicios::find($id);
        if(!$modal) {
            return response()->json([
                'message' => 'Modal servicio no encontrado'
            ], 404);
        }

        $modal->delete();
        return response()->json([
            'message' => 'Modal servicio eliminado exitosamente'
        ]);
    }
}