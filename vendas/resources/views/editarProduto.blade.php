@extends('layout.app', ["current" => "produtos"])

@section('body')
<?php 
        use App\Categoria;
        $cats = Categoria::all();
        

?>


<div class="card border">
    <div class="card-body">
        <form action="/produtos/{{$prod->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nomeCategoria">Nome do Produto</label>
                <input type="text" class="form-control" name="nome" 
                       id="nomeProduto" placeholder="Nome" value="{{$prod->nome}}">
            </div>            
            <div class="form-group">
                <label for="produtoQuantidade">Quantidade</label>
                <input type="number" class="form-control" name="quantidade" 
                       id="quantiadeProduto" placeholder="Quantidade" value="{{$prod->quantidade}}">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Preço</label>
                <input type="text" class="form-control" name="preco" 
                       id="precoProduto" placeholder="Preço" value="{{$prod->preco}}">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Comissão</label>
                <input type="text" class="form-control" name="comissao" 
                       id="comissaoProduto" placeholder="Comissão" value="{{$prod->comissao}}">
            </div>
            <div class="form-group">
                <label for="nomeCategoria">Classificação</label>
                <select class="form-control" name="classificacao"> 
                            <option value="5"> 5 - Estrelas </option>
                            <option value="4"> 4 - Estrelas </option>
                            <option value="3"> 3 - Estrelas </option>
                            <option value="2"> 2 - Estrelas </option>
                            <option value="1"> 1 - Estrelas </option>
                </select>
            </div>
            <div class="form-group">
                        <label for="url" class="control-label">Imagem</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="url" placeholder="url" name="url">
                        </div>
                    </div>   

                    <div class="form-group">
                        <label for="categoriaProduto" class="control-label">Categoria</label>
                        <div class="input-group">
                           
                            <select class="form-control" name="categoria_id"> 
                                 @foreach($cats as $cat)
                                <option value="{{$cat->id}}"> {{$cat->nome}}</option>
                                 @endforeach 
                            </select>
                    
                        </div>
                    </div>  

            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>

@endsection