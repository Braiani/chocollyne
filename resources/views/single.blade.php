@extends('layouts.master')

@section('content')
    <div class="site-section">
        @if ($errors->any())
            <div class="row">
                <div class="container">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @include('layouts.partials.carousel-images', ['imagens' => $produto->imagem, 'slug' => $produto->slug, 'class' => 'img-fluid '])
                </div>
                <div class="col-md-6">
                    <h2 class="text-black">{{ $produto->titulo }}</h2>
                    <p>{{ $produto->descricao }}</p>
                    <p>
                        <strong>Sabores: </strong>
                        @foreach($produto->sabores as $sabor)
                            @if($loop->last)
                                {{ $sabor->name }}
                            @else
                                {{ $sabor->name }},
                            @endif
                        @endforeach
                    </p>
                    <p><strong>Prazo confecção: </strong>{{ $produto->prazo_confeccao }} dias úteis</p>
                    <p><strong>Quantidade pronta entraga: </strong>{{ $produto->estoque }} unidades</p>
                    <p><strong class="text-primary h4">R$ {{ $produto->precoFormatted }}</strong></p>
                    <form action="{{ route('add.cart', $produto->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-5">
                            <div class="form-group mb-3">
                                <select class="form-control custom-select" name="flavor" id="flavor">
                                    @foreach($produto->sabores as $sabor)
                                        <option value="{{ $sabor->id }}">{{ $sabor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3" style="max-width: 120px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                </div>
                                <input type="text" name="qtdade" class="form-control text-center" value="1"
                                       placeholder="" aria-label="Quantidade de {{ $produto->titulo }}"
                                       aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                </div>
                            </div>
                        </div>
                        <p>
                            <button type="submit" class="buy-now btn btn-sm btn-primary">Adicionar ao carrinho</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dump($produto) }} --}}
@endsection