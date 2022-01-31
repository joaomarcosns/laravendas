<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVenda;
use App\Models\Cliente;
use App\Models\ItemVenda;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $vendas = DB::table('vendas')
            ->select(
                'vendas.id', 
                'clientes.nome as nome_cliente', 
                'vendas.created_at as data', 
                'vendas.valor_total'
            )
            ->join('clientes', 'clientes.id', '=', 'vendas.cliente_id')
            ->orderBy('vendas.id', 'asc')
            ->get();

        return view('site.venda.vendas', [
            'vendas' => $vendas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('site.venda.realizar-venda', [
            'clientes' => Cliente::all(),
            'produtos' => Produto::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVenda $request) {

        $mensagem = 'Venda realizada com sucesso!';

        $produtosArray = $request->input('produto');
        $quantidadeArray = $request->input('quantidade');
        $valoresArray = $request->input('valor-unit');
        $valorTotal = 0;

        for($i = 0; $i < count($produtosArray); $i++) {
            $valorTotal += doubleval($quantidadeArray[$i]) * doubleval($valoresArray[$i]);

            if (doubleval($quantidadeArray[$i]) > Produto::find($produtosArray[$i])->quantidade) {
                $mensagem = 'Quantidade de produto insuficiente!';
                break;
            }
        }

        $venda = new Venda();
        $venda->cliente_id = $request->input('cliente');
        $venda->valor_total = $valorTotal;
        $venda->save();

        for ($i = 0; $i < count($produtosArray); $i++) { 

            // atualizando o produto no banco
            $produto = Produto::find($produtosArray[$i]);
            $produto->quantidade = ($produto->quantidade - $quantidadeArray[$i]);
            $produto->save();

            // criando um item na tabela itens_venda
            $itemVenda = new ItemVenda();
            $itemVenda->venda_id = $venda->id;
            $itemVenda->produto_id = $produtosArray[$i];
            $itemVenda->valor_unit = $valoresArray[$i];
            $itemVenda->quantidade = $quantidadeArray[$i];
            $itemVenda->save();
        }
        
        return view('site.venda.realizar-venda', [
            'mensagem' => $mensagem,
            'clientes' => Cliente::all(), 
            'produtos' => Produto::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $venda = DB::table('vendas')
            ->select(
                'clientes.nome as nome_cliente', 
                'vendas.valor_total as valor_total', 
                'produtos.nome as nome_produto', 
                'produtos.valor as valor_produto', 
                'itens_venda.quantidade as quantidade'
            )
            ->join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
            ->join('itens_venda', 'vendas.id', '=', 'itens_venda.venda_id')
            ->join('produtos', 'itens_venda.produto_id', '=', 'produtos.id')
            ->where('vendas.id', '=', $id)
            ->get();

        return view('site.venda.ver-venda', [
            'venda' => $venda
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $venda = DB::table('vendas')
            ->select(
                'vendas.id as id_venda',
                'clientes.id as id_cliente',
                'produtos.id as id_produto',
                'produtos.valor', 
                'itens_venda.quantidade as quantidade'
            )
            ->join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
            ->join('itens_venda', 'vendas.id', '=', 'itens_venda.venda_id')
            ->join('produtos', 'itens_venda.produto_id', '=', 'produtos.id')
            ->where('vendas.id', '=', $id)
            ->get();

        
        return view('site.venda.atualizar-venda', [
            'venda' => $venda, 
            'clientes' => Cliente::all(), 
            'produtos' => Produto::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $mensagem = 'Venda atualizada com sucesso!';
            
        $produtosArray = $request->input('produto');
        $quantidadeArray = $request->input('quantidade');
        $valoresArray = $request->input('valor-unit');
        $valorTotal = 0;

        for($i = 0; $i < count($produtosArray); $i++) {
            $valorTotal += doubleval($quantidadeArray[$i]) * doubleval($valoresArray[$i]);
        }

        $venda = Venda::find($id);
        $venda->cliente_id = $request->input('cliente');
        $venda->valor_total = $valorTotal;
        $venda->save();

        // deletando os antigos itens da venda
        DB::table('itens_venda')->where('venda_id', '=', $id)->delete();

        for ($i = 0; $i < count($produtosArray); $i++) { 

            // atualizando o produto no banco
            $produto = Produto::find($produtosArray[$i]);
            $produto->quantidade = ($produto->quantidade - $quantidadeArray[$i]);
            $produto->save();

            // criando novos itens na tabela itens_venda
            $itemVenda = new ItemVenda();
            $itemVenda->venda_id = $id;
            $itemVenda->produto_id = $produtosArray[$i];
            $itemVenda->valor_unit = $valoresArray[$i];
            $itemVenda->quantidade = $quantidadeArray[$i];
            $itemVenda->save();
        }

        // para retorno a página de vendas
        $vendas = DB::table('vendas')
            ->select(
                'vendas.id', 
                'clientes.nome as nome_cliente', 
                'vendas.created_at as data', 
                'vendas.valor_total'
            )
            ->join('clientes', 'clientes.id', '=', 'vendas.cliente_id')
            ->orderBy('vendas.id', 'asc')
            ->get();

        return view('site.venda.vendas', [
            'vendas' => $vendas,
            'mensagem' => $mensagem
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $mensagem = 'Venda excluida com sucesso!';

        Venda::find($id)->delete();

        $vendas = DB::table('vendas')
            ->select(
                'vendas.id', 
                'clientes.nome as nome_cliente', 
                'vendas.created_at as data',
                'vendas.valor_total'
            )
            ->join('clientes', 'clientes.id', '=', 'vendas.cliente_id')
            ->orderBy('vendas.id', 'asc')
            ->get();

        return view('site.venda.vendas', [
            'mensagem' => $mensagem,
            'vendas' => $vendas
        ]);

    }
}
