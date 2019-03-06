<?php

namespace App\Http\Controllers;

use App\telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
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
    public function create($cliente_id)
    {
         // echo $cliente_id;
        return view('telefone',compact('cliente_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phone = new telefone();
        $phone->ddd = $request->input('ddd');
        $phone->numero = $request->input('numero');
        $phone->operadora = $request->input('operadora');
        $phone->tipo = $request->input('tipo');
        $phone->cliente_id = $request->input('cliente_id');
        $phone->save(); 
         
        $alert = "Numero do cliente cadastrado com sucesso.  Sistema pronto para cadastrar novo numero!";
       
        return json_encode($alert);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function show(telefone $telefone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function edit(telefone $telefone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, telefone $telefone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function destroy(telefone $telefone)
    {
        //
    }
}
