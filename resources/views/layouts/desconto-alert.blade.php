@if (session('desconto.validacao'))
<div class="row">
    <div class="container">
        <div class="alert alert-success">
            <ul>
                <li>
                    O cupom com código <strong>{{ session('desconto.codigo') }}</strong> foi validado com sucesso!
                    Você acaba de ganhar <strong>{{ session('desconto.desconto') }}%</strong> de desconto!
                </li>
            </ul>
        </div>
    </div>
</div>
@else
{{ session()->forget('desconto') }}
<div class="row">
    <div class="container">
        <div class="alert alert-warning">
            <ul>
                <li>
                    O cupom digitado não está válido ou não existe!
                    Verifique o código e a validade e tente novamente.!
                </li>
            </ul>
        </div>
    </div>
</div>
@endif