<?php

namespace App\Http\Controllers;

use App\produto;
use App\vendedor;
use Illuminate\Http\Request;
use Storage;
use App\vendedores_has_produtos;
class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('create', vendedor::class);
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
        $this->authorize('create', vendedor::class); 
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
        $this->authorize('create', vendedor::class);
        $p =  $request->file('url');
        if(isset($p)){
            $path = $request->file('url')->store('upload');
        }else{
            $path = '0';
        }

        
        $prod = new produto(); 
        $prod->codigo = $request->input('codigo');
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
       $this->authorize('create', vendedor::class); 
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
        $this->authorize('create', vendedor::class);
        $p =  $request->file('url');
        if(isset($p)){
            $path = $request->file('url')->store('upload');
            $prod = produto::find($id);
        
            Storage::delete($prod->url);  
            $prod->codigo = $request->input('codigo');
            $prod->nome = $request->input('nome');
            $prod->preco = $request->input('preco');
            $prod->quantidade = $request->input('quantidade');
            $prod->comissao = $request->input('comissao');
            $prod->classificacao = $request->input('classificacao');
            $prod->url = $path;
            $prod->save();
        }else{
            $path = '0';
            $prod = produto::find($id);
            if($prod->url!='0'){
                Storage::delete($prod->url);  
            }

            $prod->codigo = $request->input('codigo');
            $prod->nome = $request->input('nome');
            $prod->preco = $request->input('preco');
            $prod->quantidade = $request->input('quantidade');
            $prod->comissao = $request->input('comissao');
            $prod->classificacao = $request->input('classificacao');
            $prod->url = $path;
            $prod->save();
    
        }
        
       
        
       
       
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
        $this->authorize('create', vendedor::class);
        $prod = produto::find($id);
        Storage::delete($prod->url);  
        $prod->delete();

        return redirect("/produtos");

    }

   public function EstoqueVendedor(){
    $this->authorize('create', vendedor::class);
       $produtos = produto::all();  
       return view("estoque",compact('produtos'));
   }  
   public function EstoqueJson(Request $request){
         $estoque = new vendedores_has_produtos(); 
         $estoque->vendedor_id = $request->vendedor_id;
         $estoque->produto_id = $request->id;
         $estoque->estoque = $request->quantidade;
         $estoque->save();

         $vendedor_estoque = vendedores_has_produtos::all();
         echo json_encode($vendedor_estoque);   
   }

  public function esvaziarEstoqueJson($id){
            $esvaziar = vendedores_has_produtos::where('vendedor_id', $id)->delete();
            
  }

}
