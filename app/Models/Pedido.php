<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'produto_id',
        'numero_pedido',
        'realizacao_pedido',
        'quantidade',
        'preparo',
        'user_id'
    ];

    public $timestamps = false;

    public function produto(){
        return $this->hasOne(Produto::class);
    }

    public function usuario(){
        return $this->hasOne(User::class);
    }
}
