<?php 

namespace App\Domain\Order;

interface OrderRepository
{
    public function create(Order $order): void;

    public function findByUserId(int $userId): array;

}
