<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sales::all();
        return response()->json($sales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sale = new Sales;

        $sale->start_date = $request->start_date;
        $sale->end_date = $request->end_date;
        $sale->advance = $request->advance;
        $sale->remaining_payment = $request->remaining_payment;
        $sale->quotation_id = $request->quotation_id;
        $sale->user_id = $request->user_id;

        $sale->save();

        return response()->json([
            'message' => 'Venta agregada correctamente',
            'data' => $sale
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sale = Sales::find($id);

        if (!empty($sale)) {
            return response()->json($sale);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Venta no encontrada'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sale = Sales::find($id);

        if (isset($sale)) {
            $sale->start_date = $request->start_date;
            $sale->end_date = $request->end_date;
            $sale->advance = $request->advance;
            $sale->remaining_payment = $request->remaining_payment;
            $sale->quotation_id = $request->quotation_id;
            $sale->user_id = $request->user_id;

            $sale->save();

            return response()->json([
                'message' => 'Venta actualizada correctamente',
                'data' => $sale
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Venta no encontrado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sale = Sales::find($id);

        if (!empty($sale)) {
            $sale->delete();
            return response()->json([
                'message' => 'Venta eliminada correctamente'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Venta no encontrada'
        ]);
    }
}
