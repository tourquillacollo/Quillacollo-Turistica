<?php

namespace TUSIMO\Http\Controllers\API;

use Illuminate\Http\Request;
use TUSIMO\Http\Controllers\Controller;
use TUSIMO\Http\Resources\LugaresCollection;
use Illuminate\Support\Facades\DB;
use TUSIMO\Lugares;

class  LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LugaresCollection(Lugares::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'type_circuito' => 'required',
            'datos_referencia' => 'required',
            'ubicacion' => 'required'
        ], [
            'title.required' => 'Titulo es requerido',
            'type_circuito.required' => 'Tipo es requerido',
            'datos_referencia.required' => 'Datos de referencia  es requerido',
            'ubicacion.required' => 'Ubicacion es requerido'
        ]);

        $lugares = new Lugares([
            'nombre' => $request->get('title'),
            'type' => $request->get('type_circuito'),
            'latitud' => 12,
            'longitud'=> 22,
            'datos_referencia' => $request->get('datos_referencia'),
            'ubicacion' => $request->get('ubicacion')
        ]);

        $lugares->save();
        return response()->json('successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lugar = Lugares::find($id);
        return response()->json([
            'location' => $lugar
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'type_circuito' => 'required',
            'datos_referencia' => 'required',
            'ubicacion' => 'required'
        ], [
            'title.required' => 'Titulo es requerido',
            'type_circuito.required' => 'Tipo es requerido',
            'datos_referencia.required' => 'Datos de referencia  es requerido',
            'ubicacion.required' => 'Ubicacion es requerido'
        ]);

        $lugar = Lugares::find($id);
        $lugar->nombre = $request->get('title');
        $lugar->type = $request->get('type_circuito');
        $lugar->datos_referencia = $request->get('datos_referencia');
        $lugar->ubicacion = $request->get('ubicacion');
        $lugar->save();
        return response()->json([
            'message' => 'Lugar updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lugar = Lugares::find($id);

        $lugar->delete();

        return response()->json([
            'message' => 'Lugars deleted successfully!'
        ], 200);
    }

    public function detailLocation($id)     {
        return response()->json([
            'message' => 'Lugares cargados!!'
        ], 200);
    }

    public function getCircuit($circuit) {


        $sql = "SELECT distinct l.id, l.nombre, l.datos_referencia, i.ruta_imagen
                FROM lugares as l, imagenes i
                WHERE l.id = i.lugares_id
                      AND type=?";
        $circuits = DB::select($sql, array($circuit));

        return response() -> json([
            "success" => true,
            "circuits" => $circuits
        ], 200);
    }
}
