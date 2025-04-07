<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Log;

class BlogHeadController extends Controller
{
    public function create(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'titulo' => 'required|string|max:50',
                'texto_frase' => 'required|string|max:70',
                'texto_descripcion' => 'required|string|max:120',
                'public_image' => 'required|string',
                'url_image' => 'nullable|string'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }

            DB::beginTransaction();

            $blogHead = BlogHead::create($request->all());

            DB::commit();

            return response()->json([
                "status" => 200,
                "message" => "BlogHead creado correctamente",
                "id" => $blogHead->id_blog_head
            ], 200);

        }catch(\Exception $ex){
            DB::rollback();
            return response()->json([
                "status" => 500,
                "message" => "Error interno del servidor",
                "error" => $ex->getMessage()
                ], 500);
        }
    }

    public function updateImage(Request $request, int $id){
        $validate = Validator::make($request->all(), [
            'public_id' => 'required|string',
            'secure_url' => 'required|url'
        ]);

        if ($validate->fails()) {
            return response()->json([
                "status" => 422,
                "message" => "Error de validación",
                "errors" => $validate->errors()
            ], 422);
        }

        try{

            $blogHead = BlogHead::find($id);
            if(!$blogHead){
                return response()->json([
                    "status" => 404,
                    "message" => "BlogHead no encontrado"
                ],404);
            }

            DB::beginTransaction();

            if ($blogHead->url_image || $blogHead->public_image) {
                try {
                    $cloudinary = new Cloudinary();
                    $cloudinary->uploadApi()->destroy($blogHead->public_image);
                } catch (\Exception $e) {
                    Log::warning("Error al eliminar imagen anterior, continuando con actualización: " . $e->getMessage());
                }
            }
            $blogHead->public_image = $request->public_id;
            $blogHead->url_image = $request->secure_url;
            $blogHead->save();

            DB::commit();

            return response()->json([
                "status" => 200,
                "message" => "Imagen de blogHead actualizada correctamente",
                "public_image" => $blogHead->public_image,
                "url_image" => $blogHead->url_image
            ], 200);

        }catch(\Exception $ex){
            DB::rollback();
            return response()->json([
                "status" => 500,
                "message" => "Error interno del servidor",
                "error" => $ex->getMessage()
                ], 500);
        }
    }


    public function show(int $id){
        try{

            $blogHead = BlogHead::find($id);
            if (!$blogHead) {
                return response()->json([
                    "status" => 404,
                    "message" => "BlogHead no encontrado"
                ],404);
            }

            return response()->json([
                "status" => 200,
                "data" => $blogHead
            ], 200);

        }catch(\Exception $ex){
            return response()->json([
                "status" => 500,
                "message" => "Error interno del servidor",
                "error" => $ex->getMessage()
                ], 500);
        }
    }

    public function destroy(string $id)
    {
        try{

            $blogHead = BlogHead::find($id);

            if (!$blogHead) {
                return response()->json([
                    "status" => 404,
                    "message" => "BlogHead no encontrado"
                ]);
            }
            $blogHead->delete();
            return response()->json([
                "status" => 200,
                "message" => "BlogHead eliminado correctamente"
                ], 200);

        }catch(\Exception $ex){
            return response()->json([
                "status" => 500,
                "message" => "Error al eliminar el blogHead",
                "error" => $ex->getMessage()
                ], 500);
        }
    }
}
