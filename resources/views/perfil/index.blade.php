@extends('layouts.master')

@section('content')
    <div class="site-section border-bottom" data-aos="fade">
        <div class="row">
            <div class="container">
                @includeWhen($errors->any(), 'layouts.errors')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Meus dados</div>
                        <div class="card-body">
                            <form id="form-edit-user" action="{{ route('admin.perfil.update', $user->id) }}"
                                  method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="nome" class="text-black">Nome Completo <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nome" name="nome"
                                               value="{{ isset($user) ? $user->nome : old('nome') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="text-black">E-mail <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{ isset($user) ? $user->email : old('email') }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="c_account_password" class="text-black">Senha </label>
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="">
                                        <p class="text-block">Caso não queira alterar a senha, deixe em branco.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cpf" class="text-black">CPF <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="cpf" name="cpf"
                                               value="{{ isset($user) ? $user->cpf : old('cpf') }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="telefone" class="text-black">Telefone <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="telefone" name="telefone"
                                               value="{{ isset($user) ? $user->telefone : old('telefone') }}"
                                               placeholder="(__) ____-____"
                                               required>
                                    </div>
                                </div>

                                <div class="form-group row mb-5">
                                    <div class="col-md-6">
                                        <label for="cep" class="text-black">CEP <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="cep" name="cep" value="{{ isset($user) ? $user->cep : old('cep') }}" placeholder="Digite o CEP"
                                               required>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{ asset('images/loading.gif') }}" class="img-fluid-loading" id="imgLoading"/>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <label for="news" class="text-black">Receber novidades?</label>
                                        <input id="news" class="form-check" name="news" type="checkbox" data-off-label="Não" data-on-label="Sim" data-on-active-cls="btn-primary"
                                               @if ($user->receber_news or old('news')) checked @endif>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="endereco" class="text-black">Endereço <span
                                                    class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="endereco" name="endereco"
                                               value="{{ isset($user) ? $user->endereco : old('endereco') }}"
                                               placeholder="Endereço (Rua, n, Bairro)" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="numero" class="text-black">Número <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="numero" name="numero"
                                               value="{{ isset($user) ? $user->numero : old('numero') }}"
                                               placeholder="Número">
                                    </div>

                                    <div class="col-md-8">
                                        <label for="complemento" class="text-black">Complemento </label>
                                        <input type="text" class="form-control" id="complemento" name="complemento"
                                               value="{{ isset($user) ? $user->complemento : old('complemento') }}"
                                               placeholder="Complemento (Ex.: Apartamento 301)">
                                    </div>

                                    <div class="col-md-8">
                                        <label for="cidade" class="text-black">Cidade <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="cidade" name="cidade"
                                               value="{{ isset($user) ? $user->cidade : old('cidade') }}" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="estado" class="text-black">Estado <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="estado" name="estado"
                                               value="{{ isset($user) ? $user->estado : old('estado') }}" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" form="form-edit-user" type="submit">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="{{ asset('js/bootstrap-checkbox/bootstrap-checkbox.min.js') }}"></script>
    <script>
        function preencherEndereco(data) {
            $("#imgLoading").fadeOut('2500');
            var resposta = $.parseJSON(data);
            if (!resposta.error) {
                $('#endereco').val(resposta.logradouro + ' - Bairro: ' + resposta.bairro);
                $('#cidade').val(resposta.localidade);
                $('#estado').val(resposta.uf);
                $('#numero').focus();
            } else {
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

        $(document).ready(function () {
            $('#news').checkboxpicker();
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