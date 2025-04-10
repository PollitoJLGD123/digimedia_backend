<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\modalservicios;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendModalMail;

class ModalesController extends Controller
{
    public function get(Request $request)
    {
        $modals = modalservicios::with('servicio')->orderBy('id_modalservicio', 'asc')->paginate(4);

        return response()->json($modals, 200);
    }

    public function create(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:100',
                'telefono' => 'required|string|max:9',
                'correo' => 'required|email|max:200',
                'id_servicio' => 'required|integer|min:1|max:4',
            ]);

            DB::beginTransaction();

            $newRecord = DB::table('modalservicios')->insertGetId([
                'nombre' => $validatedData['nombre'],
                'telefono' => $validatedData['telefono'],
                'correo' => $validatedData['correo'],
                'id_servicio' => intval($validatedData['id_servicio']),
            ]);

            $id_servicio = $validatedData['id_servicio'];

            if ($id_servicio == 1){
                $vista_correo = "mails.mod.service1";
            }
            if ($id_servicio == 2){
                $vista_correo = "mails.mod.service2";
            }
            if ($id_servicio == 3){
                $vista_correo = "mails.mod.service3";
            }
            if ($id_servicio == 4){
                $vista_correo = "mails.mod.service4";
            }

            Mail::to($validatedData['correo'])->send(
                new SendModalMail($validatedData,$vista_correo, 1)
            );

            DB::commit();

            return response()->json([
                'message' => 'Registro creado exitosamente',
                'data' => [
                    'id_modal' => $newRecord,
                    'nombre' => $validatedData['nombre'],
                    'telefono' => $validatedData['telefono'],
                    'correo' => $validatedData['correo'],
                    'id_servicio' => $validatedData['id_servicio'],
                ]
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $error) {
            DB::rollback();
            return response()->json([
                'error' => 'Error en la validación',
                'details' => $error->errors()
            ], 400);
        } catch (\Exception $error) {
            DB::rollback();
            return response()->json([
                'error' => 'Error al crear el registro',
                'details' => $error->getMessage()
            ], 500);
        }
    }

    public function getById($id)
    {
        $modal = modalservicios::where('id_modalservicio', $id)->with('servicio')->first();

        if (!$modal) {
            return response()->json(['error' => 'Modal no encontrado'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $modal
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $modal = modalservicios::find($id);

        if (!$modal) {
            return response()->json(['error' => 'Modal no encontrado'], 404);
        }

        $validated = $request->validate([
            'estado' => 'required|boolean',
        ]);

        $modal->update([
            'estado' => $request->estado,
        ]);

        return response()->json([
            'message' => 'Estado actualizado exitosamente',
            'data' => $modal,
        ], 200);
    }

    public function delete($id)
    {
        $modal = modalservicios::find($id);

        if (!$modal) {
            return response()->json(['error' => 'Modal no encontrado'], 404);
        }

        $modal->delete();

        return response()->json([
            'message' => 'Contacto eliminado exitosamente'
        ], 200);
    }
}
