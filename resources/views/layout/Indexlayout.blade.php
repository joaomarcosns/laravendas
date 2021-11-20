<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="table-area" class="p-4">
        <h3>@yield('h3')</h3>
        <div class="links d-flex">
            <a class="btn btn-primary m-1" href="{{ route('index') }}">Voltar ao Home</a>
            <a class="btn btn-success m-1" href="{{ route('site.produtos') }}">Produtos</a>
            <a class="btn btn-info m-1" href="{{ route('site.clientes') }}">Clientes</a>
            <a class="btn btn-secondary m-1" href="{{ route('site.vendas') }}">Vendas</a>
            <a class="btn btn-secondary m-1" href="{{ route('site.fornecedor') }}">Fornecedores</a>

        </div>
        @yield('conteudo')
</body>

<script src="{{ url('js/toast.js') }}"></script>
<script src="{{ url('js/delete.js') }}"></script>

</html>
