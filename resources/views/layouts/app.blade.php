<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- chamando os icones do bootstrap-->
    <link rel="stylesheet" href={{asset('css/bootstrap-icons.css')}}>
    <!-- chamando arquivo de css para estilizar a página -->
    <link rel="stylesheet" href={{asset('css/sass/login/style-login.css')}}>
    <link rel="stylesheet" href={{asset('css/sass/cadastrar/style-cadastrar.css')}}> 
    <link rel="stylesheet" href={{asset('css/sass/style.css')}}>
    <link rel="stylesheet" href={{asset('css/sass/navbar/style-navbar.css')}}>

</head>
<body>
    
    @yield('content')     

    <!-- chamando o js do jquery-->
    <script src="{{asset('js/jquery.js')}}"></script>
    <!-- chamando o js do bootstrap-->
    <script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
