@extends('layouts.master')

@section('content')
<div class="site-section border-bottom" data-aos="fade">
    <div class="row">
		<div class="container">
			<div class="col-12">
				<div class="card align-content-center">
					<div class="card-header">Meus pedidos</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-responsive table-hover table-bordered">
								<thead class="table-success">
									<tr class="text-center">
										<th>N. Pedido</th>
										<th>Produtos</th>
										<th>Subtotal</th>
										<th>Desconto</th>
										<th>Total</th>
										<th>Data do pedido</th>
										<th>Status</th>
										<th>Atualização Status</th>
									</tr>
								</thead>
								<tbody>
								@foreach ($pedidos as $pedido)
									<tr>
										<td>#{{ $pedido->id}}</td>
										<td class="text-center">
										@foreach ($pedido->produtos as $produto)
											<p>
												<span class="icon icon-check-circle-o text-success"></span> {{ $produto->titulo }}
												( Sabor: {{ $produto->sabores->find($produto->pivot->flavor_id)->name }}) x {{ $produto->pivot->quantidade }}
											</p>
										@endforeach
										</td>
										<td>R$ {{ $pedido->subtotal }}</td>
										<td class="text-center">{{ $pedido->desconto != null ? $pedido->desconto->desconto . '%' : 'Sem desconto' }}</td>
										<td class="text-center">R$ {{ $pedido->total }}</td>
										<td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
										<td>{{ $pedido->status }}</td>
										<td>{{ $pedido->updated_at->format('d/m/Y H:i') }}</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						{{ $pedidos->links() }}
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection
@push('css')
	<style>
		td {
			vertical-align: middle !important;
		}
	</style>
@endpush