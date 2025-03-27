<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function index()
    {
        try{

            $cards = Card::all();
            return response()->json($cards, 200);

        }catch(\Exception $ex){
            return response()->json([
                "status" => 500,
                "message" => "Error interno del servidor",
                "error" => $ex->getMessage()
            ], 500);
        }
    }

    public function create(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                'titulo' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'url_image' => 'required|string',
                'id_plantilla' => 'required|integer|min:1|max:3',
                'id_blog' => 'required|integer|exists:blogs,id_blog',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }
            DB::beginTransaction();

            $card = Card::create($request->all());

            DB::commit();

            return response()->json([
                "status" => 201,
                "message" => "Card creada correctamente",
                "card" => $card,
                "id" => $card->id_card
            ], 201);
        }catch(\Exception $ex){
            DB::rollback();
            return response()->json([
                "status" => 500,
                "message" => "Error al crear la card",
                "error" => $ex->getMessage()
            ], 500);
        }
    }

    public function destroy(int $id)
    {
        try{
            $card = Card::find($id);

            if (!$card) {
                return response()->json([
                    "status" => 404,
                    "message" => "Card no encontrada"
                ]);
            }

            $card->delete();
            return response()->json([
                "status" => 200,
                "message" => "Card eliminada correctamente"
            ],200);

        }catch(\Exception $ex){
            return response()->json([
                "status" => 500,
                "message" => "Error al eliminar la card",
                "error" => $ex->getMessage()
            ],500);
        }
    }
}
