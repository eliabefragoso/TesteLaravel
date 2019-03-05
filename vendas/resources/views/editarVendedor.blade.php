@extends('layout.app', ["current" => "categorias"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/vendedores/{{$vendedor->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeCategoria">Nome do Vendedor</label>
                <input type="text" class="form-control" name="nome" 
                       id="nomeVendedor" placeholder="Nome" value="{{$vendedor->nome}}">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Tipo de Vendedor</label>
                <select class="form-control" name="tipo" id="tipo"> 
                            <option value="1"> Vendedor Micro </option>
                            <option value="2"> Vendedor Socio </option>  
                </select>
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Selecione Usuario Vendedor</label>
                <select class="form-control" name="user_id" id="user_id"> 
                             
                </select>
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Rua</label>
                <input type="text" class="form-control" name="rua" 
                       id="ruaVendedor" placeholder="Rua" value="{{$vendedor->rua}}">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Numero</label>
                <input type="text" class="form-control" name="numero" 
                       id="numeroVendedor" placeholder="Numero" value="{{$vendedor->numero}}">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Bairro</label>
                <input type="text" class="form-control" name="bairro" 
                       id="bairroVendedor" placeholder="bairro" value="{{$vendedor->bairro}}">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">CEP</label>
                <input type="text" class="form-control" name="cep" 
                       id="cepVendedor" placeholder="CEP" value="{{$vendedor->cep}}">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
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
			$('#tipo').change(function(){
                //console.log("deu nop");
                if($("#tipo").val()==1){
                    $("#user_id option").remove();
                    vendedor_micro(); 
                }else{
                    $("#user_id option").remove();
                    Vendedor_socio();
                    
                }
                    
			});
		});

    function vendedor_micro() {
        $.getJSON('/api/VendedorMicro', function(data) { 
            for(i=0;i<data.length;i++) {
                opcao = '<option value ="' + data[i].id + '">' + 
                    data[i].name + '</option>';
                   
                $('#user_id').append(opcao);
            }
        });
    }


    function Vendedor_socio() {
        $.getJSON('/api/VendedorSocio', function(data) { 
            for(i=0;i<data.length;i++) {
                opcao = '<option value ="' + data[i].id + '">' + 
                    data[i].name + '</option>';
                   
                $('#user_id').append(opcao);
            }
        });
    }

  </script>   

@endsection