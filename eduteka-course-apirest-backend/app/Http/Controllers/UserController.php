<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::all();
            return response()->json($users, );
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao obter os usuários',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $id)
    {
       //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         try {
            $user = User::findOrFail($id);
            return response()->json($user,200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao exibir o usuário',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /**/
    }
}
