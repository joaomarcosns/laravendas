<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Venda</title>
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="table-area" class="p-4">
        <h3>Visualizar Venda</h3>
        <div class="links d-flex">
            <a href="{{ route('index') }}" class="link-primary m-3">Voltar ao Home</a>
            <a href="{{ route('site.vendas') }}" class="link-success m-3">Retornar a Vendas</a>
        </div>
        <div class="valor-total-compra">
            <p>Nome do cliente: <b>{{ $venda[0]->nome_cliente }}</b></p>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Valor Unidade</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor Total</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($venda); $i++)
                    <tr class="text-center">
                        <th scope="col">{{ $i+1 }}</th>
                        <td>{{ $venda[$i]->nome_produto }}</td>
                        <td>R$ {{ number_format($venda[$i]->valor_produto, 2, ',', '')  }}</td>
                        <td>{{ $venda[$i]->quantidade }}</td>
                        <td>R$ {{ number_format($venda[$i]->valor_produto * $venda[$i]->quantidade, 2, ',', '') }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <div class="valor-total-compra">
            <p>Valor total da compra:</p>
            <p><b>R$ {{ number_format($venda[0]->valor_total, 2, ',', '') }}</b></p> 
        </div>
    </div>
</body>

</html>