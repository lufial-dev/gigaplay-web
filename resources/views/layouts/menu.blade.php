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
    </ul>

    <form class="form-inline my-2 my-lg-0">
        <div class="border border-white p1">
            <i class="fa fa-search m-2 text-white" aria-hidden="true"></i>
            <input class="bg-black border-search" type="search" placeholder="Buscar..." aria-label="Search">
        </div>                  
    </form>

    <ul class="mr-5 navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="image-user rounded-circle" src="{{ URL('images/default-profile.png') }}" alt="Perfil" width=150>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Configurações</a>
            <div class="dropdown-divider"></div>
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