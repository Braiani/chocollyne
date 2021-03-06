@extends('layouts.master')

@section ('feature')
    <div class="site-blocks-cover" style="" data-aos="fade">
        <img class="background-image" src="{{ Voyager::image(json_decode($feat->imagem)[0]) }}" alt="">
        <div class="container">
            <div class="row align-items-start align-items-md-center justify-content-end">
                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0 feat-text">
                    <h1 class="mb-2">{{ $feat->titulo }}</h1>
                    <div class="intro-text text-center text-md-left">
                        <p class="mb-4">{{ $feat->descricao }}</p>
                        <p>
                            <a href="{{ route('product.show', $feat->slug) }}" class="btn btn-sm btn-primary">Saiba
                                mais</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="site-section site-section-sm site-blocks-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Frete</h2>
                        <p>{{ setting('info.frete') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Cancelamento de reserva</h2>
                        <p>{{ setting('info.cancelamento') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Dúvidas</h2>
                        <p>{{ setting('info.duvidas') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection