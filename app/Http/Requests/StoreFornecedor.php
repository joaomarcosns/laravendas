<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFornecedor extends FormRequest
{
    public function rules()
    {
        return [
            "nome" => "required|min:3|max:255",
            "cnpj" => "required|numeric",
            "telefone" => "required|numeric",
        ];

    }

    public function messages()
    {
        return [
            "nome.required" => "O campo nome é obrigatório",
            "nome.min" => "O campo nome deve ter no mínimo :min caracteres",
            "nome.max" => "O campo nome deve ter no máximo :max caracteres",
            "cnpj.required" => "O campo cnpj é obrigatório",

            "cnpj.max" => "O campo cnpj deve ter no máximo :max caracteres",
            "cnpj.numeric" => "O campo cnpj deve ser numérico",
            "telefone.required" => "O campo telefone é obrigatório",
            "telefone.max" => "O campo telefone deve ter no máximo :max caracteres",
            "telefone.numeric" => "O campo telefone deve ser numérico",
        ];
    }
}
