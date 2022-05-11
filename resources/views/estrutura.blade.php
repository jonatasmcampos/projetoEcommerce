<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ecommerce</title>


        <!-- chamando os icones do bootstrap-->
        <link rel="stylesheet" href={{asset('css/bootstrap-icons.css')}}>
        <!-- chamando arquivo de css para estilizar a página -->
        <link rel="stylesheet" href={{asset('css/sass/styleUsuario.css')}}>

        {{-- Materialize --}}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
    </head>

        <body>

            @yield('conteudo') <!-- chamando conteudo da view welcome -->

            <!-- chamando o js do jquery-->
            <script src="{{asset('js/jquery.js')}}"></script>
            <!-- chamando o js do bootstrap-->
            <script src="{{asset('js/bootstrap.js')}}"></script>
        </body>

</html>
