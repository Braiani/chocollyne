@extends('layouts.master')

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="icon-check_circle display-3 text-success"></span>
                    <h2 class="display-3 text-black">Obrigado!</h2>
                    <p class="lead mb-5">Seu e-mail foi descadastrado com sucesso.</p>
                    <p class="lead mb-5">Você não receberá mais e-mails com nossas novidades/atualizações.</p>
                    <p>
                        <a href="{{ route('home') }}" class="btn btn-sm btn-primary">Voltar para o início</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection