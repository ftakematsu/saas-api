<?php

namespace App\Http\Controllers\Api;

use App\Application\User\LoginUserUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
