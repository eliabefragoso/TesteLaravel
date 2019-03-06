@extends('layout.app', ["current" => "Rotas"])
@section('css')
<link href="{{ asset('css/cidade.css') }}" rel="stylesheet">
@endsection
@section('body')
<?php 
        use App\Estado;
        $estado = Estado::all();
        

?>


<div class="card border">
    <div class="card-body">
        <form action="/rotas" method="POST">
            @csrf
            <div class="form-group">
                        <label for="categoriaProduto" class="control-label">Selecione o Estado</label>
                        <div class="input-group">
                           
                            <select class="form-control" name="estado_id" id="estados"> 
                            <option value=""> Selecione o Estado</option>
                            
                                 @foreach($estado as $et)
                                 
                                <option value="{{$et->id}}"> {{$et->nome}}</option>                                
                                 @endforeach 
                                 <option value="0"> Outro</option>
                            </select>
                    
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="categoriaProduto" class="control-label">Selecione As cidadades de rotas</label>    
                <div class="blocos" id="meus-amigos">
                <ul id="dentro">
               
                 
                <li><input type="checkbox" name="j[]" class="hget_value" value="0" id="id_tag" /> Outra </li>

                </ul>
                
                </div>
                </div>

            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>
<!-- Cadastro de Estado-->
<div class="modal" tabindex="-1" role="dialog" id="dlgestado">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <form class="form-horizontal" id="formEstado">
                <div class="modal-header">
                    <h5 class="modal-title">Informe o novo Estado</h5>
                </div>
                <div class="modal-body">

                    
                    <div class="form-group">
                        <label for="nomeEstado" class="control-label">Estado:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nomeEstado" placeholder="Estado">
                        </div>
                    </div>
                </div>
                

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<!-- Cadastro de Cidade-->
<div class="modal" tabindex="-1" role="dialog" id="dlcidade">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <form class="form-horizontal" id="formCidade">
                <div class="modal-header">
                    <h5 class="modal-title">Informe a nova cidade</h5>
                </div>
                <div class="modal-body">
                   

                    
                    <div class="form-group">
                        <label for="nomeCidade" class="control-label">Cidade:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nomeCidade" placeholder="Cidade">
                        </div>
                    </div>
                </div>
               

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div> 

@endsection

@section('javascript')
<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    $(function(){
			$('#id_tag').change(function(){
			novaCidade();
             
			});
		});        

    $('#estados').change(function(){
        $( ".get_value" ).remove();
                if($("#estados").val()==0){
                    novoEstado();
                }else{

                    cidades();
                }
                
		});
        function novoEstado() {
        $('#nomeEstado').val(''); 
        $('#dlgestado').show();
    }

    function novaCidade() {
        $('#nomeCidade').val(''); 
        $('#dlcidade').show();
    }


    function montarEstado(a){
           var linha = '<option value="'+a[0]["id"]+'" selected>'+a[0]["nome"]+'</option>';
           return linha;
       }

       function criarEstado() {
           console.log("criarAutor()");
        estado = { 
            nome: $("#nomeEstado").val(), 
        };
        $.post("/api/estado1/", estado, function(data) {
            $('#dlgestado').hide();
            a = JSON.parse(data);  
            linha = montarEstado(a);
            $('#estados').append(linha);
        });
    } 
    function montarCidade(cidade){
        var linha = '<li class="get_value"><input type="checkbox" name="cidade[]" class="get_value" value="'+cidade[0]["id"]+'"/>'+cidade[0]["nome"]+'</li>';
        return linha;
    }

    function montarCidadeS(cidade){
        var linha = '<li class="get_value"><input type="checkbox" name="cidade[]" id="ckcidade" class="get_value" value="'+cidade.id+'"/>'+cidade.nome+'</li>';
        return linha;
    }
//Preencher campos de cidade 
    function criarCidade() {
        cidade = { 
            nome: $("#nomeCidade").val(), 
            estado_id: $("#estados").val() 
        };
        $.post("/api/cidade1/", cidade, function(data) {
            $('#dlcidade').hide();
            tag = JSON.parse(data);  
            linha = montarCidade(tag);            
            $('#dentro').append(linha);
            $('id_tag').prop('', false);
            $('#id_tag').prop('checked', false);
            console.log(tag);
        });
    }    


    function cidades(){
        var estado_id = $("#estados").val();
        $.getJSON('/api/cidade/'+estado_id, function(data) { 
             for(i=0;i<data.length;i++){
               
                linha = montarCidadeS(data[i]);            
                $('#dentro').append(linha);
                console.log(data[i].nome);
             }  
             
        }); 
    }

     $("#formEstado").submit( function(event){ 
        event.preventDefault(); 
       
        criarEstado();
                     
    });

    $("#formCidade").submit( function(event){ 
        event.preventDefault(); 
       
            criarCidade();
                     
    });
   

</script>


@endsection