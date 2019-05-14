<?php

namespace App\Providers;

use App\Cliente;
use App\Observers\ClienteObserver;
use App\Observers\PedidoObserver;
use App\Observers\ProductObserver;
use App\Pedido;
use App\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Cliente::observe(ClienteObserver::class);
        Pedido::observe(PedidoObserver::class);
        Product::observe(ProductObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
