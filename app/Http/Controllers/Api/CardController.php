<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Models\Card;
use App\Models\BlogBody;
use App\Models\BlogHead;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BlogFooter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{

    public function index()
    {
        try{
            $cards = Card::orderBy('id_card', 'asc')->get();
            return response()->json($cards, 200);
        }catch(\Exception $ex){
            return response()->json([
                "status" => 500,
                "message" => "Error interno del servidor",
                "error" => $ex->getMessage()
            ], 500);
        }
    }

    public function get($id = null)
    {
        try{
            if (!$id) {
                $cards = Card::with('empleado')->get();
            }
            else{
                $cards = Card::with('empleado')->where('id_empleado', $id)->get();
            }
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
                'public_image' => 'required|string',
                'url_image' => 'nullable|string',
                'id_plantilla' => 'required|integer|min:1|max:3',
                'id_blog' => 'required|integer|exists:blogs,id_blog',
                'id_empleado' => 'required|integer|exists:empleados,id_empleado',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }
            DB::beginTransaction();

            $card = Card::create($request->all());

            DB::commit();

            return response()->json([
                "status" => 200,
                "message" => "Card creada correctamente",
                "id" => $card->id_card
            ], 200);
        }catch(\Exception $ex){
            Log::info($ex->getMessage());
            DB::rollback();
            return response()->json([
                "status" => 500,
                "message" => "Error al crear la card",
                "error" => $ex->getMessage()
            ], 500);
        }
    }

    public function imageHeader(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        if (!$request->hasFile('file') || $validator->fails()) {
            Log::info("No se ha enviado la imagen");
            return response()->json([
                "status" => 400,
                'data'=> "Guardar ruta imagen local",
                "message" => "No se ha enviado la imagen"
            ], 400);
        }
        else{
            $card = Card::find($id);

            if (!$card) {
                return response()->json([
                    "status" => 404,
                    "message" => "Blog no encontrado"
                ], 404);
            }

            $blog = Blog::find($card->id_blog);

            $blog_header = BlogHead::find($blog->id_blog_header);

            $file = $request->file('file');
            $fileName = Str::slug($card->blog->titulo).".webp";
            $filePath = "storage/app/public/images/templates/plantilla".$card->id_plantilla."/".Str::slug($blog->titulo).$card->id_blog."/head";
            $file->move(storage_path($filePath), $fileName);

            $card->public_image = $filePath."/".$fileName;
            $card->url_image = $fileName;
            $card->save();

            $blog_header->public_image = $filePath."/".$fileName;
            $blog_header->url_image = $fileName;
            $blog_header->save();

            return response()->json([
                "status" => 200,
                "message" => "Success, imagen subida correctamente",
                "url_image" => $filePath."/".$fileName
            ], 200);
        }

        /*
            storage/app/public/images/templates/plantilla{id_plantilla}/blog{id_blog}/head/image.jpeg
            storage/app/public/images/templates/plantilla{id_plantilla}/blog{id_blog}/body/image.webp
            storage/app/public/images/templates/plantilla{id_plantilla}/blog{id_blog}/footer/image.webp
        */
    }

    public function imagesBody(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'name' => 'required|string|max:255',
        ]);

        if (!$request->hasFile('file') || $validator->fails()) {
            Log::info("No se ha enviado la imagen");
            return response()->json([
                "status" => 400,
                'data'=> "Guardar ruta imagen local",
                "message" => "No se ha enviado la imagen"
            ], 400);
        }
        else{
            $card = Card::find($id);

            if (!$card) {
                return response()->json([
                    "status" => 404,
                    "message" => "Blog no encontrado"
                ], 404);
            }

            $blog = Blog::find($card->id_blog);

            $file = $request->file('file');
            $fileName = $request->name.".webp";
            $filePath = "storage/app/public/images/templates/plantilla".$card->id_plantilla."/".Str::slug($blog->titulo).$card->id_blog."/body";
            $file->move(storage_path($filePath), $fileName);

            $blog_body = BlogBody::find($blog->id_blog_body);

            if($request->name == "image1"){
                $blog_body->public_image1 = $filePath."/".$fileName;
                $blog_body->url_image1 = $fileName;
            }else if($request->name == "image2"){
                $blog_body->public_image2 = $filePath."/".$fileName;
                $blog_body->url_image2 = $fileName;
            }else{
                $blog_body->public_image3 = $filePath."/".$fileName;
                $blog_body->url_image3 = $fileName;
            }

            $blog_body->save();

            return response()->json([
                "status" => 200,
                "message" => "Success, imagen subida correctamente"
            ], 200);
        }
    }

    public function imagesFooter(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'name' => 'required|string|max:255',
        ]);

        if (!$request->hasFile('file') || $validator->fails()) {
            Log::info("No se ha enviado la imagen");
            return response()->json([
                "status" => 400,
                'data'=> "Guardar ruta imagen local",
                "message" => "No se ha enviado la imagen"
            ], 400);
        }
        else{
            $card = Card::find($id);

            if (!$card) {
                return response()->json([
                    "status" => 404,
                    "message" => "Blog no encontrado"
                ], 404);
            }

            $blog = Blog::find($card->id_blog);

            $file = $request->file('file');
            $fileName = $request->name.".webp";
            $filePath = "storage/app/public/images/templates/plantilla".$card->id_plantilla."/".Str::slug($blog->titulo).$card->id_blog."/footer";
            $file->move(storage_path($filePath), $fileName);

            $blog_footer = BlogFooter::find($blog->id_blog_footer);

            if($request->name == "image1"){
                $blog_footer->public_image1 = $filePath."/".$fileName;
                $blog_footer->url_image1 = $fileName;
                $blog_footer->save();
            }else if($request->name == "image2"){
                $blog_footer->public_image2 = $filePath."/".$fileName;
                $blog_footer->url_image2 = $fileName;
                $blog_footer->save();
            }else{
                $blog_footer->public_image3 = $filePath."/".$fileName;
                $blog_footer->url_image3 = $fileName;
                $blog_footer->save();
            }

            return response()->json([
                "status" => 200,
                "message" => "Success, imagen subida correctamente"
            ], 200);
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
