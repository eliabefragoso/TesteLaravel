@extends('layout.app', ["current" => "Vendedores"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de vendedores</h5>

@if(count($vendedores) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Vendedor</th>
                    <th>Tipo</th>
                    <th>Rua/Numero</th>
                    <th>Bairro</th>
                    <th>CEP</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
    @foreach($vendedores as $vendedor)
                <tr>
                    <td>{{$vendedor->id}}</td>
                    <td>{{$vendedor->nome}}</td>
                    <td>@if($vendedor->tipo=='1')Micro @else Socio @endif </td>
                    <td>{{$vendedor->rua}} / {{$vendedor->numero}} </td>
                    <td>{{$vendedor->bairro}}</td>
                    <td>{{$vendedor->cep}}</td>
                    <td>
                        <a href="/vendedores/editar/{{$vendedor->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/vendedores/apagar/{{$vendedor->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
    @endforeach                
            </tbody>
        </table>
@endif        
    </div>
    <div class="card-footer">
        <a href="/vendedores/novo" class="btn btn-sm btn-primary" role="button">Novo Vendedor</a>
    </div>
</div>



@endsection