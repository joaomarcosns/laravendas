<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVenda extends FormRequest
{
    public function rules()
    {
        return [
            'produto' => 'required',
            'cliente' => 'required',
            'quantidade' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'produto.required' => 'O campo produto é obrigatório',
            'quantidade.required' => 'O campo quantidade é obrigatório',
            'quantidade.numeric' => 'O campo quantidade deve ser numérico',
            'cliente.required' => 'O campo cliente é obrigatório',
        ];
    }
}
