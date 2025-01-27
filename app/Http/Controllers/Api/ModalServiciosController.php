<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ModalServicios;
use Illuminate\Http\Request;

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