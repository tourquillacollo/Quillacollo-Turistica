<?php

namespace TUSIMO\Http\Controllers\API;

use Illuminate\Http\Request;
use TUSIMO\Http\Controllers\Controller;
use TUSIMO\Http\Resources\LugaresCollection;
use TUSIMO\Lugares;

class LocationController extends Controller
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
        $lugares = new Lugares([
            'nombre' => $request->get('title'),
            'type' => $request->get('type_circuito'),
            'latitud' => 12,
            'longitud'=> 22,
            'datos_referencia' => $request->get('datos_referencia')
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
        //
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
}
