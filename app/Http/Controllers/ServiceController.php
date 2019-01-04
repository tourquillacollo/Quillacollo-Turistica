<?php

namespace TUSIMO\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TUSIMO\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return response() -> json([
            "success" => true,
            "services" => $services
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response() -> json([
            "success" => true,
            "services" => "Crear"
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->service_name = $request->get('service_name');
        $service->detail = $request->get('detail');
        $service->address = $request->get('address');
        $service->telephone = $request->get('telephone');
        $service->type = $request->get("type");
        $service->save();

        return response() -> json([
            "success" => true,
            "services" => $service
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return response()->json([
            'service' => $service
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json([
            'service' => 'edit'
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
        $service = Service::find($id);
        $service->service_name = $request->get('service_name');
        $service->detail = $request->get('detail');
        $service->address = $request->get('address');
        $service->telephone = $request->get('telephone');
        $service->type = $request->get("type");
        $service->save();
        return response()->json([
            'message' => 'Service updated successfully!'
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
        $service = Service::find($id);

        $service->delete();

        return response()->json([
            'message' => 'Service deleted successfully!'
        ], 200);
    }

    public function getService($name) {
        $services = DB::table('services')
            ->where('type', $name)
            ->get();
        return response() -> json([
            "success" => true,
            "services" => $services
        ], 200);
    }
}
