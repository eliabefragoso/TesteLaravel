@extends('layout.app', ["current" => "Clientes"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/clientes" method="POST" enctype="multipart/form-data">
            @csrf            
            <div class="form-group">
                <label for="nomeCategoria">Nome do cliente:</label>
                <input type="text" class="form-control" name="nome" 
                       id="nomeCliente" placeholder="Cliente">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">CPF:</label>
                <input type="text" class="form-control" name="cpf" 
                       id="cpf" placeholder="CPF">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">RG:</label>
                <input type="text" class="form-control" name="rg" 
                       id="rg" placeholder="RG">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Foto:</label>
                <input type="file" class="form-control" name="foto" 
                       id="foto" placeholder="foto">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">E-mail:</label>
                <input type="text" class="form-control" name="email" 
                       id="email" placeholder="E-mail">
            </div>           
            <div class="form-group">
                <label for="nomeCategoria">Sexo:</label>
                <select class="form-control" name="sexo" id="sexo"> 
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino"> Feminino </option>
                            <option value="Outro"> Outro </option>  
                </select>
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Data de Nascimento:</label>
                <input type="date" class="form-control" name="nascimento" 
                       id="nascimento" >
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Estado Civil:</label>
                <select class="form-control" name="estado_civil" id="estado_civil"> 
                            <option value="Casado">Casado(a)</option>
                            <option value="Solteiro"> Solteiro(a) </option>
                            <option value="Divorciado"> Divorciado(a) </option>  
                            <option value="Viuvo"> Viuvo(a) </option> 
                            <option value="Amazeado"> Amazeado(a) </option>
                                
                </select>
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Dependentes:</label>
                <input type="number" class="form-control" name="dependentes" 
                       id="dependentes" placeholder="Dependentes">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">CEP:</label>
                <input type="text" class="form-control" name="CEP" 
                       id="autocomplete" placeholder="CEP">
            </div>            
            <div class="form-group">
                <label for="nomeCategoria">Estado:</label>
                <input type="text" class="form-control" name="estado" 
                       id="estado" placeholder="estado">
            </div>  
            <div class="form-group">
                <label for="nomeCategoria">Cidade:</label>
                <input type="text" class="form-control" name="cidade" 
                       id="cidade" placeholder="cidade">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Bairro:</label>
                <input type="text" class="form-control" name="Bairro" 
                       id="bairro" placeholder="Bairro">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Rua:</label>
                <input type="text" class="form-control" name="rua" 
                       id="rua" placeholder="Rua">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Numero:</label>
                <input type="number" class="form-control" name="numero" 
                       id="numero">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Complemento:</label>
                <input type="text" class="form-control" name="complemento" 
                       id="complemento" placeholder="Complemento">
            </div>
            
            

            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>

@endsection


@section('javascript')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });


function cep(){
     cep = [];
    $.getJSON('/api/cep/', function(data) { 
             cep = data['CEP'];   
        });          
     return cep; 
}

function rua(){
     rua = [];
    $.getJSON('/api/rua/'+$("#autocomplete").val(), function(data) { 
             rua = data['nome'];   
        });          
     return rua; 
}

function cidade(){
     cidade = [];
    $.getJSON('/api/cidade/', function(data) { 
             for(i=0;i<data.length;i++){
                  cidade.push(data[i].nome);
             }  
             console.log(cidade);
        });          
     return cidade; 
}

function estado(){
     estado = [];
    $.getJSON('/api/estado/', function(data) { 
        for(i=0;i<data.length;i++){
                  estado.push(data[i].nome);
             }  
             console.log(estado);
        });          
     return estado; 
}

$( "#autocomplete" ).autocomplete({
  source: cep()
}); 



$( "#cidade" ).autocomplete({
  source: cidade()
}); 

$( "#estado" ).autocomplete({
  source: estado()
}); 

</script>
@endsection 
