<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Estado;
use App\cidade;
use App\Bairro;
use App\Rua;
use App\endereco;
use Illuminate\Http\Request;
use Storage;
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
            
            $cidade = cidade::where([['nome',$request->input('cidade')],['estado_id',$estado[0]->id]])->get(); 
             if(count($cidade)>0){
                     $bairro = Bairro::where([['nome',$request->input('Bairro')],['cidade_id',$cidade[0]->id]])->get();  
                     if(count($bairro)>0){
                        $rua = Rua::where([['nome',$request->input('rua')],['cidade_id',$cidade[0]->id]])->get();
                        if(count($rua)>0){
                               $endereco = endereco::where([['numero',$request->input('numero')],['rua_id',$rua[0]->id],['bairro_id',$bairro[0]->id],['complemento',$request->input('complemento')]])->get();  
                               if(count($endereco)>0){
                                   $cpf = Cliente::where('cpf',$request->input('cpf'))->get();
                                   if(count($cpf)>0){
                                     $aviso = "<h3> CPF já cadastrado no Sistema! </h3>";
                                     return view("aviso",compact('aviso'));
                                   }else{
                                    $p =  $request->file('foto');
                                    if(isset($p)){
                                        $path = $request->file('foto')->store('cliente');
                                    }else{
                                        $path = 'cliente/default.png';
                                    }    
                        
                                    $cliente = new Cliente();
                                    $cliente->nome  = $request->input('nome');
                                    $cliente->foto = $path;
                                    $cliente->cpf  = $request->input('cpf');
                                    $cliente->rg  = $request->input('rg');
                                    $cliente->email  = $request->input('email');
                                    $cliente->sexo  = $request->input('sexo');
                                    $cliente->nascimento  = $request->input('nascimento');
                                    $cliente->estado_civil  = $request->input('estado_civil');
                                    $cliente->dependentes  = $request->input('dependentes');
                                    $cliente->endereco_id = $endereco[0]->id;
                                    $cliente->save(); 
                        
                        
                                    $selectClientes = Cliente::where([['cpf',$request->input('cpf')],['endereco_id',$endereco[0]->id]])->get();
                                    return redirect('/telefone/'.$selectClientes[0]->id);
                                    //return view('telefone',compact('selectClientes'));  
                                   }
                               }else{
                                $cadastrarEndereco = new endereco();
                                $cadastrarEndereco->numero = $request->input('numero');  
                                $cadastrarEndereco->complemento = $request->input('complemento');          
                                $cadastrarEndereco->bairro_id = $bairro[0]->id;
                                $cadastrarEndereco->rua_id = $rua[0]->id;
                                $cadastrarEndereco->save();
                                $selectEndereco = endereco::where([['numero',$request->input('numero')],['rua_id',$rua[0]->id],['bairro_id',$bairro[0]->id],['complemento',$request->input('complemento')]])->get();
                                
                                $p =  $request->file('foto');
                                if(isset($p)){
                                    $path = $request->file('foto')->store('cliente');
                                }else{
                                    $path = 'cliente/default.png';
                                }    
                    
                                $cliente = new Cliente();
                                $cliente->nome  = $request->input('nome');
                                $cliente->foto = $path;
                                $cliente->cpf  = $request->input('cpf');
                                $cliente->rg  = $request->input('rg');
                                $cliente->email  = $request->input('email');
                                $cliente->sexo  = $request->input('sexo');
                                $cliente->nascimento  = $request->input('nascimento');
                                $cliente->estado_civil  = $request->input('estado_civil');
                                $cliente->dependentes  = $request->input('dependentes');
                                $cliente->endereco_id = $selectEndereco[0]->id;
                                $cliente->save(); 
                    
                    
                                $selectClientes = Cliente::where([['cpf',$request->input('cpf')],['endereco_id',$selectEndereco[0]->id]])->get();
                                return view('telefone',compact('selectClientes'));  
                               }
                        }else{
                            $cadastrarRua = new Rua();
                            $cadastrarRua->nome = $request->input('rua');
                            $cadastrarRua->CEP = $request->input('CEP');
                            $cadastrarRua->cidade_id = $cidade[0]->id;
                            $cadastrarRua->save();
                            $selectRua = Rua::where([['nome',$request->input('rua')],['cidade_id',$cidade[0]->id]])->get();
                            $cadastrarEndereco = new endereco();
                            $cadastrarEndereco->numero = $request->input('numero');  
                            $cadastrarEndereco->complemento = $request->input('complemento');          
                            $cadastrarEndereco->bairro_id = $bairro[0]->id;
                            $cadastrarEndereco->rua_id = $selectRua[0]->id;
                            $cadastrarEndereco->save();
                            $selectEndereco = endereco::where([['numero',$request->input('numero')],['rua_id',$selectRua[0]->id],['bairro_id',$bairro[0]->id],['complemento',$request->input('complemento')]])->get();
                            
                            $p =  $request->file('foto');
                            if(isset($p)){
                                $path = $request->file('foto')->store('cliente');
                            }else{
                                $path = 'cliente/default.png';
                            }    
                
                            $cliente = new Cliente();
                            $cliente->nome  = $request->input('nome');
                            $cliente->foto = $path;
                            $cliente->cpf  = $request->input('cpf');
                            $cliente->rg  = $request->input('rg');
                            $cliente->email  = $request->input('email');
                            $cliente->sexo  = $request->input('sexo');
                            $cliente->nascimento  = $request->input('nascimento');
                            $cliente->estado_civil  = $request->input('estado_civil');
                            $cliente->dependentes  = $request->input('dependentes');
                            $cliente->endereco_id = $selectEndereco[0]->id;
                            $cliente->save(); 
                
                
                            $selectClientes = Cliente::where([['cpf',$request->input('cpf')],['endereco_id',$selectEndereco[0]->id]])->get();
                            return view('telefone',compact('selectClientes'));   
                        }      
                    }else{
                        
                        $cadastrarBairro = new Bairro();
                        $cadastrarBairro->nome = $request->input('Bairro');
                        $cadastrarBairro->cidade_id = $cidade[0]->id;
                        $cadastrarBairro->save();
                        $selectBairro = Bairro::where([['nome',$request->input('Bairro')],['cidade_id',$cidade[0]->id]])->get();
                        $cadastrarRua = new Rua();
                        $cadastrarRua->nome = $request->input('rua');
                        $cadastrarRua->CEP = $request->input('CEP');
                        $cadastrarRua->cidade_id = $cidade[0]->id;
                        $cadastrarRua->save();
                        $selectRua = Rua::where([['nome',$request->input('rua')],['cidade_id',$cidade[0]->id]])->get();
                        $cadastrarEndereco = new endereco();
                        $cadastrarEndereco->numero = $request->input('numero');  
                        $cadastrarEndereco->complemento = $request->input('complemento');          
                        $cadastrarEndereco->bairro_id = $selectBairro[0]->id;
                        $cadastrarEndereco->rua_id = $selectRua[0]->id;
                        $cadastrarEndereco->save();
                        $selectEndereco = endereco::where([['numero',$request->input('numero')],['rua_id',$selectRua[0]->id],['bairro_id',$selectBairro[0]->id],['complemento',$request->input('complemento')]])->get();
                        
                        $p =  $request->file('foto');
                        if(isset($p)){
                            $path = $request->file('foto')->store('cliente');
                        }else{
                            $path = 'cliente/default.png';
                        }    
            
                        $cliente = new Cliente();
                        $cliente->nome  = $request->input('nome');
                        $cliente->foto = $path;
                        $cliente->cpf  = $request->input('cpf');
                        $cliente->rg  = $request->input('rg');
                        $cliente->email  = $request->input('email');
                        $cliente->sexo  = $request->input('sexo');
                        $cliente->nascimento  = $request->input('nascimento');
                        $cliente->estado_civil  = $request->input('estado_civil');
                        $cliente->dependentes  = $request->input('dependentes');
                        $cliente->endereco_id = $selectEndereco[0]->id;
                        $cliente->save(); 
            
            
                        $selectClientes = Cliente::where([['cpf',$request->input('cpf')],['endereco_id',$selectEndereco[0]->id]])->get();
                        return view('telefone',compact('selectClientes'));   

                    }   
             }else{
                $cadastrarCidade = new cidade();
                $cadastrarCidade->nome = $request->input('cidade');
                $cadastrarCidade->estado_id = $estado[0]->id;
                $cadastrarCidade->save();
                $selectCidade = cidade::where([['nome',$request->input('cidade')],['estado_id',$estado[0]->id]])->get();
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
                
                $p =  $request->file('foto');
                if(isset($p)){
                    $path = $request->file('foto')->store('cliente');
                }else{
                    $path = 'cliente/default.png';
                }    
    
                $cliente = new Cliente();
                $cliente->nome  = $request->input('nome');
                $cliente->foto = $path;
                $cliente->cpf  = $request->input('cpf');
                $cliente->rg  = $request->input('rg');
                $cliente->email  = $request->input('email');
                $cliente->sexo  = $request->input('sexo');
                $cliente->nascimento  = $request->input('nascimento');
                $cliente->estado_civil  = $request->input('estado_civil');
                $cliente->dependentes  = $request->input('dependentes');
                $cliente->endereco_id = $selectEndereco[0]->id;
                $cliente->save(); 
    
    
                $selectClientes = Cliente::where([['cpf',$request->input('cpf')],['endereco_id',$selectEndereco[0]->id]])->get();
                return view('telefone',compact('selectClientes'));   

             }


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
            
            $p =  $request->file('foto');
            if(isset($p)){
                $path = $request->file('foto')->store('cliente');
            }else{
                $path = 'cliente/default.png';
            }    

            $cliente = new Cliente();
            $cliente->nome  = $request->input('nome');
            $cliente->foto = $path;
            $cliente->cpf  = $request->input('cpf');
            $cliente->rg  = $request->input('rg');
            $cliente->email  = $request->input('email');
            $cliente->sexo  = $request->input('sexo');
            $cliente->nascimento  = $request->input('nascimento');
            $cliente->estado_civil  = $request->input('estado_civil');
            $cliente->dependentes  = $request->input('dependentes');
            $cliente->endereco_id = $selectEndereco[0]->id;
            $cliente->save(); 


            $selectClientes = Cliente::where([['cpf',$request->input('cpf')],['endereco_id',$selectEndereco[0]->id]])->get();
            return view('telefone',compact('selectClientes'));    
             
             
             

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
