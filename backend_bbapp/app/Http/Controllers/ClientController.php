<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client;

        $client->client_name = $request->client_name;
        $client->client_surname = $request->client_surname;
        $client->phone_number = $request->phone_number;
        $client->address = $request->address;
        $client->company_name = $request->company_name;

        $client->save();

        return response()->json([
            'message' => 'Cliente agregado correctamente',
            'data' => $client
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::find($id);

        if (!empty($client)) {
            return response()->json($client);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Cliente no encontrado'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        if (isset($client)) {
            $client->client_name = $request->client_name;
            $client->client_surname = $request->client_surname;
            $client->phone_number = $request->phone_number;
            $client->address = $request->address;
            $client->company_name = $request->company_name;

            $client->save();

            return response()->json([
                'message' => 'Cliente actualizado correctamente',
                'data' => $client
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Cliente no encontrado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = Client::find($id);

        if (!empty($client)) {
            $client->delete();
            return response()->json([
                'message' => 'Cliente eliminado correctamente'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Cliente no encontrado'
        ]);
    }
}
