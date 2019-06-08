@extends('voyager::bread.browse')

@section('css')
    @parent
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css">
@endsection

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover"
                                    data-toggle="table"
                                    data-url="{{ route('voyager.pedidos.table') }}"
                                    data-pagination="true"
                                    data-side-pagination="server"
                                    data-method="post"
                                    data-locale="pt-BR"
                                    data-search="true">
                                <thead>
                                <tr>
                                    <th data-field="id" data-align="center" data-formatter="#%s">Pedido nº</th>
                                    <th data-field="cliente.nome">Cliente</th>
                                    <th data-field="produtos" data-formatter="produtosFormatter">Produtos</th>
                                    <th data-field="subtotal" data-align="center" data-formatter="R$ %s">Subtotal</th>
                                    <th data-field="desconto.desconto" data-align="center" data-formatter="descontoFormatter">Desconto</th>
                                    <th data-field="total" data-align="center" data-formatter="R$ %s">Total</th>
                                    <th data-field="status" data-align="center">Situação</th>
                                    <th data-field="observacao" data-align="center">Observação</th>
                                    <th data-field="id" data-formatter="acaoFormatter">Editar</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table-locale-all.min.js"></script>
    <script>
        function descontoFormatter(value) {
            if (value == null) {
                return 'Sem desconto';
            }else {
                return value + '%';
            }
        }
        function acaoFormatter(value, row) {
            var editar = "{{ route('voyager.pedidos.edit', '_id') }}".replace('_id', value);
            var visualizar = "{{ route('voyager.pedidos.show', '_id') }}".replace('_id', value);
            return [
                "<a href=" + editar +" class='btn btn-sm btn-primary edit'>" +
                    "<i class='voyager-edit'></i> <span class='hidden-xs hidden-sm'>Editar</span>" +
                "</a>" +
                "<a href=" + visualizar +" class='btn btn-sm btn-warning view'>" +
                    "<i class='voyager-eye'></i> <span class='hidden-xs hidden-sm'>Visualizar</span>" +
                "</a>"
                ].join('');
        }
        function produtosFormatter(value) {
            var retorno = '';

            $.each(value, function (index, valor) {
                $.each(valor.sabores, function (i, sabor) {
                    if (sabor.id == valor.pivot.flavor_id) {
                        retorno += "<p>Produto: " + valor.titulo + "; Sabor: " + sabor.name + "; Quantidade: " + valor.pivot.quantidade + "</p>";
                    }
                });
            });

            return retorno;
        }
    </script>
@endpush