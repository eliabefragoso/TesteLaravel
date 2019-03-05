<?php

namespace App\Http\Controllers;

use App\Rua;
use Illuminate\Http\Request;

class RuaController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rua  $rua
     * @return \Illuminate\Http\Response
     */
    public function show(Rua $rua)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rua  $rua
     * @return \Illuminate\Http\Response
     */
    public function edit(Rua $rua)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rua  $rua
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rua $rua)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rua  $rua
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rua $rua)
    {
        //
    }

    public function cepJson(){
        $cep = Rua::all();
        return json_encode($cep); 
    }

    public function ruaJson($cep){

        $rua = Rua::where('CEP',$cep)->get();
        return $rua;  
    }
}
