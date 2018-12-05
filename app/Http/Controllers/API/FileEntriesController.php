<?php

namespace TUSIMO\Http\Controllers\API;

use Illuminate\Http\Request;
use TUSIMO\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;;
use TUSIMO\Imagenes;

class FileEntriesController extends Controller {

    public function index($idLocation) {
        $images = DB::table('imagenes')
                    ->where('lugares_id', $idLocation)
                    ->get();
        return response() -> json([
            "success" => true,
            "images" => $images
        ], 200);
    }

    public function uploadFile(Request $request) {
        $file = Input::file('file');
        $idLocation = $request->get("idLocation");
        $filename = $file->getClientOriginalName();

        $path = hash( 'sha256', time());

        if(Storage::disk('uploads')->put($path.'/'.$filename,  File::get($file))) {
           /* $input['filename'] = $filename;
            $input['mime'] = $file->getClientMimeType();
            $input['path'] = $path;
            $input['size'] = $file->getClientSize();*/

            $image = new Imagenes([
                "lugares_id" => $idLocation,
                "ruta_imagen" => $path.'/'.$filename,
                "principal" => false
            ]);
            $image->save();

            return response()->json([
                'success' => true,
                'id' => $image
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }
}