@extends('layouts.app')

@section('content')

    <div class="container-externo">

        @include('siedbar.siedbar')
      
        {{-- PARTE DO CONTEUDO --}}
        <div class="container-conteudo">

            @include('navbar.navbar')
            
            <h1>Conteúdo</h1>

        </div>
    </div>
@endsection
