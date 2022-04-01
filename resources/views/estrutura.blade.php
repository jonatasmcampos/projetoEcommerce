<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ecommerce</title>


        <!-- chamando os icones do bootstrap-->
        <link rel="stylesheet" href={{asset('css/bootstrap-icons.css')}}>
        
    </head>

        <body>

            @yield('conteudo') <!-- chamando conteudo da view welcome -->

        </body>

</html>
