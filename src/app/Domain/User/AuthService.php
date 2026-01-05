<?php
namespace App\Domain\User;

use App\Domain\User\User;

interface AuthService {
    public function generateToken(User $user): string;
}
