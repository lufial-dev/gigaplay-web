@php
    $permissaoConteudo = $user->permissao("Conteúdo");
    $permissaoServico = $user->permissao("Serviço");
    $permissaoCategoria = $user->permissao("Categoria");
    $permissaoFuncionario = $user->permissao("Funcionário");
    $permissaoCliente = $user->permissao("Cliente");
    $permissaoGrupo = $user->permissao("Grupo");
    $permissaoPermissao = $user->permissao("Permissão");

@endphp

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Início <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Séries</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Filmes</a>
        </li>

        @if($user->tipo == "Funcionário")
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opções de Administrador
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if($permissaoCliente and $permissaoCliente->ver)
                        <a id="btn-gerenciar-cliente" class="dropdown-item" href="" data-toggle="modal" data-target="#clienteModal">Gerenciar Clientes</a>
                    @endif

                    @if($permissaoFuncionario and $permissaoFuncionario->ver)
                        <a id="btn-gerenciar-funcionario" class="dropdown-item" href="" data-toggle="modal" data-target="#funcionarioModal">Gerenciar Funcionários</a>
                    @endif

                    @if($permissaoServico and $permissaoServico->ver)
                        <a id="btn-gerenciar-servico" class="dropdown-item" href="" data-toggle="modal" data-target="#servicoModal">Gerenciar Serviços</a>
                    @endif

                    @if($permissaoCategoria and $permissaoCategoria->ver)
                        <a id="btn-gerenciar-categoria" class="dropdown-item" href="" data-toggle="modal" data-target="#categoriaModal">Gerenciar Categorias</a>
                    @endif

                    @if($permissaoConteudo and $permissaoConteudo->ver)
                        <a id="btn-gerenciar-conteudo" class="dropdown-item" href="" data-toggle="modal" data-target="#conteudoModal">Gerenciar Conteúdos</a>
                    @endif

                    @if($permissaoGrupo and $permissaoGrupo->ver)
                        <a id="btn-gerenciar-grupo" class="dropdown-item" href="" data-toggle="modal" data-target="#grupoModal">Gerenciar Grupo</a>
                    @endif

                </div>
            </li>
        @endif
    </ul>

    <form class="form-inline my-2 my-lg-0">
        <div class="border border-white p1">
            <i class="fa fa-search m-2 text-white" aria-hidden="true"></i>
            <input class="bg-black border-search" type="search" placeholder="Buscar..." aria-label="Search">
        </div>                  
    </form>
    
    <ul class="navbar-nav">
        @if($user->tipo == "Funcionário" && $permissaoConteudo->adicionar)
            <li class="nav-item">
                <button id="btn-add-conteudo" class="btn btn-primary btn-sm mt-2 mr-3 ml-4" title="Adicionar conteúdo"
                     data-toggle="modal" data-target="#addConteudoModal" onclick="loadModalConteudoServicos()">
                    <i class="fa fa-upload"></i>
                </button>
            </li>
        @endif
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="image-user rounded-circle" src="{{ URL('images/default-profile.png') }}" alt="Perfil" width=150>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <p class="dropdown-item">{{ $user->nome }}<p>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Configurações</a>
            
                <a class="dropdown-item" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Sair') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</div>

@include('modals.conteudo.view')
@include('modals.conteudo.create')
@include('modals.conteudo.detalhes')
@include('modals.conteudo.player')


@include('modals.servico.view')

@include('modals.categoria.view')

@include('modals.funcionario.view')

@include('modals.cliente.view')


@include('modals.permissao.view')

@include('modals.grupo.view')


