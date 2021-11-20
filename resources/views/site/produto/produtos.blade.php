@extends('layout.Indexlayout')

@section('title', 'Produtos')
@section('h3', 'Listagem de Produtos')

@section('conteudo')
<div class="d-flex flex-row bd-highlight mb-3" style="margin-right: 500px;">
    <a href="{{ route('site.cadastrar-produto') }}" class="btn btn-success m-3"><i class="fa fa-plus"></i> Cadastrar um Produto</a>
</div>
<table class="table table-hover">
    <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor <small>(R$)</small></th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
            <tr class="text-center">
                <th scope="row">{{ $produto->id }}</th>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->quantidade }}</td>
                <td>R$ {{ number_format($produto->valor, 2, ',', '') }}</td>
                <td>
                    <a href="{{ route('site.editar-produto', $produto->id) }}" class="btn btn-secondary btn-sm"
                        title="Editar">
                        <i class="far fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm"
                        onclick="deleteItem('{{ route('site.delete-produto', $produto->id) }}')" title="Deletar">
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
