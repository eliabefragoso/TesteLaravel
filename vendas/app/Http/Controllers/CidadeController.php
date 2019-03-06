<?php

namespace App\Http\Controllers;

use App\cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
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
        $selectCidade = cidade::where([['nome',$request->input('nome')],['estado_id',$request->input('estado_id')]])->get();
        if(count($selectCidade)>0){ 
              return json_encode("");
        }else{
            $cidade = new cidade();
            $cidade->nome = $request->input('nome');
            $cidade->estado_id = $request->input('estado_id');
            $cidade->save();
            $Cidade = cidade::where([['nome',$request->input('nome')],['estado_id',$request->input('estado_id')]])->get();
            return json_encode($Cidade);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(cidade $cidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(cidade $cidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cidade $cidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(cidade $cidade)
    {
        //
    }

    public function cidadeJson(){
        $cidades = cidade::all();
        return json_encode($cidades);
    }
    public function cidadeSJson($estado_id){
        $cidades = cidade::where('estado_id',$estado_id)->get(); 
        return json_encode($cidades);
    }
}
