@section('template')
    <div>
        <div class="col-sm-4">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="voyager-bag"></i> Pedidos realizados
                        <span class="panel-desc"> Quantidade de pedidos realizadas no site.</span>
                    </h3>
                </div>
                <div class="panel-body">
                    <p>@{{ data.status }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    Vue.component('pedido-chart', {
        props: ['data'],
        template: `@yield('template')`
    });
</script>