<?php 

namespace App\Application\Order;

use App\Domain\Order\OrderRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ListUserOrders {
    public function __construct(
        private OrderRepository $repository
    ) {}

    public function execute(): array
    {
        $userId = Auth::user()->id;
        Log::info("ID USUARIO: " .  $userId);

        return $this->repository->findByUserId($userId);
    }
}