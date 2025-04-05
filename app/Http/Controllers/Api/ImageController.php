<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class ImageController extends Controller
{
    public function deleteImage(Request $request){
        try{
            $cloudinary = new Cloudinary();
            $cloudinary->uploadApi()->destroy($request->public_id);

            return response()->json([
                "status" => 200,
                "message" => "Imagen eliminada correctamente"
                ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => 500,
                "message" => "Error al eliminar la imagen",
                "error" => env('APP_DEBUG') ? $e->getMessage() : 'Error interno del servidor'
                ], 500);
        }
    }
}
