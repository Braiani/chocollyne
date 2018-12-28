<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Cupom;

class CupomController extends VoyagerBaseController
{
    public function validar(Request $request)
    {
        $request->validate([
            'codigo' => 'required'
        ]);
        $desconto = Cupom::where('codigo', $request->codigo)->estaValido()->first();
        
        if ($request->session()->has('desconto')) {
            $request->session()->forget('desconto');
        }

        if ($desconto != null) {
            $desconto = $desconto->toArray();
            $desconto['validacao'] = true;
            session(['desconto' => $desconto]);
        }else{
            session([
                'desconto.validacao' => false
            ]);
        }
        return redirect()->route('cart');
    }
}
