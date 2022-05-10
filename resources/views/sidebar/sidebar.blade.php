<aside class="wrapper d-flex align-items-stretch">

    <!-- SIDEBAR -->
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
            </button>
        </div>
        <div class="img bg-wrap text-center py-4" style="background-image: url(img/arvore-por-do-sol.png);">
            <div class="user-logo">
                <div class="img" style="background-image: url(images/logo.jpg);"></div>
                <h3>Usuario</h3>
            </div>
        </div>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="{{ route('home') }}"><span class="fa fa-home mr-3"></span> Dashboard</a>
            </li>
            <li>
                <a href="#" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCadastro"
                    aria-expanded="false" aria-controls="collapseExample">
                    <span class="fa fa-book mr-3"></span>
                    Cadastros
                </a>

                <div class="collapse" id="collapseCadastro">
                    <div class="card card-body">
                        <a class="card-link" href="{{ route('produto.index') }}">Produtos</a>
                        <a class="card-link" href="{{ route('estoque.index') }}">Estoque</a>
                        <a class="card-link" href="{{ route('categoria.create') }}">Categorias</a>
                        <a class="card-link" href="{{ route('tamanho.index') }}">Tamanhos</a>
                        <a class="card-link" href="{{ route('home') }}">Descontos</a>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConfig"
                    aria-expanded="false" aria-controls="collapseExample">
                    <span class="fa fa-cog mr-3"></span>
                    Configurações
                </a>

                <div class="collapse" id="collapseConfig">
                    <div class="card card-body">
                        <a class="card-link" href="{{ route('edit_configuracao') }}">Minha conta</a>
                        <a class="card-link" href="{{ route('edit_senha') }}">Alterar senha</a>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <span class="fa fa-sign-out mr-3"></span> Sair</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>

    </nav>

    <!-- CONTEUDO DO ECOMMERCE AQUI -->
    <div id="content">

        @yield('content')

    </div>

</aside>
