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

                    <table class="table table-bordered">
						<thead>
							<tr>
								<th class="">N. Pedido</th>
								<th class="">Produtos</th>
								<th class="">Subtotal</th>
								<th class="">Desconto</th>
								<th class="">Total</th>
								<th class="">status</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($pedidos as $pedido)
							<tr>
								<td>#{{ $pedido->id}}</td>
								<td>
									<ul>
									@foreach ($pedido->produtos as $produto)
										<li>{{ $produto->titulo }}</li>
									@endforeach
									</ul>
								</td>
								<td>R$ {{ $pedido->subtotal }}</td>
								<td>{{ $pedido->desconto->desconto }}%</td>
								<td>{{ $pedido->total }}</td>
								<td> - Indefinido - </td>
							</tr>
						@endforeach
						</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush