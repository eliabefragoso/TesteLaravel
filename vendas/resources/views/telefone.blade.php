@extends('layout.app', ["current" => "Telefones"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form  id="formProduto">
            @csrf
            <input type="hidden" name="cliente_id" value="{{$cliente_id}}" id="cliente_id"> 
            <div class="form-group">
                <label for="nomeCategoria">DDD:</label>
                <input type="text" class="form-control" name="ddd" 
                       id="ddd" placeholder="DDD">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Numero:</label>
                <input type="text" class="form-control" name="numero" 
                       id="numero" placeholder="numero">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Tipo de telefone:</label>
                <select name="tipo" class="form-control" id="tipo">
                <option value="Whatsapp"> Whatsapp </option>
                <option value="celular"> Celuar </option>
                <option value="fixo residencial"> Fixo Residencial </option>
                <option value="fixo trabalho"> Fixo Trabalho </option>                            
             </select>
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Operadora:</label>
                <input type="text" class="form-control" name="operadora" 
                       id="operadora" placeholder="numero">
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
    
    function salvarTelefone(){
        
        telefone = { 
            ddd: $("#ddd").val(), 
            numero: $("#numero").val(), 
            tipo: $("#tipo").val(), 
            operadora: $("#operadora").val(),
            cliente_id: $("#cliente_id").val()
        };

        $.post("/api/telefone", telefone, function(data) {
            $('#ddd').val('');
            $('#numero').val('');
            $('#tipo').val(''); 
            $('#operadora').val(''); 
            alert(data); 
             
        });
   
    }



    $("#formProduto").submit( function(event){ 
        event.preventDefault(); 
        salvarTelefone();
            
        $("#dlgProdutos").modal('hide');
    });

</script>


@endsection