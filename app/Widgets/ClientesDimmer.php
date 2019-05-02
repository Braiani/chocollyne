<?php

namespace App\Widgets;

use App\Cliente;
use App\Pedido;
use TCG\Voyager\Widgets\BaseDimmer;

class ClientesDimmer extends BaseDimmer
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
        $count = Cliente::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-bag',
            'title' => "{$count} clientes cadastrados",
            'text' => "Até o momento, temos {$count} clientes cadastrados.",
            'button' => [
                'text' => "Visualizar todos os clientes",
                'link' => route('voyager.clientes.index'),
            ],
            /*'image' => asset('images/children.jpg'),*/
            'image' => 'https://source.unsplash.com/collection/582071/1920x1080/'
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return app('VoyagerAuth')->user()->can('browse', new Cliente());
    }
}
