<?php

namespace App\Domain\User;

use App\Models\User as UserModel;

class UserService {

    protected UserRepository $repository;

    public function __construct() {
        $this->repository = app()->make(UserRepository::class);
    }

    public function findById(int $id): User
    {
        $user = UserModel::findOrFail($id);

        return new User(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            password: $user->password
        );
    }

    
}