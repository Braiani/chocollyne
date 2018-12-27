<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CarrinhoController extends Controller
{
    public function carrinho(Request $request)
    {
        $data = json_decode($request->cookie(env('APP_NAME') . '_carrinho'));
        if ($data != null and $data->quantidade > 0) {
            $selectProd = [];
            foreach ($data->items as $key => $value) {
                array_push($selectProd, $key);
            }
            $produtos = Product::whereIn('id', $selectProd)->get();
        } else {
            $produtos = null;
        }
        if (Session::has('desconto')) {
            $desconto = Session::get('desconto')->desconto;
        } else {
            $desconto = null;
        }
        return view('cart')->with(['produtos' => $produtos, 'desconto' => $desconto]);
    }
    
    public function finalizar()
    {
        return view('finalizar');
    }
    
    public function adicionarCarrinho(Request $request, $produto)
    {
        $request->validate([
            'qtdade' => 'integer|min:1'
        ]);

        if ($request->cookie(env('APP_NAME') . '_carrinho') == null) {
            $data = [
                'quantidade' => 1,
                'items' => [
                    $produto => $request->qtdade
                ]
            ];

            $this->setCookie(env('APP_NAME') . '_carrinho', json_encode($data));
        } else {
            $data = json_decode($request->cookie(env('APP_NAME') . '_carrinho'));
            if (property_exists($data->items, $produto)) {
                $data->items->$produto += $request->qtdade;
            }else{
                $data->quantidade += 1;
                $data->items->$produto = $request->qtdade;
            }
            $this->setCookie(env('APP_NAME') . '_carrinho', json_encode($data));
        }

        return redirect()->route('cart');
    }
    
    public function atualizarCarrinho(Request $request)
    {
        $request->validate([
            'qtdade.*' => 'integer|min:1'
        ]);
        $data = json_decode($request->cookie(env('APP_NAME') . '_carrinho'));
        foreach ($request->qtdade as $key => $value) {
            $data->items->{$key} = $value;
        }
        $this->setCookie(env('APP_NAME') . '_carrinho', json_encode($data));

        return redirect()->route('cart');
    }
    
    public function removerCarrinho(Request $request, $produto)
    {
        $data = json_decode($request->cookie(env('APP_NAME') . '_carrinho'));
        unset($data->items->{$produto});
        $data->quantidade -= 1;
        
        if ($data->quantidade > 0) {
            $this->setCookie(env('APP_NAME') . '_carrinho', json_encode($data));
        } else {
            $this->delCookie(env('APP_NAME') . '_carrinho');
        }

        return redirect()->route('cart');
    }
    
    public function setCookie($name, $value)
    {
        Cookie::queue(Cookie::make($name, $value, 36000));
    }
    
    public function delCookie($name)
    {
        Cookie::queue(Cookie::forget($name));
    }
}
