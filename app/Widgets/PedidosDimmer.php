<?php

namespace App\Widgets;

use App\Pedido;
use TCG\Voyager\Widgets\BaseDimmer;

class PedidosDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Pedido::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-bag',
            'title' => "{$count} pedidos recebidos",
            'text' => "Recebemos {$count} até o momento.",
            'button' => [
                'text' => "Visualizar todos os pedidos",
                'link' => route('voyager.pedidos.index'),
            ],
            'image' => asset('images/empty-cart.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return app('VoyagerAuth')->user()->can('browse', new Pedido());
    }
}
