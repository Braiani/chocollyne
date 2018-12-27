<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Cupom;
use Illuminate\Support\Facades\Session;

class CupomController extends VoyagerBaseController
{
    public function validar(Request $request)
    {
        $request->validate([
            'codigo' => 'required'
        ]);
        $desconto = Cupom::where('codigo', $request->codigo)->estaValido()->first();
        
        Session::flash('desconto', $desconto);
        
        return redirect()->route('cart');
    }
}
