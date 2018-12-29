@extends('layouts.master')

@section('content')
<div class="site-section border-bottom" data-aos="fade">
    <div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">Meus pedidos</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-responsive table-hover table-bordered">
								<thead class="table-success">
									<tr>
										<th class="">N. Pedido</th>
										<th class="text-center">Produtos</th>
										<th class="">Subtotal</th>
										<th class="text-center">Desconto</th>
										<th class="">Total</th>
										<th>Data do pedido</th>
										<th class="text-center">Status</th>
										<th>Atualização Status</th>
									</tr>
								</thead>
								<tbody>
								@foreach ($pedidos as $pedido)
									<tr>
										<td>#{{ $pedido->id}}</td>
										<td>
										@foreach ($pedido->produtos as $produto)
											<span class="icon icon-check-circle-o text-success"></span> {{ $produto->titulo }} x {{ $produto->pivot->quantidade }}
											@if (!$loop->last)
												<br />
											@endif
										@endforeach
										</td>
										<td>R$ {{ $pedido->subtotal }}</td>
										<td>{{ $pedido->desconto != null ? $pedido->desconto->desconto . '%' : 'Sem desconto' }}</td>
										<td>R$ {{ $pedido->total }}</td>
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
@endpush