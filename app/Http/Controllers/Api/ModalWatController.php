<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\modalservicios;
use App\Models\WatModal;
use App\Mail\MailService;
use Exception;
use Illuminate\Support\Facades\Mail;

class ModalWatController extends Controller
{
    public function sendWat(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $id = $request->input('id');

        $modal_wat = WatModal::find($id);

        if (!$modal_wat) {
            return response()->json(['message' => 'Mensaje no encontrado'], 404);
        }

        $modal = modalservicios::find($modal_wat->id_modalservicio);

        try{
            $data = [
                'nombre' => $modal->nombre,
                'telefono' => $modal->telefono,
                'correo' => $modal->correo,
            ];

            Mail::to($modal->correo)->send(
                new MailService($modal_wat->number_message, $data, $modal->id_servicio)
            );

            $modal_wat->update([
                'estado' => 1,
                'fecha' => now(),
            ]);

            return response()->json($modal_wat, 200);

        }catch(Exception $e){
            $modal_wat->update([
                'estado' => 1,
                'error' => 'Enviado con error, el numero no existe',
                'fecha' => now(),
            ]);
            return response()->json(['message' => 'Error al enviar el mensaje'], 500);
        }
    }
}
