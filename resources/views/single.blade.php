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
				<img src="{{ Voyager::image($produto->imagem) }}" alt="Image" class="img-fluid">
			</div>
			<div class="col-md-6">
				<h2 class="text-black">{{ $produto->titulo }}</h2>
				<p>{{ $produto->descricao }}</p>
				<p><strong>Prazo confecção: </strong>{{ $produto->prazo_confeccao }} dias úteis</p>
				<p><strong>Quantidade pronta entraga: </strong>{{ $produto->estoque }} unidades</p>
				<p><strong class="text-primary h4">R$ {{ $produto->precoFormatted }}</strong></p>
				{{-- <div class="mb-1 d-flex">
					<label for="option-sm" class="d-flex mr-3 mb-3">
						<span class="d-inline-block mr-2" style="top:-2px; position: relative;">
							<input type="radio" id="option-sm" name="shop-sizes"></span>
							<span class="d-inline-block text-black">Small</span>
					</label>
					<label for="option-md" class="d-flex mr-3 mb-3">
						<span class="d-inline-block mr-2" style="top:-2px; position: relative;">
							<input type="radio" id="option-md" name="shop-sizes"></span>
							<span class="d-inline-block text-black">Medium</span>
					</label>
					<label for="option-lg" class="d-flex mr-3 mb-3">
						<span class="d-inline-block mr-2" style="top:-2px; position: relative;">
							<input type="radio" id="option-lg" name="shop-sizes"></span>
							<span class="d-inline-block text-black">Large</span>
					</label>
					<label for="option-xl" class="d-flex mr-3 mb-3">
						<span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black"> Extra Large</span>
					</label>
				</div> --}}
				<form action="{{ route('add.cart', $produto->id) }}" method="post">
					{{ csrf_field() }}
					<div class="mb-5">
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
					<p><button type="submit" class="buy-now btn btn-sm btn-primary">Adicionar ao carrinho</button></p>
				</form>
			</div>
		</div>
	</div>
</div>
{{-- {{ dump($produto) }} --}}
@endsection