<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Cadastro Produto</title>
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
                        <h5 class="card-title">Cadastro de Produto</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produto.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="nome">Nome do Produto</label>
                                <input type="text" class="form-control" name="nome" id="nome"
                                    placeholder="Nome do Produto">
                            </div>
                            <div class="form-group">
                                <label for="preco">Preço</label>
                                <input type="number" class="form-control" name="preco" id="preco"
                                    placeholder="Preço do produto">
                            </div>

                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" name="descricao" id="descricao"
                                    placeholder="Descrição do produto">
                            </div>

                            <label for="arquivo">Imagem da pizza</label>
                            <div class="custom-file">

                                <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
                                <label class="custom-file-label" for="arquivo">Escolha um arquivo de imagem</label>
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
                                <a href="{{ route('produto.index') }}">
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
