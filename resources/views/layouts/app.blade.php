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

    <!-- CSS DO TABS -->
    <link rel="stylesheet" href="{{ asset('css/tabs/style-tabs.css') }}">

    <!-- CSS -->
    <link rel="stylesheet" href={{ asset('css/sass/style.css') }}>


    {{-- Materialize --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" integrity="sha512-aD9ophpFQ61nFZP6hXYu4Q/b/USW7rpLCQLX6Bi0WJHXNO7Js/fUENpBQf/+P4NtpzNX0jSgR5zVvPOJp+W2Kg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    @if (!auth()->user())
        @yield('content-login-register')
    @else
        @include('sidebar.sidebar')
    @endif

    <!-- chamando o js do jquery-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- chamando o js do siedbar-->
    <script src="{{ asset('js/siedbar.js') }}"></script>
    <!-- chamando o js do bootstrap-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
   
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
