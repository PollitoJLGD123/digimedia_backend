<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\libroreclamacion;
use Illuminate\Http\Request;

class ReclamacionesController extends Controller
{
    /* Obtener reclamaciones con paginación de 20 en 20 */
    public function get(Request $request)
    {
        $reclamaciones = libroReclamacion::orderBy('id', 'desc')->paginate(20);
        return response()->json($reclamaciones, 200);
    }

    /* Guardar una reclamación */
    public function create(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'documento' => 'required|string|max:100',
            'numeroDocumento' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'celular' => 'required|string|max:20',
            'direccion' => 'required|string|max:250',
            'distrito' => 'required|string|max:250',
            'ciudad' => 'required|string|max:250',
            'tipoReclamo' => 'required|string|max:20',
            'servicioContratado' => 'required|string|max:250',
            'reclamoPerson' => 'required|string|max:1050',
            'checkReclamoForm' => 'required|string|max:10',
            'aceptaPoliticaPrivacidad' => 'required|string|max:10',
        ]);

        // Crear una nueva reclamación
        $reclamacion = libroReclamacion::create($validated);

        return response()->json([
            'message' => 'Reclamación guardada exitosamente',
            'data' => $reclamacion,
        ], 201);
    }

    /* Eliminar una reclamación por ID */
    public function delete($id)
    {
        $reclamacion = libroReclamacion::find($id);

        if (!$reclamacion) {
            return response()->json(['error' => 'Reclamación no encontrada'], 404);
        }

        // Eliminar la reclamación
        $reclamacion->delete();

        return response()->json(['message' => 'Reclamación eliminada exitosamente'], 200);
    }
}
