<?php

namespace App\Http\Controllers;

use App\Models\PrintProcess;
use Illuminate\Http\Request;

class PrintProcessController extends Controller
{
    function index()
    {
        $printProcesses = PrintProcess::all();
        return response()->json($printProcesses);
    }

    function store(Request $request)
    {
        $printProcess = new PrintProcess();
        $printProcess->name_paper_type_process = $request->name_paper_type_process;
        $printProcess->quantity = $request->quantity;
        $printProcess->unit_cost = $request->unit_cost;
        $printProcess->user_id = $request->user_id;
        $printProcess->save();

        return response()->json($printProcess);
    }

    function show($id)
    {
        $printProcess = PrintProcess::find($id);
        return response()->json($printProcess);
    }

    function update($id, Request $request)
    {
        $printProcess = PrintProcess::find($id);
        $printProcess->name_paper_type_process = $request->name_paper_type_process;
        $printProcess->quantity = $request->quantity;
        $printProcess->unit_cost = $request->unit_cost;
        $printProcess->user_id = $request->user_id;
        $printProcess->save();

        return response()->json($printProcess);
    }

    function destroy($id)
    {
        $printProcess = PrintProcess::find($id);
        $printProcess->delete();
        return response()->json('Print Process deleted successfully', 200);
    }
}
