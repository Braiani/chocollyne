<div id="carousel-{{ $slug }}" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach(json_decode($imagens) as $imagem)
            <div class="carousel-item @if($loop->first) active @endif">
                <img class="{{ $class }}" src="{{ Voyager::image($imagem) }}" alt="First slide">
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carousel-{{ $slug }}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carousel-{{ $slug }}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
</div>