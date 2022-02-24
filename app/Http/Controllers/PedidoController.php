<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\RealizarPedido;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::select("*")->orderBy("like", "desc")->get();
        return view('pedido.index', compact('produtos'));
    }

    public function controle()
    {
        /* $pedidos = Pedido::all();
        $pedido = new RealizarPedido();
        foreach ($pedidos as $p) {
            $mesa = User::findOrFail($p->user_id);
            $pedido->mesa = "rita";
            $pro = Produto::findOrFail($p->produto_id);
            $pedido->preco = $pro->preco * $p->quantidade;
            $pedido->numero_pedido = $p->numero_pedido;
            $pedido->status = $p->status;
            $pedido->produto_id = $p->produto_id;
            $pedido->dataHora = $p->realizacao_pedido;
            $pedido->save();
        } */
        $pedidos = Pedido::all();

        return view('pedido.controle', ['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    public function realizar_pedido(Request $request, $id)
    {
       
        /*     $user = new User();
            $user->name = "Mesa_1";
            $user->email = "mesa_1@gmail.com";
            $user->password = "12345678";
            $user->tipoUsuario = "mesa";
            $user->save();
            $user = new User();
            $user->name = "Mesa_2";
            $user->email = "mesa_2@gmail.com";
            $user->password = "12345678";
            $user->tipoUsuario = "mesa";
            $user->save();
            $user = new User();
            $user->name = "João";
            $user->email = "joao@gmail.com";
            $user->password = "12345678";
            $user->tipoUsuario = "gerente";
            $user->save(); */
        

        $user = User::select("*")->where('tipoUsuario', 'mesa')->first();
        $p = Pedido::select("*")->orderBy('numero_pedido', 'desc')->first();
        $pedido = new Pedido();
        $pedido->status = "Aquardando Pagamento";
        if ($p != NULL)
            $pedido->numero_pedido = 1 + $p->numero_pedido;
        else $pedido->numero_pedido = 1;
        $timezone = new DateTimeZone('America/Sao_Paulo');
        $pedido->realizacao_pedido = new DateTime('now', $timezone);
        $pedido->quantidade = request()->input('quantidade');;
        $pedido->produto_id = $id;
        $pedido->user_id = 1;
        $pedido->user_id = 1;
        $pedido->preparo = "Aguardando";
        $pedido->save();
        $produto = Produto::findOrFail($id);
        $produto->like = request()->input('vallike');;
        $produto->save();
        $mensagem = "O pedido está em preparo! Aguarde que o pedido vai chegar na sua mesa. Obrigado.";
        return view('pedido.informe', ['mensagem' => $mensagem]);
        //return redirect()->route('pedido.index')->with('success', "Pedido realizado com sucesso!");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pedido.show', [
            'produto' => Produto::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
