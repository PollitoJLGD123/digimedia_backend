<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servicios;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function get(){
        return Servicios::orderBy('id', 'desc')
                        ->paginate(20);
    }

    public function create(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:100'
        ]);

        $servicio = new Servicios();
        $servicio->nombre = $request->nombre;
        $servicio->save();

        return response()->json([
            'message' => 'Servicio creado exitosamente'
        ], 201);
    }

    public function delete($id){
        $servicio = Servicios::find($id);
        if(!$servicio) {
            return response()->json([
                'message' => 'Servicio no encontrado'
            ], 404);
        }
        
        $servicio->delete();
        return response()->json([
            'message' => 'Servicio eliminado exitosamente'
        ]);
    }
}