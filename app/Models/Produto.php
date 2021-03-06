<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'like',
        'descricao',
        'arquivo'
    ];

    public $timestamps = false;

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

}
