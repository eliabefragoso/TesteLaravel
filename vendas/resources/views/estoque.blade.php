<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   
	<title>Cadastrar Produtos no estoque do Vendedor</title>

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/fresh-bootstrap-table.css') }}" rel="stylesheet" />
     
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
      
</head>
<body>

<nav>
  <ul class="primaria">
    <li>
    <a href="/vendedores">Vendedores</a>
      
    </li>
    <li>
    <a  href="/produtos"> Produtos</a>
     
    </li>
    <li>
    <a  href="/categorias">Categorias </a>
      
    </li>
    <li>
      <a href="/produtos/estoque/vendedor">Estoque Vendedores</a>
    </li>
    <li>
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
     
    </li>
  </ul>
</nav>


<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                                
                <div class="fresh-table full-color-blue">
                <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange                  
                        Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
                -->
                
                    <div class="toolbar">
                                    
                    <button id="alertBtn" class="btn btn-default">Salvar</button>
                    </div>
                    
                    <table id="fresh-table" class="table">
                               
                        <thead>
                            <th data-field="id">ID</th>
                        	<th data-field="name" data-sortable="true">Nome</th>
                        	<th data-field="salary" data-sortable="true">Preço</th>
                        	<th data-field="country" data-sortable="true">Quantidade Disponivel</th>
                            <th data-field="city">Comissão</th>
                            <th data-field="quantidade">Quantidade</th>
                        	<th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Actions</th>
                        </thead>
                        <tbody>
                        @foreach($produtos as $prod)
                            <tr>
                            	<td>{{$prod->id}}</td>
                            	<td>{{$prod->nome}}</td>
                            	<td>R$ {{number_format($prod->preco,2,",",".")}}</td>
                            	<td>{{$prod->quantidade}} </td>
                                <td>{{$prod->comissao}}%</td>
                                <td>0000</td>
                            	<td></td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
                
                
            </div>
        </div>
    </div>
</div>

</body>
    <script type="text/javascript" src="{{ asset('js/jquery-1.11.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-table.js')}}"></script>

    <script type="text/javascript">
        var $table = $('#fresh-table'),
            $alertBtn = $('#alertBtn'),
            full_screen = false;
            
        $().ready(function(){
            $table.bootstrapTable({
                toolbar: ".toolbar",
    
                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                striped: true,
                pageSize: 8,
                pageList: [8,10,25,50,100],
                
                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    //do nothing here, we don't want to show the text "showing x of y from..." 
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'fa fa-minus-circle'
                }
            });
            
                        
            
            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });
    
            
            window.operateEvents = {
                'click .like': function (e, value, row, index) {
                    alert('You click like icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);
                },
                'click .edit': function (e, value, row, index) {
                    alert('You click edit icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);    
                },
                'click .remove': function (e, value, row, index) {
                    $table.bootstrapTable('remove', {
                        field: 'id',
                        values: [row.id]
                    });
            
                }
            };
            
            $alertBtn.click(function () {
                alert("You pressed on Alert");
            });
            
        });
            
    
        function operateFormatter(value, row, index) {
            return [
                '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
                    '<i class="fa fa-heart"></i>',
                '</a>',
                '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
                    '<i class="fa fa-edit"></i>',
                '</a>',
                '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
                    '<i class="fa fa-remove"></i>',
                '</a>'
            ].join('');
        }
    
            
    </script>
</html>