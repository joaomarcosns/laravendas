<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCliente extends FormRequest
{
    public function rules()
    {
        return [
          'nome' => 'required|max:255|min:3', 
          'telefone' => 'required|max:255|min:3|numeric',
          'endereco' => 'required|max:255|min:3',
        ];
    }

    public function messages()
    {
        return [
          'nome.required' => 'O campo nome é obrigatório',
          'nome.max' => 'O campo nome deve ter no máximo :max caracteres',
          'nome.min' => 'O campo nome deve ter no mínimo :min caracteres',
          'telefone.required' => 'O campo telefone é obrigatório',
          'telefone.max' => 'O campo telefone deve ter no máximo :max caracteres',
          'telefone.min' => 'O campo telefone deve ter no mínimo :min caracteres',
          'telefone.numeric' => 'O campo telefone deve ser numérico',
          'endereco.required' => 'O campo endereço é obrigatório',
          'endereco.max' => 'O campo endereço deve ter no máximo :max caracteres',
          'endereco.min' => 'O campo endereço deve ter no mínimo :min caracteres',
        ];
    }
}
