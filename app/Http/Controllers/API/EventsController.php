<?php

namespace TUSIMO\Http\Controllers\API;
use Illuminate\Http\Request;
use TUSIMO\Events;
use TUSIMO\Http\Controllers\Controller;
use TUSIMO\Http\Resources\EventsCollection;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new EventsCollection(Events::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Events([
            'titulo' => $request->get('title'),
            'tipo' => $request->get('tipo'),
            'latitud' => 12,
            'longitud'=> 22,
            'fecha_ini' => $request->get('fecha_ini'),
            'fecha_fin' => $request->get('fecha_fin'),
            'detalle' => $request->get('detalle'),
            'location' => $request->get('location')
        ]);

        $event->save();
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
        $event = Events::find($id);
        return response()->json([
            'event' => $event
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
        $event = Events::find($id);
        $event->titulo = $request->get('title');
        $event->tipo = $request->get('tipo');
        $event->fecha_ini = $request->get('fecha_ini');
        $event->fecha_fin = $request->get('fecha_fin');
        $event->detalle = $request->get('detalle');
        $event->location = $request->get('location');
        $event->save();
        return response()->json([
            'message' => 'Event updated successfully!'
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
        $event = Events::find($id);

        $event->delete();

        return response()->json([
            'message' => 'Events deleted successfully!'
        ], 200);
    }

    public function detailLocation($id)     {
        return response()->json([
            'message' => 'Events cargados!!'
        ], 200);
    }

    public function getEvent($event) {
        $event = DB::table('events')
            ->where('tipo', $event)
            ->get();
        return response() -> json([
            "success" => true,
            "event" => $event
        ], 200);
    }
}