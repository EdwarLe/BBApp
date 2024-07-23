<?php

namespace App\Http\Controllers;

use App\Models\Workday;
use Illuminate\Http\Request;

class WorkdayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workdays = Workday::all();
        return response()->json($workdays);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $workday = new Workday;

        $workday->date_start = $request->date_start;
        $workday->lunch_start = $request->lunch_start;
        $workday->lunch_end = $request->lunch_end;
        $workday->date_end = $request->date_end;

        $workday->save();

        return response()->json([
            'message' => 'Fecha agregada correctamente',
            'data' => $workday
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $workday = Workday::find($id);

        if (!empty($workday)) {
            return response()->json($workday);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Fecha no encontrado'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //
    // }
}
