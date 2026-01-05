<?php

namespace App\Domain\User;

interface UserRepository
{
    public function create(User $user): void;
    public function findByEmail(string $email): ?User;
}