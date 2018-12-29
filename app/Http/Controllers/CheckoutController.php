<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\FinishCheckout;
use Illuminate\Support\Facades\Hash;
use App\Cliente;
use App\Pedido;
use Illuminate\Support\Facades\Cookie;

class CheckoutController extends Controller
{
    public function finalizar(Request $request)
    {
        $data = json_decode($request->cookie(env('APP_NAME') . '_carrinho'));
        
        $produtos = $this->getProdutos($data);
        
        if ($request->session()->has('desconto') and session('desconto.validacao')) {
            $desconto = session('desconto')['desconto'];
        } else {
            $desconto = null;
        }
        return view('finalizar')->with(['produtos' => $produtos, 'desconto' => $desconto]);
    }
    
    public function checkout(FinishCheckout $request)
    {
        $cliente = $request->validated();
        $observacao = $cliente['observacao'];
        unset($cliente['observacao']);
        $cliente['password'] = Hash::make($cliente['password']);

        $newCliente = Cliente::updateOrCreate([
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
        
        $sync_data = [];
        $data = json_decode(Cookie::get(env('APP_NAME') . '_carrinho'));
        $produtos = $this->getProdutos($data);
        
        foreach ($produtos as $key => $produto) {
            $sync_data[$produto->id] = [
                'quantidade' => (integer) $data->items->{$produto->id},
                'preco' => (real) $produto->preco
            ];
        }
        
        $pedido->produtos()->sync($sync_data);
        session()->forget('desconto');
        Cookie::queue(Cookie::forget(env('APP_NAME') . '_carrinho'));
        return view('order-placed');
    }
    
    public function getProdutos($data)
    {
        if ($data != null and $data->quantidade > 0) {
            $selectProd = [];
            foreach ($data->items as $key => $value) {
                array_push($selectProd, $key);
            }
            $produtos = Product::whereIn('id', $selectProd)->get();
        } else {
            $produtos = null;
        }
        return $produtos;
    }
    
    public function calcularTotal($subtotal)
    {
        if (session()->has('desconto') and session('desconto.validacao')) {
            $desconto = session('desconto')['desconto'];
            $total = (real) $subtotal - ((real) $subtotal * ((real) $desconto / 100));
        } else {
            $total = $subtotal;
        }

        return $total;
    }
    
    public function calcularSubtotal()
    {
        $data = json_decode(Cookie::get(env('APP_NAME') . '_carrinho'));
        $subTotal = 0;
        $produtos = $this->getProdutos($data);
        foreach ($produtos as $key => $produto) {
            $subTotal += (real) $produto->preco * (int) $data->items->{$produto->id};
        }

        return $subTotal;
    }
}
