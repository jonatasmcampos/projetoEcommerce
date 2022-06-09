<section>

    <header>
        <!-- contact content -->
        <div class="header-content-top d-flex justify-content-center align-items-center">
            <div>
                <img src="{{ asset('img/capa.png') }}" alt="Imagem tema da loja virtual">
            </div>
        </div>
        <!-- / contact content -->
        <div class="container">
            <!-- logo -->
            <div class="logo">
                <span>Bernadete</span>
                <p>
                    Roupas e acessórios
                </p>
            </div>
            <!-- open nav mobile -->

            <nav class="nav-content">
                <!-- nav -->
                <ul class="nav-content-list">
                    <li class="nav-content-item account-login">
                        <label class="open-menu-login-account" for="open-menu-login-account">

                            <input class="input-menu" id="open-menu-login-account" type="checkbox" name="menu" />
                            <span class="login-text">
                                @if (Auth::user())
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user-circle"></i> &nbsp; {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                            {{ __('Sair') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                @else
                                    <a class="btn btn-entrar" href="{{ route('home') }}" role="button">
                                        <i class="fas fa-user-circle"></i> &nbsp; Entrar
                                    </a>
                                @endif
                            </span>
                            <span class="item-arrow"></span>
                        </label>
                    </li>
                    <!-- CARRINHO -->
                    <li class="nav-content-item">
                        <a id="abrir-carrinho" class="nav-content-link" href="#carrinho">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="quantidade">0</span>
                        </a>
                    </li>
                    <!-- FIM CARRINHO -->
                </ul>
            </nav>
        </div>
        <!-- nav navigation commerce -->
        <div class="nav-container">
            <nav class="all-category-nav">
                <label class="open-menu-all" for="open-menu-all">
                    <input class="input-menu-all" id="open-menu-all" type="checkbox" name="menu-open" />
                    <span class="all-navigator"><i class="fas fa-bars"></i> <span>Todas categorias</span> <i
                            class="fas fa-angle-down"></i>
                        <i class="fas fa-angle-up"></i>
                    </span>

                    <ul class="all-category-list">

                        @foreach ($categorias as $cat)
                            <li class="nav-row-list all-category-list-item"><a href="https://www.cupcom.com.br/"
                                    class="nav-row-list-link all-category-list-link">{{ $cat->nome }}</a></li>
                        @endforeach

                    </ul>
                </label>

            </nav>
            <nav class="featured-category">
                <ul class="nav-row">
                    
                    @foreach ($categorias as $cat)
                        <li class="nav-row-list"><a href="https://www.cupcom.com.br/"
                                class="nav-row-list-link">{{ $cat->nome }}</a></li>
                    @endforeach

                </ul>
            </nav>
        </div>
    </header>
</section>