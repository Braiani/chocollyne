<?php

namespace App\Observers;

use App\Notifications\PedidoRegistredAdminNotification;
use App\Notifications\PedidoRegistredNotification;
use App\Notifications\PedidoUpdatedNotification;
use App\Pedido;
use App\User;

class PedidoObserver
{
    /**
     * Handle the pedido "created" event.
     *
     * @param  \App\Pedido  $pedido
     * @return void
     */
    public function created(Pedido $pedido)
    {
        $cliente = $pedido->cliente;
        $cliente->notify(new PedidoRegistredNotification($pedido));
        User::all()->each(function ($item, $key) use ($pedido) {
            $item->notify(new PedidoRegistredAdminNotification($pedido, $item));
        });

    }

    /**
     * Handle the pedido "updated" event.
     *
     * @param  \App\Pedido  $pedido
     * @return void
     */
    public function updated(Pedido $pedido)
    {
        $cliente = $pedido->cliente;
        $cliente->notify(new PedidoUpdatedNotification($pedido));
    }

    /**
     * Handle the pedido "deleted" event.
     *
     * @param  \App\Pedido  $pedido
     * @return void
     */
    public function deleted(Pedido $pedido)
    {
        //
    }

    /**
     * Handle the pedido "restored" event.
     *
     * @param  \App\Pedido  $pedido
     * @return void
     */
    public function restored(Pedido $pedido)
    {
        //
    }

    /**
     * Handle the pedido "force deleted" event.
     *
     * @param  \App\Pedido  $pedido
     * @return void
     */
    public function forceDeleted(Pedido $pedido)
    {
        //
    }
}
