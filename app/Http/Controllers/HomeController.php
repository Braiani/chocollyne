<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:cliente');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::where('cliente_id', Auth::user()->id)->paginate();
        return view('home')->with(['pedidos' => $pedidos]);
    }
}
