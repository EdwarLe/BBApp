<?php

namespace App\Http\Controllers;

use App\Models\Miscellaneous;
use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $miscellaneous = Miscellaneous::all();
        return response()->json($miscellaneous);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $miscellaneous = new Miscellaneous();

        $miscellaneous->miscellaneous_name = $request->miscellaneous_name;
        $miscellaneous->quantity = $request->quantity;
        $miscellaneous->price = $request->price;
        $miscellaneous->change_measurement = $request->change_measurement;
        $miscellaneous->user_id = $request->user_id;

        $miscellaneous->save();

        return response()->json([
            'message' => 'Gasto agregado correctamente',
            'data' => $miscellaneous
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $miscellaneous = Miscellaneous::find($id);

        if (!empty($miscellaneous)) {
            return response()->json($miscellaneous);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Valor no encontrado'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $miscellaneous = Miscellaneous::find($id);

        if (isset($miscellaneous)) {
            $miscellaneous->miscellaneous_name = $request->miscellaneous_name;
            $miscellaneous->quantity = $request->quantity;
            $miscellaneous->price = $request->price;
            $miscellaneous->change_measurement = $request->change_measurement;
            $miscellaneous->user_id = $request->user_id;

            $miscellaneous->save();

            return response()->json([
                'message' => 'Valor actualizado correctamente',
                'data' => $miscellaneous
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Valor no encontrado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $miscellaneous = Miscellaneous::find($id);

        if (!empty($miscellaneous)) {
            $miscellaneous->delete();
            return response()->json([
                'message' => 'Valor eliminado correctamente'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Valor no encontrado'
        ]);
    }
}
