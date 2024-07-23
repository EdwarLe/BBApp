<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = new Employee();

        $employee->job = $request->job;
        $employee->first_name = $request->first_name;
        $employee->surname = $request->surname;
        $employee->id_type = $request->id_type;
        $employee->id_number = $request->id_number;
        $employee->salary = $request->salary;

        $employee->save();

        return response()->json([
            'message' => 'Empleado agregado correctamente',
            'data' => $employee
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        if (!empty($employee)) {
            return response()->json($employee);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Empleado no encontrado'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (isset($employee)) {
            $employee->job = $request->job;
            $employee->first_name = $request->first_name;
            $employee->surname = $request->surname;
            $employee->id_type = $request->id_type;
            $employee->id_number = $request->id_number;
            $employee->salary = $request->salary;

            $employee->save();

            return response()->json([
                'message' => 'Empleado actualizado correctamente',
                'data' => $employee
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Empleado no encontrado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!empty($employee)) {
            $employee->delete();
            return response()->json([
                'message' => 'Empleado eliminado correctamente'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Empleado no encontrado'
        ]);
    }
}
