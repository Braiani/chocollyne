<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Flavor;
use App\Http\Requests\FinishCheckout;
use App\Pedido;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class CheckoutController extends Controller
{
    public function finalizar(Request $request)
    {
        $data = json_decode($request->cookie(env('APP_NAME') . '_carrinho'), true);

        $produtos = $this->getProdutos($data);
        $flavors = $this->getFlavors($data);

        if ($request->session()->has('desconto') and session('desconto.validacao')) {
            $desconto = session('desconto')['desconto'];
        } else {
            $desconto = null;
        }
        return view('finalizar')->with([
            'produtos' => $produtos,
            'flavors' => $flavors,
            'desconto' => $desconto
        ]);
    }

    public function checkout(FinishCheckout $request)
    {
        $cliente = $request->validated();
        $observacao = $cliente['observacao'];
        unset($cliente['observacao']);
        !isset($cliente['password']) ?: $cliente['password'] = Hash::make($cliente['password']);

        $newCliente = Cliente::updateOrCreate(
            [
                'cpf' => $cliente['cpf'],
                'email' => $cliente['email']
            ],
            $cliente
        );

        $subtotal = $this->calcularSubtotal();
        $total = $this->calcularTotal($subtotal);

        $pedido = Pedido::create([
            'cliente_id' => $newCliente->id,
            'cupom_id' => (session()->has('desconto') and session('desconto.validacao')) ? session('desconto')['id'] : null,
            'subtotal' => $subtotal,
            'total' => $total,
            'observacao' => $observacao
        ]);

        $data = json_decode(Cookie::get(env('APP_NAME') . '_carrinho'), true);
        $produtos = $this->getProdutos($data);

        foreach ($produtos as $key => $produto) {
            foreach ($data['items'][$produto->id] as $flavor => $quantity) {
                $sync_data = [
                    'flavor_id' => $flavor,
                    'quantidade' => (integer)$quantity,
                    'preco' => (real)$produto->preco
                ];
                $pedido->produtos()->attach($produto->id, $sync_data);
            }
        }

        session()->forget('desconto');
        Cookie::queue(Cookie::forget(env('APP_NAME') . '_carrinho'));

        return redirect()->route('cart.thanks');
    }

    public function obrigado()
    {
        return view('order-placed');
    }

    public function getProdutos($data)
    {
        if ($data != null and $data['quantidade'] > 0) {
            $selectProd = [];
            foreach ($data['items'] as $key => $value) {
                array_push($selectProd, $key);
            }
            $produtos = Product::whereIn('id', $selectProd)->get();
        } else {
            $produtos = null;
        }
        return $produtos;
    }

    public function getFlavors($data)
    {
        if ($data != null and $data['quantidade'] > 0) {
            $selectFlavor = [];
            foreach ($data['items'] as $product) {
                foreach ($product as $flavor => $quantity) {
                    array_push($selectFlavor, $flavor);
                }
            }
            $flavors = Flavor::whereIn('id', $selectFlavor)->get();
        } else {
            $flavors = null;
        }
        return $flavors;
    }

    public function calcularTotal($subtotal)
    {
        if (session()->has('desconto') and session('desconto.validacao')) {
            $desconto = session('desconto')['desconto'];
            $total = (real)$subtotal - ((real)$subtotal * ((real)$desconto / 100));
        } else {
            $total = $subtotal;
        }

        return $total;
    }

    public function calcularSubtotal()
    {
        $data = json_decode(Cookie::get(env('APP_NAME') . '_carrinho'), true);
        $subTotal = 0;
        $produtos = $this->getProdutos($data);

        foreach ($produtos as $key => $produto) {
            foreach ($data['items'][$produto->id] as $flavor => $quantity) {
                $subTotal += (real)$produto->preco * (int)$quantity;
            }
        }

        return $subTotal;
    }
}
