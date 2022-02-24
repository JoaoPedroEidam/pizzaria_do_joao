<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Pedido em Preparo</title>
    <style>
        body {
            padding: 20px;
        }

    </style>
</head>

<body>
    <br>
    <main role="main">
        <div class="row ">
            <form action="{{ route('pedido.index') }}" method="GET">
                @csrf
                <div class="col-12">
                    <div>
                        <label for="texto">{{ $mensagem }}</label>
                    </div>
                    
                    <button type="submit" class="btn btn-outline-secondary">Voltar</button>
                </div>
                
            </form>
        </div>
        </div>


    </main>



    <script src="{{ asset('js/app.js') }}" type="text/javascript"> </script>
</body>

</html>
