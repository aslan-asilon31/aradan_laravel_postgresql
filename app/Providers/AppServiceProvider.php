<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Order\OrderRepositoryEloquent;
use App\Repositories\Payment\PaymentRepositoryInterface;
use App\Repositories\Payment\PaymentRepositoryEloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProductRepositoryInterface::class, 
            ProductRepositoryEloquent::class,
        );
        $this->app->bind(
            OrderRepositoryInterface::class, 
            OrderRepositoryEloquent::class,
        );
        $this->app->bind(
            PaymentRepositoryInterface::class, 
            PaymentRepositoryEloquent::class,
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
