<section>

    <header>
        <!-- contact content -->
        <div class="header-content-top d-flex justify-content-center align-items-center">
            <div>
                <img src="{{asset('img/capa.png')}}" alt="Imagem tema da loja virtual">
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

                            <i class="fas fa-user-circle"></i><span class="login-text">Hello, Sign in <strong>Create
                                    Account</strong></span> <span class="item-arrow"></span>

                            <!-- submenu -->
                            <ul class="login-list">
                                <li class="login-list-item"><a href="https://www.cupcom.com.br/">My account</a></li>
                                <li class="login-list-item"><a href="https://www.cupcom.com.br/">Create account</a></li>
                                <li class="login-list-item"><a href="https://www.cupcom.com.br/">logout</a></li>
                        </label>
                </ul>
                </li>
                <li class="nav-content-item"><a class="nav-content-link" href="https://www.cupcom.com.br/"><i
                            class="fas fa-heart"></i></a></li>
                <li class="nav-content-item"><a class="nav-content-link" href="https://www.cupcom.com.br/"><i
                            class="fas fa-shopping-cart"></i></a></li>
                <!-- call to action -->
                </ul>
            </nav>
        </div>
        <!-- nav navigation commerce -->
        <div class="nav-container">
            <nav class="all-category-nav">
                <label class="open-menu-all" for="open-menu-all">
                    <input class="input-menu-all" id="open-menu-all" type="checkbox" name="menu-open" />
                    <span class="all-navigator"><i class="fas fa-bars"></i> <span>All category</span> <i
                            class="fas fa-angle-down"></i>
                        <i class="fas fa-angle-up"></i>
                    </span>

                    <ul class="all-category-list">
                        <li class="all-category-list-item"><a href="https://www.cupcom.com.br/"
                                class="all-category-list-link">Smartphones<i class="fas fa-angle-right"></i></a>
                            <div class="category-second-list">
                                <ul class="category-second-list-ul">
                                    <li class="category-second-item"><a href="https://www.cupcom.com.br/">Iphone 10</a>
                                    </li>
                                    <li class="category-second-item"><a href="https://www.cupcom.com.br/">Galaxy Note
                                            10</a></li>
                                    <li class="category-second-item"><a href="https://www.cupcom.com.br/">Motorola One
                                        </a></li>
                                    <li class="category-second-item"><a href="https://www.cupcom.com.br/">Galaxy A80
                                        </a></li>
                                    <li class="category-second-item"><a href="https://www.cupcom.com.br/">Galaxy M </a>
                                    </li>
                                    <li class="category-second-item"><a href="https://www.cupcom.com.br/">Huaway P30
                                        </a></li>
                                </ul>

                                <div class="img-product-menu"><img src="https://i.ibb.co/Vvndkmy/banner.jpg"></div>
                            </div>
                        </li>
                        <li class="all-category-list-item"><a href="https://www.cupcom.com.br/"
                                class="all-category-list-link">Furniture <i class="fas fa-angle-right"></i></a></li>
                        <li class="all-category-list-item"><a href="https://www.cupcom.com.br/"
                                class="all-category-list-link">Toys<i class="fas fa-angle-right"></i></a></li>
                        <li class="all-category-list-item"><a href="https://www.cupcom.com.br/"
                                class="all-category-list-link">Computing<i class="fas fa-angle-right"></i></a></li>
                        <li class="all-category-list-item"><a href="https://www.cupcom.com.br/"
                                class="all-category-list-link">Games<i class="fas fa-angle-right"></i></a></li>
                        <li class="all-category-list-item"><a href="" class="all-category-list-link">Automotive<i
                                    class="fas fa-angle-right"></i></a></li>

                    </ul>
                </label>

            </nav>
            <nav class="featured-category">
                <ul class="nav-row">
                    <li class="nav-row-list"><a href="https://www.cupcom.com.br/"
                            class="nav-row-list-link">Smartphones</a></li>
                    <li class="nav-row-list"><a href="https://www.cupcom.com.br/"
                            class="nav-row-list-link">furniture</a></li>
                    <li class="nav-row-list"><a href="https://www.cupcom.com.br/" class="nav-row-list-link">Toys</a>
                    </li>
                    <li class="nav-row-list"><a href="https://www.cupcom.com.br/"
                            class="nav-row-list-link">Computing</a></li>
                    <li class="nav-row-list"><a href="https://www.cupcom.com.br/" class="nav-row-list-link">Games</a>
                    </li>
                    <li class="nav-row-list"><a href="https://www.cupcom.com.br/"
                            class="nav-row-list-link">Automotive</a></li>
                </ul>
            </nav>
        </div>
    </header>


    {{-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #81b29a;">
        <div class="container-fluid" style="padding: 0 50px !important">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="btn-group hover_drop_down">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                aria-expanded="false">
                                Dropdown
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div>
                    @if (Auth::user())
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    @else
                        <a class="btn btn-entrar" href="{{ route('home') }}" role="button">
                            <i class="bi bi-person-circle"></i> Entrar
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav> --}}



    {{-- <nav class="navbar navbar-light justify-content-center" style="background-color: #81b29a;">
        <!-- Navbar content -->
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <div class="btn-group hover_drop_down">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
                        Dropdown
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                @if (Auth::user())
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    <a class="btn btn-entrar" href="{{ route('home') }}" role="button">
                        <i class="bi bi-person-circle"></i> Entrar
                    </a>
                @endif
            </li>
        </ul>
    </nav> --}}
</section>
