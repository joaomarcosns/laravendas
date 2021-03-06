<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemVenda extends Model
{
    use HasFactory;

    protected $table = 'itens_venda';
    protected $fillable = [
        'venda_id',
        'produto_id',
        'valor_unit',
        'quantidade'
    ];
    
}
