<?php

namespace TUSIMO\Http\Controllers\API;

use Illuminate\Http\Request;
use TUSIMO\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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
        //$file = $request->file('file');
        $idLocation = $request->get("idLocation");
        //$filename = $file->getClientOriginalName();
        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
       // $type = $this->getType($ext);
        //$fileName = $file->getClientOriginalName() . '.' . $ext;


        //$path = hash( 'sha256', time());
       // $file->move(public_path('uploads', $fileName));
//        $request->validate([
//            'file' => 'required',
//        ]);

        $fileName = time().'.'.request()->file->getClientOriginalExtension();

        request()->file->move(public_path('uploads'), $fileName);

      //  if (Storage::putFileAs('/public/uploads/', $file, $fileName)) {
           /* $input['filename'] = $filename;
            $input['mime'] = $file->getClientMimeType();
            $input['path'] = $path;
            $input['size'] = $file->getClientSize();*/

            $image = new Imagenes([
                "lugares_id" => $idLocation,
                "ruta_imagen" => $fileName,
                "principal" => false
            ]);
            $image->save();

            return response()->json([
                'success' => true,
                'id' => $image
            ], 200);
//        }
//        return response()->json([
//            'success' => false
//        ], 500);
    }

    public function deleteFile($id) {
        $file = Imagenes::find($id);

        $file->delete();

        return response()->json([
            'message' => 'Imagen deleted successfully!'
        ], 200);
    }
}