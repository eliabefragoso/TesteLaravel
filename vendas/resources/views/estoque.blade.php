@extends('layout.app', ["current" => "Estoque"])

@section('body')
<?php 

use App\vendedor;
$vendedores = vendedor::all();
?>
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Preecha o Estoque do vendedor / Selecione o vendedor:
        @if(count($vendedores)>0)  
        <form id="form" enctype="multipart/form-data">
           <select name="vendedor" id="vendedor" onclick="preencherEstoque();">
           <option value="0"> Selecione o vendedor </option>
                @foreach($vendedores as $vendedor)  
             <option value="{{$vendedor->id}}"> {{$vendedor->nome}} </option>  
                @endforeach
            </select> 
            </form>
         @endif                                  
         </h5>
  
         @if(count($produtos) > 0)
        <table class="table table-ordered table-hover" id="tabelaestoque">
            <thead>
                <tr>
                <th>Código</th>
                    <th>Nome do Produto</th>
                    <th>Preço</th>
                    <th>Comissão</th>
                    <th>Imagem</th>
                    <th>Quantidade</th>
                    
                    
                   
                </tr>
            </thead>
            <tbody>
         
            </tbody>
        </table>
@endif        
    </div>
    <div class="card-footer">
        <button onclick="SalvarEstoque()" class="btn btn-sm btn-primary" role="button">Salvar Estoque</button> /  <button onclick="LimparEstoque()" class="btn btn-sm btn-danger" role="button">Limpar Estoque</button>
    </div>
</div>        

@if(count($produtos) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                <th>Código</th>
                    <th>Nome do Produto</th>
                    <th>Quantidade Disponivel</th>
                    <th>Preço</th>
                    <th>Comissão</th>
                    <th>Classificação</th>
                    <th>Imagem</th>
                    
                    <th> Adicionar Produto</th>
                </tr>
            </thead>
            <tbody>
    @foreach($produtos as $prod)
                <tr>
                    <td>{{$prod->id}}</td>
                    <td>{{$prod->nome}}</td>
                    <td>{{$prod->quantidade}}  </td>
                    <td>R$ {{number_format($prod->preco,2,",",".")}}</td>
                    <td>{{$prod->comissao}}%</td>
                    <td>{{$prod->classificacao}}</td>
                    <td><img src="../../storage/{{$prod->url}}" height="50px" /></td>
                    <td>            <form id="formProduto" enctype="multipart/form-data">
<input type="number" name="quantidade" id="quantidade{{$prod->id}}"></form></td> 
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="adicionar({{$prod->id}},'{{$prod->nome}}', {{$prod->preco}}, '{{$prod->comissao}}%', '{{$prod->url}}')">Adicionar</button>
                       
                    </td>
                </tr>
    @endforeach                
            </tbody>
        </table>
@endif        
    </div>
  



@endsection

@section('javascript')
<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
    
    var estoque = new Array();
    function montarLinha(p) {
        var linha = "<tr>" +
            "<td>" + p.id + "</td>" +
            '<td>' + p.nome + " </td>" +
            "<td>" + p.preco + "</td>" +
            "<td id='preco'>" + p.comissao + "</td>" +
            "<td><img src='../../storage/"+p.url+"' height='50px' alt='"+p.nome+"'/></td>" +
            '<td>'+p.quantidade+'</td>' +
            
            "</tr>";
        return linha;
    }

function adicionar(id, nome, preco, comissao, imagem){
    quantidade = "#quantidade"+id;
   prod = {
          id:id,
          nome:nome,
          preco:preco,
          comissao:comissao,
          url:imagem,
          quantidade:$(quantidade).val(),
          vendedor_id:$("#vendedor").val() 
          
           
   };
                linha = montarLinha(prod);
               
                $('#tabelaestoque>tbody').append(linha);

                estoque.push(prod);
                
              
}


function SalvarEstoque(){
    for(i=0;i<estoque.length;i++) {
               
           
    $.post("/api/estoque", estoque[i], function(data) {
             
        });
       
    }
    alert("Estoque Salvo com Sucesso!");
}

function preencherEstoque(){

$('#tabelaestoque>tbody>').closest('tr').remove()
   if($("#vendedor").val()!='0'){
    $.getJSON('/api/preencherestoque/'+$("#vendedor").val(), function(data) { 
                for(i=0;i<data.length;i++){
                    linha = montarLinha(data[i]);
                    $('#tabelaestoque>tbody').append(linha);
                }
        });
    }
}
function LimparEstoque(){
    $.ajax({
            type: "PUT",
            url: "/api/remover/" + $("#vendedor").val(),
            context: this,
            success: function() {
                console.log('Apagou OK');
               $('#tabelaestoque>tbody>').closest('tr').remove();
                }
                
        });
}
</script> 
@endsection    