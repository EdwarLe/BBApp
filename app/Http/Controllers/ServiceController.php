<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return response()->json($services);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = new Service;

        $service->service_name = $request->service_name;
        $service->quantity = $request->quantity;
        $service->price = $request->price;
        $service->currency = $request->currency;
        $service->user_id = $request->user_id;

        $service->save();

        return response()->json([
            'message' => 'Servicio agregado correctamente',
            'data' => $service
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $service = Service::find($id);

        if (!empty($service)) {
            return response()->json($service);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Servicio no encontrado'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        if (isset($service)) {
            $service->service_name = $request->service_name;
            $service->quantity = $request->quantity;
            $service->price = $request->price;
            $service->currency = $request->currency;
            $service->user_id = $request->user_id;

            $service->save();

            return response()->json([
                'message' => 'Servicio actualizado correctamente',
                'data' => $service
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Servicio no encontrado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
