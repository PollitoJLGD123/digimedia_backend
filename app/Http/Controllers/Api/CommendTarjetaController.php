<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommendTarjeta;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CommendTarjetaController extends Controller
{
    public function create(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'titulo' => 'required|string|max:255',
                'texto1' => 'required|string|max:255',
                'texto2' => 'required|string|max:255',
                'texto3' => 'string|max:255',
                'texto4' => 'string|max:255',
                'texto5' => 'string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }
            DB::beginTransaction();

            $commendTarjeta = CommendTarjeta::create($request->all());

            DB::commit();

            return response()->json([
                "status" => 201,
                "message" => "CommendTarjeta creada correctamente",
                "commendTarjeta" => $commendTarjeta,
                "id" => $commendTarjeta->id_commend_tarjeta
            ],201);

        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function destroy(string $id)
    {
        try{

            $commendTarjeta = CommendTarjeta::find($id);

            if (!$commendTarjeta) {
                return response()->json([
                    "status" => 404,
                    "message" => "CommendTarjeta no encontrada"
                ],404);
            }
            $commendTarjeta->delete();
            return response()->json([
                "status" => 200,
                "message" => "CommendTarjeta eliminada correctamente"
                ], 200);

        }catch(\Exception $ex){
            return response()->json([
                "status" => 500,
                "message" => "Error al eliminar el CommendTarjeta",
                "error" => $ex->getMessage()
                ], 500);
        }
    }
}
