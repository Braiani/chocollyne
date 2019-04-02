@extends('voyager::master')

@section('content')
    <div class="page-content container-fluid">
        <div id="app">
            <pedido-chart v-bind:data="teste"></pedido-chart>
            <pedido-chart v-bind:data="teste"></pedido-chart>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/app.js') }}"></script>
    @include('layouts.partials.pedidos-chart')
    <script>
        $(document).ready(function () {
            new Vue({
                el: '#app',
                data() {
                    return {
                        teste: null
                    }
                },
                mounted() {
                    url = "{{ route('api.pedidos') }}";
                    axios.get(url).then((resposta) => {
                        this.teste = resposta.data;
                    })
                }
            });
        });
    </script>
@endsection