<?php

namespace App\Http\Controllers\Api;

use App\Application\Order\CreateOrder;
use App\Application\Order\ListUserOrders;
use App\Domain\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {
    public function store(
        Request $request,
        CreateOrder $useCase
    ) {
        $authUser = Auth::user();

        // converter Model → Domain User
        $user = User::fromModel($authUser);

        $useCase->execute(
            $user,
            $request->get('description'),
            $request->get('value')
        );

        return response()->json([
            'message' => 'Pedido criado com sucesso!'
        ], 201);
    }

    public function getAll(ListUserOrders $useCase) {
        $orders = $useCase->execute();

        return response()->json($orders);
    }
}
