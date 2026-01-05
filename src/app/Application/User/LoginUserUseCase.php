<?php
namespace App\Application\User;

use App\Domain\User\AuthService;
use App\Domain\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class LoginUserUseCase
{
    public function __construct(
        private UserRepository $repository,
        private AuthService $auth
    ) {}

    public function execute(string $email, string $password): string
    {
        $user = $this->repository->findByEmail($email);

        if (!$user || !Hash::check($password, $user->password())) {
            throw new Exception('Credenciais inválidas');
        }

        return $this->auth->generateToken($user);
    }
}
