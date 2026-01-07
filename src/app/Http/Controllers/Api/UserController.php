<?php

namespace App\Http\Controllers\Api;

use App\Application\User\CreateUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * @OA\Post(
     *     path="/api/v1/users",
     *     summary="Cria um usuário",
     *     tags={"create", "user"},
     *
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email"},
     *             @OA\Property(property="name", type="string", example="Seu nome"),
     *             @OA\Property(property="email", type="string", example="user@mail.com"),
     *             @OA\Property(property="password", type="string", example="1234")   
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Cadastro criado com sucesso!"
     *     )
     * )
     */
    public function store(Request $request, CreateUser $useCase)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $useCase->execute(
            $request->get('name'),
            $request->get('email'),
            $request->get('password')
        );

        return response()->json(['message' => 'User created'], 201);
    }
}
