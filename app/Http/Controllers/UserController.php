<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 2;

        $user->save();

        return response()->json([
            'message' => 'Usuario agregado correctamente',
            'data' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!empty($user)) {
            return response()->json($user);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Usuario no encontrado'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (isset($user)) {

            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 2;

            $user->save();

            return response()->json([
                'message' => 'Usuario actualizado correctamente',
                'data' => $user
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Usuario no encontrado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!empty($user)) {
            $user->delete();
            return response()->json([
                'message' => 'Usuario eliminado correctamente'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Usuario no encontrado'
        ]);
    }
}
