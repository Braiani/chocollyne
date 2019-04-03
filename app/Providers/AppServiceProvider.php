<?php

namespace App\Providers;

use App\Cliente;
use App\Observers\ClienteObserver;
use App\Observers\PedidoObserver;
use App\Pedido;
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
