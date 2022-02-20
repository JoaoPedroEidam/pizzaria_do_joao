<?php

namespace App\Http\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = Produto::all();
        return view('produto.index', compact('produto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $regras = [
            'nome'  => 'required|min:3|max:80',
            'preco' => 'required|min:0',
            'descricao' => 'required|min:1|max:250',
            'arquivo' => 'required'
        ];
        $mensagens = [ 
            'nome.required' => 'O nome é requerido.',
            'nome.min' => 'É necessário no mínimo 3 caracteres no nome.',
            'required' => 'O atributo :attribute não pode estar em branco.',  // Generico
            'preco.required' => 'Informe o preço.',
            'descricao.required' => 'Digite uma descrição.'
        ];

        $request->validate($regras, $mensagens);

        $path = $request->file('arquivo')->store('imagens', 'public');

        $produto = new Produto;
        $produto->nome = request()->input('nome');
        $produto->preco = request()->input('preco');
        $produto->descricao = request()->input('descricao');
        $produto->like = 0;
        $produto->arquivo = $path;
        $produto->save();
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('produto.show', [
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
        return view('produto.edit', [
            'produto' => Produto::findOrFail($id)
        ]);
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
        $produto = Produto::findOrFail($id);
         
        $regras = [
            'nome'  => 'required|min:3|max:80',
            'preco' => 'required|min:0',
            'descricao' => 'required|min:1|max:250'
        ];
        $mensagens = [ 
            'nome.required' => 'O nome é requerido.',
            'nome.min' => 'É necessário no mínimo 3 caracteres no nome.',
            'required' => 'O atributo :attribute não pode estar em branco.',  // Generico
            'preco.required' => 'Informe o preço.',
            'descricao.required' => 'Digite uma descrição.'
        ];

        $request->validate($regras, $mensagens);

        if($request->file('arquivo') != NULL){
            $arquivo = $produto->arquivo;
            Storage::disk('public')->delete($arquivo);
            $path = $request->file('arquivo')->store('imagens', 'public');
            $produto->arquivo = $path;
        }
       
        $produto->nome = request()->input('nome');
        $produto->preco = request()->input('preco');
        $produto->descricao = request()->input('descricao');
        $produto->like = 0;
       
        $produto->save();
        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $arquivo = $produto->arquivo;
        Storage::disk('public')->delete($arquivo);
        Produto::destroy($id);
        return redirect()->route('produto.index');
    }
}