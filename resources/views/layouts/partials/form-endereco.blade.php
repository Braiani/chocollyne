<div class="col-md-6 mb-5 mb-md-0">
	<form id="form-checkout" action="{{ route('cart.checkout') }}" method="post">
		{{ csrf_field() }}
		<h2 class="h3 mb-3 text-black">Informações Pessoais</h2>
		<div class="p-3 p-lg-5 border">
			
		<div class="form-group row">
			<div class="col-md-12">
				<label for="nome" class="text-black">Nome Completo <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
			</div>
		</div>
	
		<div class="form-group row">
			<div class="col-md-12">
				<label for="email" class="text-black">E-mail <span class="text-danger">*</span></label>
				<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
			</div>
		</div>
	
		<div class="form-group row mb-5">
			<div class="col-md-6">
				<label for="cpf" class="text-black">CPF <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}" required>
			</div>
			<div class="col-md-6">
				<label for="telefone" class="text-black">Telefone <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}" placeholder="(__) ____-____" required>
			</div>
		</div>
	
		<div class="form-group row mb-5">
			<div class="col-md-6">
				<label for="cep" class="text-black">CEP <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep') }}" placeholder="Digite o CEP" required>
			</div>
			<div class="col-md-6">
				<img src="{{ asset('images/loading.gif') }}" class="img-fluid-loading" id="imgLoading" />
			</div>
			<div class="col-md-12">
				<label for="endereco" class="text-black">Endereço <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}" placeholder="Endereço (Rua, n, Bairro)" required>
			</div>

			<div class="col-md-4">
				<label for="numero" class="text-black">Número <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero') }}" placeholder="Número">
			</div>
			
			<div class="col-md-8">
				<label for="complemento" class="text-black">Complemento </label>
				<input type="text" class="form-control" id="complemento" name="complemento" value="{{ old('complemento') }}" placeholder="Complemento (Ex.: Apartamento 301)">
			</div>
	
			<div class="col-md-8">
				<label for="cidade" class="text-black">Cidade <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade') }}" required>
			</div>

			<div class="col-md-4">
				<label for="estado" class="text-black">Estado <span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado') }}" required>
			</div>
		</div>

		<div class="form-group row mb-5">
			<div class="col-md-12">
				<p class="mb-3">Crie uma conta preenchendo a informação abaixo. Já possui uma conta? <a href="{{ route('login') }}">Clique aqui</a> para fazer Login.</p>
				<label for="c_account_password" class="text-black">Defina uma Senha <span class="text-danger">*</span></label>
				<input type="password" class="form-control" id="password" name="password" placeholder="" required>
			</div>
		</div>
	
		<div class="form-group">
			<label for="observacao" class="text-black">Pedidos Especiais</label>
			<textarea name="observacao" id="observacao" cols="30" rows="5" class="form-control" placeholder="Escreva aqui seus pedidos especiais...">{{ old('nome') }}</textarea>
		</div>
	</form>
</div>

@push('js')
<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
	function preencherEndereco(data){
		$("#imgLoading").fadeOut('2500');
		var resposta = $.parseJSON(data);
		if (! resposta.error) {
			$('#endereco').val(resposta.logradouro + ' - Bairro: ' + resposta.bairro);
			$('#cidade').val(resposta.localidade);
			$('#estado').val(resposta.uf);
			$('#numero').focus();
		}else{
			$('#endereco').val('');
			$('#cidade').val('');
			$('#estado').val('');
			$('#endereco').focus();
			alert('Endereço não encontrado! Verifique o CEP digitado!');
		}
	}
	function colocarLoading() {
		$("#imgLoading").fadeIn();
	}
	$(document).ready(function(){
		$("#cpf").inputmask("999.999.999-99");
		$("#cep").inputmask("99999-999");
		$("#telefone").inputmask({
			mask: ["(99) 9999-9999", "(99) 99999-9999"]
		});
		$("#cep").on('blur', function () {
			$.ajax({
				url: '{{ route('api.cep', '__id')}}'.replace('__id', $(this).val()),
				method: 'GET',
				beforeSend: colocarLoading,
				success: preencherEndereco
			});
		});
	});
</script>
@endpush