<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplies = Supply::all();
        return response()->json($supplies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $supply = new Supply;

        $supply->supply_name = $request->supply_name;
        $supply->quantity = $request->quantity;
        $supply->price = $request->price;
        $supply->change_measurement = $request->change_measurement;
        $supply->user_id = $request->user_id;

        $supply->save();

        return response()->json([
            'message' => 'Suministro agregado correctamente',
            'data' => $supply
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $supply = Supply::find($id);

        if (!empty($supply)) {
            return response()->json($supply);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Suministro no encontrado'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $supply = Supply::find($id);

        if (isset($supply)) {
            $supply->supply_name = $request->supply_name;
            $supply->quantity = $request->quantity;
            $supply->price = $request->price;
            $supply->change_measurement = $request->change_measurement;
            $supply->user_id = $request->user_id;

            $supply->save();

            return response()->json([
                'message' => 'Suministro actualizado correctamente',
                'data' => $supply
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Suministro no encontrado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $supply = Supply::find($id);

        if (!empty($supply)) {
            $supply->delete();
            return response()->json([
                'message' => 'Suministro eliminado correctamente'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Suministro no encontrado'
        ]);
    }
}
