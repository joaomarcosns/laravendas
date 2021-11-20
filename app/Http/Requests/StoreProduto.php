<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduto extends FormRequest
{
    public function rules()
    {
        return [
            'nome' => 'required|max:255|min:3',
            'categoria' => 'required|max:255|min:3',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do produto é obrigatório',
            'nome.max' => 'O nome do produto deve ter no máximo :max caracteres',
            'nome.min' => 'O nome do produto deve ter no mínimo :min caracteres',
            'categoria.required' => 'A categoria do produto é obrigatória',
            'categoria.max' => 'A categoria do produto deve ter no máximo :max caracteres',
            'categoria.min' => 'A categoria do produto deve ter no mínimo :min caracteres',
        ];
    }

    
}
