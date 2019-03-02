<?php

namespace App\Http\Controllers;

use App\produto;
use Illuminate\Http\Request;
use Storage;
class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = produto::all();  

        return view('produtos',compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('NovoProduto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p =  $request->file('url');
        if(isset($p)){
            $path = $request->file('url')->store('upload');
        }else{
            $path = '0';
        }

        
        $prod = new produto(); 
        $prod->nome = $request->input('nome');
        $prod->preco = $request->input('preco');
        $prod->quantidade = $request->input('quantidade');
        $prod->comissao = $request->input('comissao');
        $prod->classificacao = $request->input('classificacao');
        $prod->url = $path;
        $prod->categoria_id = $request->input('categoria_id');
        $prod->save();

        return redirect("/produtos");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $prod = produto::find($id);
       return view('editarProduto',compact('prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $path = $request->file('url')->store('upload');
        $prod = produto::find($id);
       
        Storage::delete($prod->url);  
        
        $prod->nome = $request->input('nome');
        $prod->preco = $request->input('preco');
        $prod->quantidade = $request->input('quantidade');
        $prod->comissao = $request->input('comissao');
        $prod->classificacao = $request->input('classificacao');
        $prod->url = $path;
        $prod->save();

        return redirect("/produtos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = produto::find($id);
        Storage::delete($prod->url);  
        $prod->delete();

        return redirect("/produtos");

    }
}
