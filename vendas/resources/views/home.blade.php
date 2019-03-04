@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seja bem vindo, {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <?php 
                          if(Auth::user()->level == 5){
                       echo '
    <div class="row">
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de produtos</h5>
                    <p class="card=text">
                        Aqui você cadastra todos os seus produtos.
                        Só não se esqueça de cadastrar previamente as categorias
                    </p>
                    <a href="/produtos" class="btn btn-primary">Cadastre seus produtos</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Categorias</h5>
                    <p class="card=text">
                        Cadastre as categorias dos seus produtos
                    </p>
                    <a href="/categorias" class="btn btn-primary">Cadastre suas categorias</a>
                </div>
            </div>            
        </div>
        <br/>
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de vendedores</h5>
                    <p class="card=text">
                        Aqui você cadastra todos os seus vendedores.
                        Só não se esqueça de cadastrar previamente eles como usuarios.
                    </p>
                    <a href="/produtos" class="btn btn-primary">Cadastre seus vendedores</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Relatorios de vendas</h5>
                    <p class="card=text">
                        Visualize as estatisticas do seu negorcio! 
                    </p>
                    <a href="/estatisticas" class="btn btn-primary">Relatórios</a>
                </div>
            </div>   
    </div>
';  
                          }elseif(Auth::user()->level == 2){
                            echo '
    <div class="row">
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Comprar produtos</h5>
                    <p class="card=text">
                        Aqui você renova seu estoque com todos os nossos produtos.
                                 
                    </p>
                    <a href="/" class="btn btn-primary">Fazer Compras</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Esvaziar Estoque</h5>
                    <p class="card=text">
                        Aqui você zera totamente o seu estoque!
                    </p>
                    <a href="/ZerarEstoque" class="btn btn-primary">Cadastre suas categorias</a>
                </div>
            </div>            
        </div>
        <br/>  <br/>
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Visualizar produtos em estoque!</h5>
                    <p class="card=text">
                        Aqui você visualiza todos os seus produtos.
                        
                    </p>
                    <a href="/estoque" class="btn btn-primary">Estoque</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card=text">
                       Relatório de vendas!
                    </p>
                    <a href="/relatorio" class="btn btn-primary">Relatório</a>
                </div>
            </div>   
    </div>
';  
                          }elseif(Auth::user()->level == 1){
                            echo '
                            <div class="row">
                                <div class="card-deck">
                                    <div class="card border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Comprar produtos</h5>
                                            <p class="card=text">
                                                Aqui você renova seu estoque com todos os nossos produtos.
                                                         
                                            </p>
                                            <a href="/" class="btn btn-primary">Fazer Compras</a>
                                        </div>
                                    </div>
                                    <div class="card border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Esvaziar Estoque</h5>
                                            <p class="card=text">
                                                Aqui você zera totamente o seu estoque!
                                            </p>
                                            <a href="/ZerarEstoque" class="btn btn-primary">Cadastre suas categorias</a>
                                        </div>
                                    </div>            
                                </div>
                                <br/>
                                <div class="card-deck">
                                    <div class="card border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Visualizar produtos em estoque!</h5>
                                            <p class="card=text">
                                                Aqui você visualiza todos os seus produtos.
                                                
                                            </p>
                                            <a href="/estoque" class="btn btn-primary">Estoque</a>
                                        </div>
                                    </div>
                                    <div class="card border border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title"></h5>
                                            <p class="card=text">
                                               Relatório de vendas!
                                            </p>
                                            <a href="/relatorio" class="btn btn-primary">Relatório</a>
                                        </div>
                                    </div>   
                            </div>
                        ';  
                          }else{
                            echo 'Usuario suspenso!';
                          }
                   
                   ?>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
