<?php

namespace App\Domain\User;

use Illuminate\Contracts\Support\Arrayable;

class User implements Arrayable
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

    public function toArray(): array
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'email' => $this->email,
        ];
    }
}
