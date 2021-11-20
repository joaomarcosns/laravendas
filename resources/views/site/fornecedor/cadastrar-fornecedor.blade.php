<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="container" class="p-4">
        <h3>Cadastrar Fornecedor</h3>
        <div class="links d-flex">
            <a href="{{ route('index') }}" class="link-primary m-3">Voltar ao Home</a>
            <a href="{{ route('site.produtos') }}" class="link-primary m-3">Ver Fornecedor</a>
        </div>
        <form action="{{ route('site.cadastrar.fornecedor') }}" method="post">
            @csrf
            <div class="input-nome m-1">
                <label for="nome">Nome do Fornecedor:</label>
                <input class="form-control @error('nome') is-invalid @enderror" type="text" name="nome">
                @error('nome')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-valor m-1">
                <label for="text">Cnpj:</label>
                <input class="form-control @error('cnpj') is-invalid @enderror" type="text" name="cnpj">
                @error('cnpj')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-valor m-1">
                <label for="text">Telefone:</label>
                <input class="form-control @error('categoria') is-invalid @enderror" type="text" name="telefone">
                @error('telefone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="btn-sub m-1">
                <button class="btn btn-success mt-2 mb-2 w-100" type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
    @isset($mensagem)
        <div class="toast text-white bg-success border-0 m-5" id="toast" style="display: block; position: absolute;">
            <div class="d-flex justify-content-center">
                <div class="toast-body d-flex align-items-center" style="font-size: 15px;">
                    <p class="m-1">{{ $mensagem }}</p>
                    <i class="far fa-check-circle"></i>
                </div>
            </div>
        </div>
    @endisset
</body>

<script src="{{ url('js/toast.js') }}"></script>

</html>