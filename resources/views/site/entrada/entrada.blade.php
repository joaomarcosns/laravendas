@extends('layout.Indexlayout')

@section('title', 'Listagem de Compas')
@section('h3', 'Listagem de Compas')

@section('conteudo')
    <div class="d-flex flex-row bd-highlight mb-3" style="margin-right: 500px;">
        <a href="{{ route('site.entrada.create') }}" class="btn btn-success m-3"><i class="fa fa-plus"></i> Cadastrar um Compra</a>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Data</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entradas as $entrada)
                <tr class="text-center">
                    <td>{{ $entrada->id }}</td>
                    <td>{{ $entrada->fornecedor }}</td>
                    <td>{{ date('d/m/Y', strtotime($entrada->created_at)) }}</td>
                    <td>{{ $entrada->valor_total }}</td>
                    <td>
                        <a href="#" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
