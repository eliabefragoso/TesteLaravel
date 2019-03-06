<?php

namespace App\Http\Controllers;

use App\Rotas;
use Illuminate\Http\Request;

class RotasController extends Controller
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
        return view('rotas');
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
     * @param  \App\Rotas  $rotas
     * @return \Illuminate\Http\Response
     */
    public function show(Rotas $rotas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rotas  $rotas
     * @return \Illuminate\Http\Response
     */
    public function edit(Rotas $rotas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rotas  $rotas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rotas $rotas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rotas  $rotas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rotas $rotas)
    {
        //
    }
}
