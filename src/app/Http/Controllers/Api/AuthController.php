<?php

namespace App\Http\Controllers\Api;

use App\Application\User\LoginUserUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller {
    
    /**
     * @OA\Post(
     *     path="/api/v1/login",
     *     summary="Realiza login do usuário gerando um token JWT",
     *     tags={"auth"},
     *
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", example="user@mail.com"),
     *             @OA\Property(property="password", type="string", example="1234")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Login realizado com sucesso"
     *     )
     * )
     */
    public function login(
        Request $request,
        LoginUserUseCase $useCase
    ) {
        $token = $useCase->execute(
            $request->get('email'),
            $request->get('password')
        );

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

}
