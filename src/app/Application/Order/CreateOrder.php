<?php 

namespace App\Application\Order;

use App\Domain\Order\Order;
use App\Domain\Order\OrderRepository;
use App\Domain\Order\OrderStatus;
use App\Domain\User\User;

class CreateOrder
{
    public function __construct(
        private OrderRepository $repository
    ) {}

    public function execute(
        User $user,
        string $description,
        float $value
    ): void {
        $this->repository->create(new Order(null, $user->id(), $description, $value, OrderStatus::PENDING->value));
    }
}
