<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Fornecedor;
use App\Models\ItemEntrada;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrada = DB::table('entrada')
            ->join('fornecedor', 'entrada.id_fornecedor', '=', 'fornecedor.id')
            ->select('entrada.*', 'fornecedor.nome as fornecedor')
            ->get();
        return view('site.entrada.entrada', [
            'entradas' => $entrada
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.entrada.create', [
            'produtos' => Produto::all(),
            'fornecedores' => Fornecedor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mensagem = 'Entrada cadastrada com sucesso!';

        $produto = $request->produto;
        $quantidade = $request->quantidade;
        $fornecedor = $request->cliente;
        $valor = $request->valor_unit;
        $valorTotal = 0;

        for ($i = 0; $i < count($produto); $i++) {
            $valorTotal += doubleval($quantidade[$i]) * doubleval($valor[$i]);
        }

        $entrada = new Entrada();
        $entrada->id_fornecedor = $fornecedor;
        $entrada->valor_total = $valorTotal;
        $entrada->save();

        for ($i = 0; $i < count($produto); $i++) {
            $produtos = Produto::find($produto[$i]);
            $produtos->quantidade += $quantidade[$i];
            $produtos->save();

            $itemEntrada = new ItemEntrada();
            $itemEntrada->id_entrada = $entrada->id;
            $itemEntrada->id_produto = $produtos->id;
            $itemEntrada->quantidade = $quantidade[$i];
            $itemEntrada->valor_fabrica = $valor[$i];
            $itemEntrada->valor_produto = $valorTotal;
            $itemEntrada->save();

            return view('site.entrada.create', [
                'mensagem' => $mensagem
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
