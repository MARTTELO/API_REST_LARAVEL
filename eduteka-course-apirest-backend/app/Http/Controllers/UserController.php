<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpadateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

    $currentPage = $request->get('current_page') ?? 1;
    $regsPerPage = 3;
    $skip = ($currentPage - 1) * $regsPerPage;
    $users = User::skip($skip)->take($regsPerPage)->orderByDesc('id')->get();

    return response()->json($users, 200);

        // try {
        //     $users = User::all();

        //     return response()->json($users, );
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'message' => 'Erro ao obter os usuários',
        //         'error' => $e->getMessage()
        //     ], 500);
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        try {
            $user = new User();
            $user->fill($data);
            $user->password = Hash::make(123);
            $user->save();
            dd($user);
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar o usuário',
                'error' => $e->getMessage()
            ], 400);
        }
        // try {
        //     $user = User::create([
        //         'name' => $name,
        //         'email' => $email,
        //         'date_of_birth' => $date_of_birth
        //     ]);
        //     return response()->json($user, 201);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'message' => 'Erro ao criar o usuário',
        //         'error' => $e->getMessage()
        //     ], 500);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json($user, 200);
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
    public function update(UpadateUserRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $user = User::findOrFail($id);
            $user->update($data);
            return response()->json($user, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar o usuário',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $removed = User::destroy($id);
            if(!$removed){
                throw new \Exception("Usuário não encontrado");
            }
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao excluir o usuário',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
