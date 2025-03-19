<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contactanos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContactanosController extends Controller
{
    public function get(Request $request)
    {
        $contactos = Contactanos::paginate(20);
        return response()->json($contactos, 200);
    }

    public function getById($id)
    {
        $contacto = Contactanos::find($id);

        if (!$contacto) {
            return response()->json(['error' => 'Contacto no encontrado'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $contacto
        ], 200);
    }

    /* Guardar un contacto */
    public function create(Request $request)
    {
        // Validación de datos
        $validated = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'numero' => 'required|string|max:20',
            'mensaje' => 'required|string|max:500',
        ]);

        if($validated->fails()){
            return response()->json(['errors' => $validated->errors()], 400);
        }

        // Crear un nuevo contacto
        $contacto = Contactanos::create($request->all());

        return response()->json([
            'message' => 'Contacto guardado exitosamente',
            'data' => $contacto,
        ], 201);
    }

    /* Actualizar el estado de un contacto (de 0 a 1) */
    public function update(Request $request, $id)
    {
        $contacto = Contactanos::find($id);

        if (!$contacto) {
            return response()->json(['error' => 'Contacto no encontrado'], 404);
        }

        $validated = $request->validate([
            'estado' => 'required|boolean',
        ]);

        $contacto->update([
            'estado' => $request->estado,
        ]);

        return response()->json([
            'message' => 'Estado actualizado exitosamente',
            'data' => $contacto,
        ], 200);
    }

    public function delete($id)
    {
        $contacto = Contactanos::find($id);

        if (!$contacto) {
            return response()->json(['error' => 'Contacto no encontrado'], 404);
        }

        $contacto->delete();

        return response()->json([
            'message' => 'Contacto eliminado exitosamente'
        ], 200);
    }
}
