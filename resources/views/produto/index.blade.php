<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Pagina de Produtos</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            padding: 20px;
        }

    </style>
</head>

<body>

    <main role="main">
        <div class="row">
            <div class="container  col-sm-8 offset-md-2">

                <div class="card border">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-5">
                                <a href="{{ route('produto.create') }}">
                                    <button title="Cadastrar um novo produto" type="button"
                                        class="btn btn-primary">Cadastrar</button>
                                </a>
                            </div>
                            <h5 class="card-title">Cadastro de Produto</h5>
                        </div>

                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-hover" id="tabelaprodutos">
                            <thead>
                                <tr >
                                    <th>Nome</th>
                                    <th class="text-right">Preço</th>
                                    <th class="text-right">Like</th>
                                    <th width="120">#</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($produto as $p)
                                    <tr>
                                        <td>{{ $p->nome }}</td>
                                        <td class="text-right">{{ $p->preco }}</td>
                                        <td class="text-right">{{ $p->like }}</td>
                                        <th class="text-right">
                                            <div class="row">
                                                <div class="col-1 col-sm-2">
                                                    <a href="{{ route('produto.show', $p->id) }}">
                                                        <button class="btn btn-info btn-sm"
                                                            title="Informações de: {{ $p->nome }}"><i>I</i></button>
                                                    </a>
                                                </div>
                                                <div class="col-2 ">
                                                    <a href="{{ route('produto.edit', $p->id) }}">
                                                        <button class="btn btn-warning btn-sm"
                                                            title="Editar cadastro de: {{ $p->nome }}"><i>E</i></button>
                                                    </a>
                                                </div>
                                                <div class="col-1">
                                                <form id="comboForm" action="{{ route('produto.destroy', $p->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm" title="Deletar cadastro de: {{ $p->nome }}"><i>D</i></button>
                                                </form>
                                                </div>
                                            </div>

                                        </th>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="btn-group">
                                <a href="{{ route('pedido.controle') }}">
                                    <button type="button" class="btn btn-outline-secondary">Voltar</button>
                                </a>
                            </div>
                        </div>
                    </div>
                   
                </div>
               

            </div>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</body>

</html>
