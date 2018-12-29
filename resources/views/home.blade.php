@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Meus pedidos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
						<table class="table table-nowrap table-bordered card-table">
							<thead class="table-success">
								<tr>
									<th class="">N. Pedido</th>
									<th class="">Produtos</th>
									<th class="">Subtotal</th>
									<th class="">Desconto</th>
									<th class="">Total</th>
									<th class="">status</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($pedidos as $pedido)
								<tr>
									<td>#{{ $pedido->id}}</td>
									<td>
										<ul>
										@foreach ($pedido->produtos as $produto)
											<li>{{ $produto->titulo }} x {{ $produto->pivot->quantidade }}</li>
										@endforeach
										</ul>
									</td>
									<td>R$ {{ $pedido->subtotal }}</td>
									<td>{{ $pedido->desconto->desconto }}%</td>
									<td>R$ {{ $pedido->total }}</td>
									<td> - Indefinido - </td>
									<td>
										<a href="#" class="btn btn-primary"><span class="icon icon-eye"></span></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
@endpush