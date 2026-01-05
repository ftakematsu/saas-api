<?php

namespace App\Application\User;

use App\Domain\User\User;
use App\Domain\User\UserRepository;
use Illuminate\Support\Str;

class CreateUser
{
    public function __construct(
        private UserRepository $repository
    ) {}

    public function execute(string $name, string $email, string $password): void
    {
        $user = new User(
            id: (string) Str::uuid(),
            name: $name,
            email: $email,
            password: $password
        );

        $this->repository->create($user);
    }
}
