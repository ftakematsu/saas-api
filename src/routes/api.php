<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json(['pong' => true]);
});

Route::prefix('v1')->group(function () {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/users', [UserController::class, 'store']);

    // Rotas protegidas
    Route::middleware('auth:api')->group(function () {
        Route::post('/orders', [OrderController::class, 'store']);
        Route::get('/orders', [OrderController::class, 'getAll']);

        Route::post('/message', [ChatController::class, 'send']);
        Route::get('/messages/{conversationId}', [ChatController::class, 'getAll']);

        Route::post('/conversations', [ChatController::class, 'createConversation']);
    });

});
