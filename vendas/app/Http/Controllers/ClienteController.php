<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Estado;
use App\cidade;
use App\Bairro;
use App\Rua;
use App\endereco;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novoCliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = Estado::where('nome',$request->input('estado'))->get();
        if(count($estado)>0){
            echo "aq";
        }else{
            $cadastrarEstado = new Estado();
            $cadastrarEstado->nome = $request->input('estado');
            $cadastrarEstado->save();
            $selectEstado = Estado::where('nome',$request->input('estado'))->get();
            $cadastrarCidade = new cidade();
            $cadastrarCidade->nome = $request->input('cidade');
            $cadastrarCidade->estado_id = $selectEstado[0]->id;
            $cadastrarCidade->save();
            $selectCidade = cidade::where([['nome',$request->input('cidade')],['estado_id',$selectEstado[0]->id]])->get();
            $cadastrarBairro = new Bairro();
            $cadastrarBairro->nome = $request->input('Bairro');
            $cadastrarBairro->cidade_id = $selectCidade[0]->id;
            $cadastrarBairro->save();
            $selectBairro = Bairro::where([['nome',$request->input('Bairro')],['cidade_id',$selectCidade[0]->id]])->get();
            $cadastrarRua = new Rua();
            $cadastrarRua->nome = $request->input('rua');
            $cadastrarRua->CEP = $request->input('CEP');
            $cadastrarRua->cidade_id = $selectCidade[0]->id;
            $cadastrarRua->save();
            $selectRua = Rua::where([['nome',$request->input('rua')],['cidade_id',$selectCidade[0]->id]])->get();
            $cadastrarEndereco = new endereco();
            $cadastrarEndereco->numero = $request->input('numero');  
            $cadastrarEndereco->complemento = $request->input('complemento');          
            $cadastrarEndereco->bairro_id = $selectBairro[0]->id;
            $cadastrarEndereco->rua_id = $selectRua[0]->id;
            $cadastrarEndereco->save();
            $selectEndereco = endereco::where([['numero',$request->input('numero')],['rua_id',$selectRua[0]->id],['bairro_id',$selectBairro[0]->id],['complemento',$request->input('complemento')]])->get();
            

        }
        
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
