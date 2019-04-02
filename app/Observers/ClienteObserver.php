<?php

namespace App\Observers;

use App\Cliente;
use App\Notifications\ClienteRegistredNotification;

class ClienteObserver
{
    /**
     * Handle the cliente "created" event.
     *
     * @param  \App\Cliente  $cliente
     * @return void
     */
    public function created(Cliente $cliente)
    {
        $cliente->notify(new ClienteRegistredNotification($cliente));
    }

    /**
     * Handle the cliente "updated" event.
     *
     * @param  \App\Cliente  $cliente
     * @return void
     */
    public function updated(Cliente $cliente)
    {
        //
    }

    /**
     * Handle the cliente "deleted" event.
     *
     * @param  \App\Cliente  $cliente
     * @return void
     */
    public function deleted(Cliente $cliente)
    {
        //
    }

    /**
     * Handle the cliente "restored" event.
     *
     * @param  \App\Cliente  $cliente
     * @return void
     */
    public function restored(Cliente $cliente)
    {
        //
    }

    /**
     * Handle the cliente "force deleted" event.
     *
     * @param  \App\Cliente  $cliente
     * @return void
     */
    public function forceDeleted(Cliente $cliente)
    {
        //
    }
}
