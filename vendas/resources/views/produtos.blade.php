@extends('layout.app', ["current" => "Produtos"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Produtos</h5>

@if(count($produtos) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                <th>Código</th>
                    <th>Nome do Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Comissão</th>
                    <th>Classificação</th>
                    <th>Imagem</th>
                    <th>Inserir Imagem</th>
                    <th> Ação</th>
                </tr>
            </thead>
            <tbody>
    @foreach($produtos as $prod)
                <tr>
                    <td>{{$prod->id}}</td>
                    <td>{{$prod->nome}}</td>
                    <td>{{$prod->quantidade}}  </td>
                    <td>R$ {{number_format($prod->preco,2,",",".")}}</td>
                    <td>{{$prod->comissao}}</td>
                    <td>{{$prod->classificacao}}</td>
                    <td><img src="storage/{{$prod->url}}" height="50px" /></td>
                    <td><a href="/inserirImagem/{{$prod->id}}" type="button" class="btn btn-success">Inserir Imagens</a></td>
                    <td>
                        <a href="/produtos/editar/{{$prod->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/produtos/apagar/{{$prod->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
    @endforeach                
            </tbody>
        </table>
@endif        
    </div>
    <div class="card-footer">
        <a href="/produtos/novo" class="btn btn-sm btn-primary" role="button">Novo Produto</a>
    </div>
</div>



@endsection