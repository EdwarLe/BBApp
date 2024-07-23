<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotations = Quotation::all();
        return response()->json($quotations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $quotation = new Quotation;

        $quotation->quantity = $request->quantity;
        $quotation->description = $request->description;
        $quotation->price = $request->price;
        $quotation->advance_percentage = $request->advance_percentage;
        $quotation->remaining_percentage = $request->remaining_percentage;
        $quotation->is_sales = $request->is_sales;
        $quotation->client_id = $request->client_id;

        $quotation->save();

        return response()->json([
            'message' => 'Cotización agregado correctamente',
            'data' => $quotation
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $quotation = Quotation::find($id);

        if (!empty($quotation)) {
            return response()->json($quotation);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Cotización no encontrada'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $quotation = Quotation::find($id);

        if (isset($quotation)) {
            $quotation->quantity = $request->quantity;
            $quotation->description = $request->description;
            $quotation->price = $request->price;
            $quotation->advance_percentage = $request->advance_percentage;
            $quotation->remaining_percentage = $request->remaining_percentage;
            $quotation->is_sales = $request->is_sales;
            $quotation->client_id = $request->client_id;

            $quotation->save();

            return response()->json([
                'message' => 'Cotización actualizada correctamente',
                'data' => $quotation
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Cotización no encontrada'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $quotation = Quotation::find($id);

        if (!empty($quotation)) {
            $quotation->delete();
            return response()->json([
                'message' => 'Cotización eliminada correctamente'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Cotización no encontrada'
        ]);
    }
}
