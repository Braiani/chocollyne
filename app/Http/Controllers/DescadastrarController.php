<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class DescadastrarController extends Controller
{
    public function __invoke(Request $request, Cliente $cliente)
    {
        abort_if($cliente->email != $request->email, 404);
        $cliente->receber_news = false;
        $cliente->save();

        return view('perfil.descadastrado');
    }
}
