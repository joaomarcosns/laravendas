@extends('layout.Indexlayout')

@section('title', 'Vendas')
@section('h3', 'Listagem de Vendas')

@section('conteudo')
    <div class="d-flex flex-row bd-highlight mb-3" style="margin-right: 500px;">
        <a href="{{ route('site.realizar-venda') }}" class="btn btn-success m-3"><i class="fa fa-plus"></i> Cadastrar um Venda</a>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>
                <th scope="col">Valor total</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
                <tr class="text-center">
                    <th scope="row">{{ $venda->id }}</th>
                    <td>{{ $venda->nome_cliente }}</td>
                    <td>{{ date('d/m/Y', strtotime($venda->data)) }}</td>
                    <td>{{ date('H:i', strtotime($venda->data)) }}</td>
                    <td>R$ {{ number_format($venda->valor_total, 2, ',', '') }}</td>
                    <td>
                        <a href="{{ route('site.visualizar-venda', $venda->id) }}" class="btn btn-primary btn-sm"
                            title="Visualizar">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('site.atualizar-venda', $venda->id) }}" class="btn btn-secondary btn-sm"
                            title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                        <button class="btn btn-danger btn-sm"
                            onclick="deleteItem('{{ route('site.delete-venda', $venda->id) }}')" title="Deletar">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
@endsection
