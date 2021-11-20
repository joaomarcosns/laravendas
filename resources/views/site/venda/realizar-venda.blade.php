<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Venda</title>
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="table-area" class="p-4">
        <h3>Realizar Venda</h3>
        <div class="links d-flex">
            <a href="{{ route('index') }}" class="link-primary m-3">Voltar ao Home</a>
            <a href="{{ route('site.vendas') }}" class="link-success m-3">Ver Vendas</a>
            <a href="#" id="limpar-venda" class="link-danger m-3">Limpar venda</a>
        </div>
        <form action="{{ route('site.realizar-venda') }}" id="form" method="POST">
            @csrf
            <div class="top-area">
                <div class="select-cliente">
                    <label for="cliente">Selecione o Cliente</label>
                    <select class="form-control @error('cliente') is-invalid @enderror" name="cliente">
                        <option value="" disabled selected>Selecione</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                        @error('cliente')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </select>
                </div>
    
                <button type="button" id="add-produto-btn" class="btn btn-primary btn-sm mt-4">
                    <i class="fas fa-plus"></i>
                    Produto
                </button>
            </div>

            <div id="produto-quantidade">
                <div class="input-produto-quantidade mt-3" id="produto-area">
                    <div class="input-produto">
                        <label for="newProdutoArea">Selecione o Produto</label>
                        <select class="form-control @error('produto') is-invalid @enderror" onchange="setValor(this); setValorTotal()" name="produto[]">
                            <option value="" disabled selected>Selecione</option>
                            @foreach ($produtos as $produto)
                                <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                            @endforeach
                        </select>
                        @error('produto')
                            <div class="text-danger">{{ $message  }}</div>
                        @enderror
                    </div>
        
                    <div class="input-quantidade">
                        <label for="quantidade">Quantidade</label>
                        <input class="form-control quantidade @error('quantidade') is-invalid @enderror" oninput="setValorTotal()" type="number" min="1" name="quantidade[]" value="1">
                        @error('quantidade')
                            <div class="text-danger">{{ $message  }}</div>
                        @enderror
                    </div>
    
                    <div class="input-valor-unid">
                        <label for="valor-unid">Valor Unid. <small>(R$)</small></label>
                        <input class="form-control" type="hidden" id="valor-produto" name="valor-unit[]">
                        <input class="form-control valor-unit" type="text" id="valor-unit" value="0" disabled>
                    </div>
    
                    <button type="button" onclick="removeRow(this)" class="btn btn-danger btn-sm mt-4">
                        <i class="fas fa-minus-circle"></i>
                    </button>
                </div>
            </div>

            <div class="submit-total mt-4 mb-4">
                <div class="input-valor-total mt-1">
                    <label for="valor-total">Valor total</label>
                    <input type="text" class="form-control" id="valor-total" name="valor-total" value="R$ 0.00" disabled>
                </div>
    
                <button type="submit" id="btn-submit" class="btn btn-success btn-sm mt-4">Confirmar venda</button>
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

<script src="{{ url('js/venda.js') }}"></script>
<script src="{{ url('js/toast.js') }}"></script>
<script type="text/javascript">

    const produtos = [];

    <?php 
        foreach($produtos as $produto) { ?>
            produtos["<?= $produto['id']?>"] = {
                id : "<?= $produto['id']?>",
                nome : "<?= $produto['nome']?>",
                valor : "<?= $produto['valor']?>",
            }; <?php
        }
    ?>
    
    function setValor(row) {
        const idProduto = row.value;
        const div = row.parentNode.parentNode;
        const inputDisabled = div.querySelector("#valor-unit");
        const inputHidden = div.querySelector("#valor-produto");

        inputDisabled.value = produtos[idProduto].valor;
        inputHidden.value = produtos[idProduto].valor;
    }

</script>

</html>