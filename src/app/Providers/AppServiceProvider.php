<?php

namespace App\Providers;

use App\Domain\Order\OrderRepository;
use App\Domain\User\AuthService;
use App\Domain\User\UserRepository;
use App\Infrastructure\Auth\AuthServiceImpl;
use App\Infrastructure\Persistence\Repositories\EloquentOrderRepository;
use App\Infrastructure\Persistence\Repositories\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepository::class,
            EloquentUserRepository::class
        );
        
        $this->app->bind(
            AuthService::class,
            AuthServiceImpl::class
        );

        $this->app->bind(
            OrderRepository::class,
            EloquentOrderRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
