<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\User\User;
use App\Domain\User\UserRepository;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepository
{
    public function create(User $user): void {
        UserModel::create([
            'name'  => $user->name(),
            'email' => $user->email(),
            'password' => Hash::make($user->password())
        ]);
    }

    public function findByEmail(string $email): ?User {
        $resource = UserModel::where('email', $email)->first();

        if (!$resource) {
            return null;
        }

        return new User(
            id: $resource->id,
            name: $resource->name,
            email: $resource->email,
            password: $resource->password
        );
    }

    public function getAllUsers() {
        $resource = UserModel::get();
        return $resource->map(fn ($user) => new User(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            password: $user->password
        ));
    }
}
