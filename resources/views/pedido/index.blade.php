<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Pedido</title>
    <style>
        body {
            padding: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        :root {
            --jumbotron-padding-y: 10px;
        }

        .jumbotron {
            padding-top: var(--jumbotron-padding-y);
            padding-bottom: var(--jumbotron-padding-y);
            margin-bottom: 0;
            background-color: #fff;
        }

        @media (min-width: 768px) {
            .jumbotron {
                padding-top: calc(var(--jumbotron-padding-y) * 2);
                padding-bottom: calc(var(--jumbotron-padding-y) * 2);
            }
        }

        .jumbotron p:last-child {
            margin-bottom: 0;
        }

        .jumbotron-heading {
            font-weight: 300;
        }

        .jumbotron .container {
            max-width: 40rem;
        }

        .btn-card {
            margin: 4px;
        }

        .btn {
            margin-right: 5px;
        }

        footer {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        footer p {
            margin-bottom: .25rem;
        }

    </style>
</head>

<body>

    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>Menu de Pizzas</strong>
            </a>
        </div>
    </header>

    <main role="main">

        {{-- <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Realise o pedido</h1>
                <form method="POST" action="/" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-left">
                        <label for="mensagem">Sua mensagem</label>
                        <textarea class="form-control" id="mensagem" name="mensagem" rows="3"></textarea>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
                        <label class="custom-file-label" for="arquivo">Escolha um arquivo</label>
                    </div>
                    <p>
                        <button type="submit" class="btn btn-primary my-2">Enviar</button>
                        <button type="reset" class="btn btn-secondary my-2">Cancelar</button>
                    </p>
                </form>
            </div>
        </section> --}}

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach ($produtos as $produto)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top figure-img img-fluid rounded"
                                    src="/storage/{{ $produto->arquivo }}">
                                <div class="card-body">
                                    <p class="card-text">Nome: {{ $produto->nome }}</p>
                                    <p class="card-text">Pre??o: {{ $produto->preco }} reais</p>
                                    <p class="card-text">Descri????o: {{ $produto->descricao }}</p>
                                    <p class="card-text">Likes: {{ $produto->like }}</p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <!--button type="button" class="btn btn-sm btn-outline-secondary">Download</button-->
                                            <a href="{{ route('pedido.show', $produto->id) }}">
                                                <button class="btn btn-outline-info btn-sm"
                                                    title="Informa????es de: {{ $produto->nome }}"><i>Informa????es</i></button>
                                            </a>
                                            {{-- <form action="{{ route('pedido.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="bbtn btn-outline-primary"title="Pedir somente uma: {{ $produto->nome }}"><i>Pedir uma</i></button>
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Voltar para cima</a>
            </p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
