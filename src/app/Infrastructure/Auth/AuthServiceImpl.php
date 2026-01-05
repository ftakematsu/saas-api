<?php

namespace App\Infrastructure\Auth;

use App\Domain\User\AuthService;
use App\Domain\User\User;
use App\Models\User as UserModel;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthServiceImpl implements AuthService {
    public function generateToken(User $user): string {
        $model = UserModel::find($user->id());
        return JWTAuth::fromUser($model);
    }
}
