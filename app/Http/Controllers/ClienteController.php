<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCliente;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $clientes = Cliente::all();
        return view('site.cliente.clientes', [
            'clientes' => $clientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('site.cliente.cadastrar-cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCliente $request) {
        $mensagem = 'Cliente cadastrado com sucesso!';

        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->telefone = $request->input('telefone');
        $cliente->endereco = $request->input('endereco');
        $cliente->save();

        return view('site.cliente.cadastrar-cliente', [
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

        $cliente = Cliente::find($id);
        return view('site.cliente.atualizar-cliente', [
            'cliente' => $cliente]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $mensagem = 'Cliente atualizado com sucesso!';
        
        $cliente = Cliente::find($id);
        $cliente->nome = $request->nome;
        $cliente->telefone = $request->input('telefone');
        $cliente->endereco = $request->input('endereco');
        $cliente->save();

        return view('site.cliente.clientes', [
            'clientes' => Cliente::all(), 
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
        
        $mensagem = 'Cliente excluido com sucesso!';

        Cliente::find($id)->delete();
        return view('site.cliente.clientes', [
            'clientes' => Cliente::all(), 
            'mensagem' => $mensagem
        ]);
    }

}