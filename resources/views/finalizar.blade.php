@extends('layouts.master')

@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">Início</a>
                    <span class="mx-2 mb-0">/</span> <a href="{{ route('cart') }}">Carrinho</a>
                    <span class="mx-2 mb-0">/</span> <strong class="text-black">Finalizar</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            @includeWhen($errors->any(), 'layouts.errors')
            @includeWhen(session()->has('desconto'),'layouts.desconto-alert')
            @guest('cliente')
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border p-4 rounded" role="alert">
                            Já possui uma conta? <a href="{{ route('login') }}">Clique aqui</a> para fazer Login
                        </div>
                    </div>
                </div>
            @endguest
            <div class="row">
                @include('layouts.partials.form-endereco')
            </div>
            <div class="col-md-6">

                @if (! isset($desconto))
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Cupom de descontos</h2>
                            <div class="p-3 p-lg-5 border">
                                <form action="{{ route('cupom.validar') }}" id="form-cupom" method="post">
                                    {{ csrf_field() }}
                                    <label for="c_code" class="text-black mb-3">Insira o código do cupom de desconto,
                                        caso tenha algum.</label>
                                    <div class="input-group w-100">
                                        <input name="codigo" type="text" class="form-control" id="c_code"
                                               placeholder="Código do cupom"
                                               aria-label="Coupon Code" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm" form="form-cupom" type="submit"
                                                    id="button-addon2">Validar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Seu Pedido</h2>
                        <div class="p-3 p-lg-5 border">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                <th>Produto</th>
                                <th>Total</th>
                                </thead>
                                <tbody>
                                @php
                                    $data = json_decode(Cookie::get(env('APP_NAME') . '_carrinho'));
                                    $subTotal = 0;
                                @endphp
                                @foreach ($produtos as $produto)
                                    @php
                                        $subTotal += (real) $produto->preco * (int) $data->items->{$produto->id};
                                    @endphp
                                    <tr>
                                        <td>
                                            <a href="{{ route('product.show', $produto->slug) }}">{{ $produto->titulo }}</a>
                                            <strong class="mx-2">x</strong> {{ $data->items->{$produto->id} }}
                                        </td>
                                        <td>
                                            @php
                                                $totalItem = (real) $produto->preco * (int) $data->items->{$produto->id};
                                            @endphp
                                            R$ {{ number_format($totalItem, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Subtotal</strong></td>
                                    <td class="text-black">R$ {{ number_format($subTotal, 2, ',', '.') }}</td>
                                </tr>
                                @if (isset($desconto))
                                    @php
                                        $total = (real) $subTotal - ((real) $subTotal * ((real) $desconto / 100));
                                    @endphp
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Desconto</strong></td>
                                        <td class="text-black">
                                            @php
                                                $desconto = ((real) $subTotal * ((real) $desconto / 100));
                                            @endphp
                                            R$ {{ number_format($desconto, 2, ',', '.') }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Total do Pedido</strong></td>
                                    <td class="text-black font-weight-bold">
                                        <strong>R$ {{ isset($total) ? number_format($total, 2, ',', '.') : number_format($subTotal, 2, ',', '.') }}</strong></td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0">
                                    <a class="d-block" data-toggle="collapse" href="#pagamentodinheiro"
                                       role="button" aria-expanded="false" aria-controls="pagamentodinheiro">
                                        Pagamento em Espécie
                                    </a>
                                </h3>
                                <div class="collapse" id="pagamentodinheiro">
                                    <div class="py-2">
                                        <p class="mb-0">Make your payment directly into our bank account. Please use
                                            your Order ID as the payment reference. Your order won’t be shipped until
                                            the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0">
                                    <a class="d-block" data-toggle="collapse" href="#pagamentoboleto"
                                       role="button" aria-expanded="false" aria-controls="pagamentoboleto">
                                        Boleto Bancário
                                    </a>
                                </h3>
                                <div class="collapse" id="pagamentoboleto">
                                    <div class="py-2">
                                        <p class="mb-0">Make your payment directly into our bank account. Please use
                                            your Order ID as the payment reference. Your order won’t be shipped until
                                            the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0">
                                    <a class="d-block" data-toggle="collapse" href="#pagamentodeposito"
                                       role="button" aria-expanded="false" aria-controls="pagamentodeposito">
                                        Depósito Bancário
                                    </a>
                                </h3>
                                <div class="collapse" id="pagamentodeposito">
                                    <div class="py-2">
                                        <p class="mb-0">Make your payment directly into our bank account. Please use
                                            your Order ID as the payment reference. Your order won’t be shipped until
                                            the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border p-3 mb-5">
                                <h3 class="h6 mb-0">
                                    <a class="d-block" data-toggle="collapse" href="#pagamentocartao"
                                       role="button" aria-expanded="false" aria-controls="pagamentocartao">
                                        Cartões de Débito/Crédito
                                    </a>
                                </h3>
                                <div class="collapse" id="pagamentocartao">
                                    <div class="py-2">
                                        <p class="mb-0">Make your payment directly into our bank account. Please use
                                            your Order ID as the payment reference. Your order won’t be shipped until
                                            the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg py-3 btn-block" form="form-checkout">Finalizar
                                    Pedido
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection