<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- importante para tabs-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" />

    <!-- chamando os icones do bootstrap-->
    <link rel="stylesheet" href={{ asset('css/bootstrap-icons.css') }}>
    <!-- chamando arquivo de css para estilizar a página -->
    <link rel="stylesheet" href={{ asset('css/sass/login/style-login.css') }}>
    <link rel="stylesheet" href={{ asset('css/sass/cadastrar-usuario/style-cadastrar.css') }}>
    <link rel="stylesheet" href={{ asset('css/sass/navbar/style-navbar.css') }}>

    <link rel="stylesheet" href={{ asset('css/sass/style.css') }}>
    
    <!-- CSS DO SIDEBAR -->
    <link rel="stylesheet" href="{{ asset('css/sidebar-css/style.css') }}">

    <!-- CSS DO TABS -->
    <link rel="stylesheet" href="{{ asset('css/tabs/style-tabs.css') }}">
    
    {{-- Materialize --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    @if (!auth()->user())        
        @yield('content-login-register')
    @else
        @include('sidebar.sidebar')        
    @endif

       

    <!-- chamando o js do jquery-->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- chamando o js do siedbar-->
    <script src="{{ asset('js/siedbar.js') }}"></script>
    <!-- chamando o js do bootstrap-->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
   

    <!-- JS DA SIDEBAR -->
    <script src="{{ asset('js/sidebar/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sidebar/jquery.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    
    <script src="{{ asset('js/sidebar/main.js') }}"></script>
    <script src="{{ asset('js/sidebar/popper.js') }}"></script>

</body>

</html>
