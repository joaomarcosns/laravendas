<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $produtos = Produto::all();
        return view('site.produto.produtos', [
            'produtos' => $produtos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('site.produto.cadastrar-produto', [
            'titulo' => 'Cadastrar produto'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduto $request) {
        
        $mensagem = 'Produto cadastrado com sucesso!';
        $produto = new Produto();
        $produto->nome = $request->input('nome');
        $produto->valor = 0;
        $produto->quantidade = 0;
        $produto->categoria = $request->input('categoria');
        $produto->save();
        
        return view('site.produto.cadastrar-produto', [
            'mensagem' => $mensagem
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $produto = Produto::find($id);
        return view('site.produto.atualizar-produto', [
            'produto' => $produto
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
        
        $mensagem = 'Produto atualizado com sucesso!';

        $produto = Produto::find($id);
        $produto->nome = $request->input('nome');
        $produto->valor = $request->input('valor');
        $produto->quantidade = $request->input('quantidade');
        $produto->save();

        return view('site.produto.produtos', [
            'produtos' => Produto::all(), 
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

        $mensagem = 'Produto excluido com sucesso!';

        Produto::find($id)->delete();
        return view('site.produto.produtos', [
            'produtos' => Produto::all(), 
            'mensagem' => $mensagem
        ]);
    }

}
