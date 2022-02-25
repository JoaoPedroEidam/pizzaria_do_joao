<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Pagina de Produtos</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

    </style>
</head>

<body>

    <main role="main">
        <div class="row">
            <div class="container">

                <div class="card border">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-5">
                                <a href="{{ route('produto.index') }}">
                                    <button title="Visualizar produtos cadasrados" type="button"
                                        class="btn btn-primary">Produtos</button>
                                </a>
                            </div>
                            <div class="col-6">
                                <h5 class="card-title">Pedidos Realizados</h5>
                            </div>
                            <div class="col-1">
                                <form id="comboForm" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        title="Sair, voltar a tela de login"><i>Sair</i></button>
                                </form>
                            </div>

                        </div>

                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-hover" id="tabelaprodutos">
                            <thead>
                                <tr>
                                    <th class="text-right">Nº Pedido</th>
                                    <th class="text-right">Quantidade</th>
                                    <th class="text-right">Horário</th>
                                    <th>Status</th>
                                    <th>Preparo</th>
                                    <th width="120">#</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pedidos as $p)
                                    <tr>
                                        <td class="text-right">{{ $p->numero_pedido }}</td>
                                        <td class="text-right">{{ $p->quantidade }}</td>
                                        <td class="text-right">{{ $p->realizacao_pedido }}</td>
                                        <td>{{ $p->status }}</td>
                                        <td>{{ $p->preparo }}</td>
                                        <th class="text-right">
                                            <div class="row">
                                                <div class="col-1 col-sm-2">
                                                    <a href="{{ route('pedido.edit', $p->id) }}">
                                                        <button class="btn btn-info btn-sm"
                                                            title="Informações de: {{ $p->nome }}"><i>Abrir</i></button>
                                                    </a>
                                                </div>
                                                {{-- <div class="col-2 ">
                                                    <a href="{{ route('produto.edit', $p->id) }}">
                                                        <button class="btn btn-warning btn-sm"
                                                            title="Editar cadastro de: {{ $p->nome }}"><i>E</i></button>
                                                    </a>
                                                </div>
                                                <div class="col-1">
                                                    <form id="comboForm"
                                                        action="{{ route('produto.destroy', $p->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Deletar cadastro de: {{ $p->nome }}"><i>D</i></button>
                                                    </form>
                                                </div> --}}
                                            </div>

                                        </th>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                    </div>

                </div>


            </div>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</body>

</html>
