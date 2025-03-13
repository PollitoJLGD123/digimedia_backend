<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contactanos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactanosController extends Controller
{
    /* Obtener contactos con paginación de 20 en 20 */
    public function get(Request $request)
    {
        $contactos = Contactanos::paginate(20);
        return response()->json($contactos, 200);
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
        $contacto = Contactanos::findOrFail($id);

        if (!$contacto) {
            return response()->json(['error' => 'Contacto no encontrado'], 404);
        }

        // Validar el estado
        $validated = $request->validate([
            'estado' => 'required|in:0,1',
        ]);

        // Actualizar el estado
        $contacto->estado = $validated['estado'];
        $contacto->save();

        return response()->json([
            'message' => 'Estado actualizado exitosamente',
            'data' => $contacto,
        ], 200);
    }

    /* Eliminar un contacto por ID */
    public function delete($id)
    {
        $contacto = Contactanos::find($id);

        if (!$contacto) {
            return response()->json(['error' => 'Contacto no encontrado'], 404);
        }

        // Eliminar el contacto
        $contacto->delete();

        return response()->json(['message' => 'Contacto eliminado exitosamente'], 200);
    }
}
