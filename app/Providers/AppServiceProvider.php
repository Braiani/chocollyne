<?php

namespace App\Providers;

use App\Cliente;
use App\Observers\ClienteObserver;
use App\Observers\PedidoObserver;
use App\Pedido;
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
