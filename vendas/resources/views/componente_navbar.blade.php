<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
    
        <li @if($current=="BannerPP") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/vendedores">Vendedores</a>
       </li>

       <li @if($current=="BannerPP") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/produtos"> Produtos</a>
       </li>

       <li @if($current=="categorias") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/categorias">Categorias </a>
      </li>
      <li @if($current=="estoque") class="nav-item active" @else class="nav-item" @endif>
      <a class="nav-link" href="/produtos/estoque/vendedor">Estoque Vendedores</a>
    </li>
      <li class="nav-item dropdown">
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

  </div>
</nav>