@if (session('desconto.validacao'))
<div class="container">
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="border p-4 rounded alert-success" role="alert">
				O cupom com código <strong>{{ session('desconto.codigo') }}</strong> foi validado com sucesso!
				Você acaba de ganhar <strong>{{ session('desconto.desconto') }}%</strong> de desconto!
			</div>
		</div>
	</div>
</div>
@else
{{ session()->forget('desconto') }}
<div class="container">
	<div class="row mb-5">
		<div class="col-md-12">
			<div class="border p-4 rounded alert-warning" role="alert">
				O cupom digitado não está válido ou não existe!
				Verifique o código e a validade e tente novamente.!
			</div>
		</div>
	</div>
</div>
@endif