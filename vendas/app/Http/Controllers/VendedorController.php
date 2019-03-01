<?php

namespace App\Http\Controllers;

use App\vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedores = vendedor::all();  

        return view('vendedor',compact('vendedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('NovoVendedor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendedor = new vendedor();

        $vendedor->nome = $request->input('nome');
        $vendedor->tipo = $request->input('tipo');
        $vendedor->rua = $request->input('rua');
        $vendedor->numero = $request->input('numero');
        $vendedor->bairro = $request->input('bairro');
        $vendedor->cep = $request->input('cep');
        $vendedor->save();

        return redirect('/vendedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function show(vendedor $vendedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $vendedor = vendedor::find($id);

         return view('editarVendedor',compact('vendedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $vendedor = vendedor::find($id);
        if(isset($vendedor)){
        $vendedor->nome = $request->input('nome');
        $vendedor->tipo = $request->input('tipo');
        $vendedor->rua = $request->input('rua');
        $vendedor->numero = $request->input('numero');
        $vendedor->bairro = $request->input('bairro');
        $vendedor->cep = $request->input('cep');
        $vendedor->save();

        return redirect('/vendedores');
        }else{
            return respose("vendedor não encontrado",404);
        }
                           

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendedor = vendedor::find($id);
        if(isset($vendedor)){
            $vendedor->delete();      
            return redirect('/vendedores');
        }else{
            return respose("vendedor não encontrado",404);
        }   
    }
}
