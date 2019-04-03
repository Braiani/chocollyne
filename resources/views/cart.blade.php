@extends('layouts.master')

@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Início</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Carrinho</strong></div>
            </div>
        </div>
    </div>
    <div class="site-section">
        @includeWhen($errors->any(), 'layouts.errors')
        @includeWhen(session()->has('desconto'),'layouts.desconto-alert')
        @if ($produtos != null)
            @php
                $data = json_decode(Cookie::get(env('APP_NAME') . '_carrinho'));
                $subTotal = 0;
            @endphp
            <div class="container">
                <div class="row mb-5">
                    <form id="form-carrinho" action="{{route('update.cart')}}" class="col-md-12" method="post">
                        {{ csrf_field() }}
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Imagem</th>
                                    <th class="product-name">Produto</th>
                                    <th class="product-price">Preço</th>
                                    <th class="product-quantity">Quantidade</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remover</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($produtos as $produto)
                                    @php
                                        $subTotal += (real) $produto->preco * (int) $data->items->{$produto->id};
                                    @endphp
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ Voyager::image($produto->imagem) }}" alt="Image"
                                                 class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">
                                                <a href="{{ route('product.show', $produto->slug) }}">{{ $produto->titulo}}</a>
                                            </h2>
                                        </td>
                                        <td>R$ {{ $produto->precoFormatted }}</td>
                                        <td>
                                            <div class="input-group mb-3" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-primary js-btn-minus" type="button">
                                                        &minus;
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control text-center"
                                                       name="qtdade[{{ $produto->id }}]"
                                                       value="{{ $data->items->{$produto->id} }}"
                                                       placeholder="" aria-label="Example text with button addon"
                                                       aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary js-btn-plus" type="button">
                                                        &plus;
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @php
                                                $totalItem = (real) $produto->preco * (int) $data->items->{$produto->id};
                                            @endphp
                                            R$ {{ number_format($totalItem, 2, ',', '.') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('delete.cart', $produto->id) }}"
                                               class="btn btn-primary btn-sm">X</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-sm-6 mb-3 mb-md-0">
                                <button type="submit" form="form-carrinho" class="btn btn-primary btn-block">
                                    Atualizar carrinho
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-outline-primary btn-block" href="{{ route('home') }}">Continuar
                                    comprando</a>
                            </div>
                        </div>
                        <form action="{{ route('cupom.validar') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <label class="text-black h4" for="coupon">Coupom</label>
                                    <p>Insira o código do cupom de desconto, caso tenha algum.</p>
                                </div>
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <input name="codigo" type="text" required class="form-control py-3" id="coupon"
                                           placeholder="Código do cupom">
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary btn-block">Validar cupom</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="row justify-content-end">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Total da compra</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Subtotal</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">R$ {{ number_format($subTotal, 2, ',', '.') }}</strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Descontos</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        @if (isset($desconto))
                                            @php
                                                $total = (real) $subTotal - ((real) $subTotal * ((real) $desconto / 100));
                                                $desconto = ((real) $subTotal * ((real) $desconto / 100));
                                            @endphp
                                            <strong class="text-black">R$ {{ number_format($desconto, 2, ',', '.') }}</strong>
                                        @else
                                            <strong class="text-black">R$ 0,00</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        @if (isset($desconto))
                                            <strong class="text-black">R$ {{ number_format($total, 2, ',', '.') }}</strong>
                                        @else
                                            <strong class="text-black">R$ {{ number_format($subTotal, 2, ',', '.') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-lg py-3 btn-block"
                                                onclick="window.location='{{ route('cart.finish') }}'">Finalizar compra
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="site-blocks-cover" style="" data-aos="fade">
                <div class="background-image">
                    <img src="{{ asset('images/empty-cart.jpg') }}" alt="Carrinho vazio">
                </div>
                <div class="container">
                    <div class="row align-items-start align-items-md-center justify-content-end">
                        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0 feat-text">
                            <h1 class="mb-2">Oops... Seu carrinho está vazio!</h1>
                            <div class="intro-text text-center text-md-left">
                                {{-- <p class="mb-4">Volte ao</p> --}}
                                <p>
                                    <a href="{{ route('home') }}" class="btn btn-sm btn-primary">Voltar as compras!</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection