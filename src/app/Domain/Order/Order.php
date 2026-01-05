<?php 

namespace App\Domain\Order;
use App\Models\Order as OrderModel;

class Order
{
    public function __construct(
        private ?int $id,
        private int $userId,
        private string $description,
        private float $value,
        private string $status,
    ) {}

    public function id(): ?int
    {
        return $this->id;
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function description(): string
    {
        return $this->description;
    }

    public static function fromModel(OrderModel $model): self
    {
        return new self(
            $model->id,
            $model->user_id,
            $model->description,
            $model->value,
            $model->status,
           
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'description' => $this->description,
            'value' => $this->value,
        ];
    }
}
