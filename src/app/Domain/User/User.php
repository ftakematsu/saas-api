<?php

namespace App\Domain\User;

class User
{
    public function __construct(
        private string $id,
        private string $name,
        private string $email,
        private string $password
    ) {}

    public static function fromModel($model): self {
        return new self(
            $model->id,
            $model->name,
            $model->email,
            $model->password
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }
}
