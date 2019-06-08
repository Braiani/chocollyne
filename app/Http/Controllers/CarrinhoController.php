<?php

namespace App\Http\Controllers;

use App\Flavor;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;

class CarrinhoController extends Controller
{
    public function carrinho(Request $request)
    {
        $data = json_decode($request->cookie(env('APP_NAME') . '_carrinho'));
        if ($data != null and $data->quantidade > 0) {
            $selectProd = [];
            $selectFlavor = [];
            foreach ($data->items as $produto => $flavors) {
                array_push($selectProd, $produto);
                foreach ($flavors as $flavor => $quantity) {
                    array_push($selectFlavor, $flavor);
                }
            }
            $produtos = Product::whereIn('id', $selectProd)->get();
            $flavors = Flavor::whereIn('id', $selectFlavor)->get();
        } else {
            $produtos = null;
            $flavors = null;
        }
        if ($request->session()->has('desconto') and session('desconto.validacao')) {
            $desconto = session('desconto')['desconto'];
        } else {
            $desconto = null;
        }
        return view('cart')->with([
            'produtos' => $produtos,
            'flavors' => $flavors,
            'desconto' => $desconto
        ]);
    }

    public function adicionarCarrinho(Request $request, $produto)
    {
        $request->validate([
            'qtdade' => 'integer|min:1',
            'flavor' => 'required'
        ]);

        if ($request->cookie(env('APP_NAME') . '_carrinho') == null) {
            $data = [
                'quantidade' => 1,
                'items' => [
                    $produto => [
                        $request->flavor => $request->qtdade
                    ]
                ]
            ];

            $this->setCookie(env('APP_NAME') . '_carrinho', json_encode($data));
        } else {
            $data = json_decode($request->cookie(env('APP_NAME') . '_carrinho'), true);
            if (!array_key_exists($produto, $data['items']) or !array_key_exists($request->flavor, $data['items'][$produto])) {
                $data['quantidade'] += 1;
            }
            $data['items'][$produto][$request->flavor] = $request->qtdade;

            $this->setCookie(env('APP_NAME') . '_carrinho', json_encode($data));
        }

        toastr('Ítem adicionado ao carrinho com sucesso!', 'success');
        return redirect()->route('cart');
    }

    public function atualizarCarrinho(Request $request)
    {
        $request->validate([
            'qtdade[*].*' => 'integer|min:1'
        ]);
        $data = json_decode($request->cookie(env('APP_NAME') . '_carrinho'), true);
        foreach ($request->qtdade as $key => $value) {
            $data['items'][$key] = $value;
        }
        $this->setCookie(env('APP_NAME') . '_carrinho', json_encode($data));

        toastr('Ítens do carrinho atualizados com sucesso!', 'success');
        return redirect()->route('cart');
    }

    public function removerCarrinho(Request $request, $produto, $flavor)
    {
        $data = json_decode($request->cookie(env('APP_NAME') . '_carrinho'));
        unset($data->items->{$produto}->{$flavor});
        $data->quantidade -= 1;

        if ($data->quantidade > 0) {
            $this->setCookie(env('APP_NAME') . '_carrinho', json_encode($data));
        } else {
            $this->delCookie(env('APP_NAME') . '_carrinho');
        }

        toastr('Ítem removido do carrinho com sucesso!', 'info');
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
