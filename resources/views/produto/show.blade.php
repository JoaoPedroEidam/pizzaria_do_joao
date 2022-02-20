<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Informações Produto</title>
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
<br>
    <main role="main">
                <div class="row ">
                        <div class="container align-self-center ">
                            <div class="card" style="width: 40rem;">
                                <img class="card-img-top figure-img img-fluid rounded"
                                    src="/storage/{{ $produto->arquivo }}">
                                <div class="card-body">
                                    <p class="card-text">Nome: {{ $produto->nome }}</p>
                                    <p class="card-text">Preço: {{ $produto->preco }} reais</p>
                                    <p class="card-text">Descrição: {{ $produto->descricao }}</p>
                                    <p class="card-text">Likes: {{ $produto->like }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('produto.index') }}">
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
