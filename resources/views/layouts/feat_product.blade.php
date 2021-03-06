<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Produtos em destaque</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">
                    @foreach ($destaques as $item)
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    @include('layouts.partials.carousel-images', ['imagens' => $item->imagem, 'slug' => $item->slug, 'class' => 'img-fluid-shop img-shop'])
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="{{ route('product.show', $item->slug) }}">{{ $item->titulo }}</a></h3>
                                    <p class="mb-0">{{ $item->descricao }}</p>
                                    <p class="text-primary font-weight-bold">R$ {{ $item->preco }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>