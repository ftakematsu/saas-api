<?php

namespace App\Http\Controllers\Api;

use App\Application\User\CreateUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
