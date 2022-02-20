<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'pedido_id',
        'numero_pedido',
        'realizacao_pedido'
    ];

    public function produto(){
        return $this->hasOne(Produto::class);
    }

    public function usuario(){
        return $this->hasOne(User::class);
    }
}
