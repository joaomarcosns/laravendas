<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="container" class="p-4">
        <h3>Atualizar Cliente</h3>
        <div class="links d-flex">
            <a href="{{ route('index') }}" class="link-primary m-3">Voltar ao Home</a>
            <a href="{{ route('site.clientes') }}" class="link-primary m-3">Ver Clientes</a>
        </div>
        <form action="{{ route('site.editar-cliente', $cliente->id) }}"  method="POST">
            @csrf
            <div class="input-nome m-1">
                <label for="nome">Nome:</label>
                <input class="form-control" type="text" value="{{ $cliente->nome }}" name="nome" required>
            </div>
            <div class="input-tel m-1">
                <label for="telefone">Telefone:</label>
                <input class="form-control" type="number" value="{{ $cliente->telefone }}" name="telefone" required>
            </div>
            <div class="input-endereco m-1">
                <label for="endereco">Endereco:</label>
                <input class="form-control" type="text" value="{{ $cliente->endereco }}" name="endereco" required>
            </div>
            <div class="btn-sub m-1">
                <button class="btn btn-success mt-2 w-100" type="submit">Atualizar</button>
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