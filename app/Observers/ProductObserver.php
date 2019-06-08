<?php

namespace App\Observers;

use App\Cliente;
use App\Notifications\NewProductAvaliableNotification;
use App\Product;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        if ($product->ativo){
            $clientes = Cliente::receberNews()->get();
            $clientes->each(function ($item, $key) use ($product) {
                $item->notify(new NewProductAvaliableNotification($product, $item, false));
            });
        }
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        if ($product->ativo){
            $clientes = Cliente::receberNews()->get();
            $clientes->each(function ($item, $key) use ($product) {
                $item->notify(new NewProductAvaliableNotification($product, $item, true));
            });
        }
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
