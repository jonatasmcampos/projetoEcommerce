<nav class="container-navbar">

    <div class="box-link noCentro">

        <p class="empresa">Empresa</p>

    </div>

    <div class="box-perfil noCentro">

        {{-- VERIFICA SE O USUARIO ESTA LOGADO PARA MOSTRAR LOGIN
             OU SE JA ESTA LOGADO MOSTRAR O NOME DELE --}}
        @guest
            @if (Route::has('login'))
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <div class="dropdown">
                {{-- BOTAO COM NOME DO USUARIO --}}
                <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                {{-- BOTAO DE LOGOUT --}}
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Sair
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
        @endguest
    </div>
</nav>




{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
     <div class="container">
         <a class="navbar-brand" href="{{ url('/') }}">
             {{ config('app.name', 'Laravel') }}
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <!-- Left Side Of Navbar -->
             <ul class="navbar-nav me-auto">

             </ul>

             <!-- Right Side Of Navbar -->
             <ul class="navbar-nav ms-auto">
                 <!-- Authentication Links -->
                 @guest
                     @if (Route::has('login'))
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                         </li>
                     @endif

                     @if (Route::has('register'))
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                         </li>
                     @endif
                 @else
                     <li class="nav-item dropdown">

                         <div class="dropdown">
                            
                             <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                 {{ Auth::user()->name }}
                             </button>
                        
                             <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                 <li>
                                     <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                       document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                     </a>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                         class="d-none">
                                         @csrf
                                     </form>
                                 </li>
                             </ul>
                         </div>


                     </li>
                 @endguest
             </ul>
         </div>
     </div>
 </nav> --}}
