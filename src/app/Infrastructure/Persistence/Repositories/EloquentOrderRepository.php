<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Order\Order;
use App\Domain\Order\OrderRepository;
use App\Models\Order as OrderModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EloquentOrderRepository implements OrderRepository
{
    public function create(Order $order): void {
        OrderModel::create([
            'user_id'     => $order->userId(),
            'description' => $order->description(),
            'status'      => $order->status(),
            'value'      => $order->value(),
        ]);
    }

    public function findByUserId(int $userId): array
    {
        
        return OrderModel::where('user_id', $userId)
            ->get()
            ->map(fn ($model) => Order::fromModel($model)->toArray())
            ->all();
    }
}