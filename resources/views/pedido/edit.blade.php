<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Pedido Realizado</title>
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
                        <h5 class="card-title">Editar pedido realizado</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pedido.update', $pedido['id']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="nome">Nome do Produto: {{ $produto->nome }}</label>
                            </div>
                            <div class="form-group">
                                <label for="preco">Preço total do pedido: {{ $produto->preco * $pedido->quantidade}}</label>
                            </div>
                            <div class="form-group">
                                <label for="Quantidade">Quantidade de produtos: {{$pedido->quantidade}}</label>
                            </div>

                            <div class="form-group">
                                <label for="descricao">Descrição: {{ $produto->descricao }}</label>
                            </div>

                            <div class="form-group">
                                <label for="preparp">Preparo</label>
                                <select name="preparo" class="form-control" style="width: 100%;">
                                    <option value="Aguardando">Aguardando</option>
                                    <option value="Preparando">Preparando</option>
                                    <option value="Pronto">Pronto</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" style="width: 100%;">
                                    <option value="Aquardando Pagamento">Aquardando Pagamento</option>
                                    <option value="Pago">Pago</option>
                                </select>
                            </div>

                            <br>
                            <br>
                            <p>
                            <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                                <div class="float-right">
                                    <div class="col">
                                        <button type="submit" class="btn btn-outline-primary">Salvar</button>
                                    </div>
                                </div>
                                <a href="{{ route('pedido.controle') }}">
                                    <button type="button" class="btn btn-outline-danger">Cancelar</button>
                                </a>
                            </div>
                            </p>
                        </form>
                    </div>

                    @if ($errors->any())
                        <div class="card-footer">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
