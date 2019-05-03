@component('mail::message')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ setting('site.title') }}
        @endcomponent
    @endslot

    {{-- Body --}}
# Olá {{ $cliente->nome }}

Conheça nossa novidade:

![Produto novo]({{ Voyager::image($produto->imagem) }})
@component('mail::table')
|Produto                | Preço                             | Sabor                 |
|:---------------------:|:---------------------------------:|:---------------------:|
|{{ $produto->titulo }} | R$ {{ $produto->precoFormatted }} | {{ $produto->sabor }} |
@endcomponent

@component('mail::button', ['url' => route('product.show', $produto->slug), 'color' => 'blue'])
Visualizar produto
@endcomponent

    {{-- Subcopy --}}
    @slot('subcopy')
        @component('mail::subcopy')
            Se não deseja mais receber essas notificações, atualize as configurações do seu perfil ou acesse esse link: {{ route('descadastrar.email', [$cliente->id, 'email'
            => $cliente->email]) }}
        @endcomponent
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ setting('site.title') }}.! @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent