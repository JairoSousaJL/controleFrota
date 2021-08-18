<nav class="navbar navbar-expand-sm bg-red navbar-dark">
    <a class="navbar-brand" href="{{route('painel')}}" title="Painel"><span class="fas fa-home"></span> |</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarAdministrator" aria-controls="navbarAdministrator" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-nav" id="navbarAdministrator">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-users"></span>
                    Clientes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('createCliente')}}"><span class="fas fa-user-plus"></span> Cadastro</a>
                    <a class="dropdown-item" href="{{route('clientes')}}"><span class="fas fa-search"></span> Cosultar</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-car"></span>
                    Veículos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('createVeiculo')}}"><span class="fas fa-plus"></span> Cadastro</a>
                    <a class="dropdown-item" href="{{route('veiculos')}}"><span class="fas fa-search"></span> Consultar Veículos</a>
                    <a class="dropdown-item" href="{{route('createVenda')}}"><span class="fas fa-money-check-alt"></span> Nova Venda</a>
                    <a class="dropdown-item" href="{{route('vendas')}}"><span class="fas fa-search-dollar"></span> Consultar Vendas</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-cash-register"></span>
                    Caixa
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('createEntrada')}}"><span class="fas fa-money-bill-alt"></span> Entradas</a>
                    <a class="dropdown-item" href="{{route('entradas')}}"><span class="fas fa-search-plus"></span> Consultar Entradas</a>
                    <a class="dropdown-item" href="{{route('createSaida')}}"><span class="fas fa-file-invoice-dollar"></span> Saídas</a>
                    <a class="dropdown-item" href="{{route('saidas')}}"><span class="fas fa-search-minus"></span> Consultar Saídas</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-random"></span>
                    Transações
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('createTransferencia')}}"><span class="fas fa-exchange-alt"></span> Transferências</a>
                    <a class="dropdown-item" href="{{route('transferencias')}}"><span class="fas fa-search"></span> Consultar Transferências</a>
                    <a class="dropdown-item" href="{{route('createComunicado')}}"><span class="fas fa-comment-dollar"></span> Comunicado de Vendas</a>
                    <a class="dropdown-item" href="{{route('comunicados')}}"><span class="fas fa-search"></span> Consultar Comunicado de Vendas</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{route('relatorios')}}"> Relatórios</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-user-tie"></span>
                    Usuários
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('createUsuario')}}"><span class="fas fa-user-plus"></span> Cadastrar</a>
                  <a class="dropdown-item" href="{{route('usuarios')}}"><span class="fas fa-search"></span> Consultar</a>
                </div>
              </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Bem Vindo {{ Auth::user()->nomeAdministrador }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('showPerfil', Auth::user()->id)}}"><span class="fas fa-user-cog"></span> Editar Perfil</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('logoutAdmin')}}" id="navbarexit">
                    <span class="fas fa-sign-out-alt"></span>
                    Sair
                </a>
            </li>
            </ul>
    </div>
  </nav>