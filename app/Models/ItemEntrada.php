<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemEntrada extends Model
{
    use HasFactory;
    protected $table = 'itens_entrada';
    protected $fillable = [
        'id_entrada', 
        'id_produto', 
        'quantidade', 
        'valor_produto',
        'valor_fabrica'
    ];

}
