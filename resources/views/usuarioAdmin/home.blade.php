@extends('layouts.app')

@section('content')

    <div class="container-externo">

        @include('siedbar.siedbar')
      
        {{-- PARTE DO CONTEUDO --}}
        <div class="container-conteudo">

            @include('navbar.navbar')
            
            <div class="mx-5">
                <a href="{{ route('produto.index') }}">produtos</a>
                <br>
                <a href="{{ route('produto.create') }}">Cadastrar produto</a>
                <br>
                <a href="{{ route('estoque.index') }}">Estoque</a>
                <br>
                <a href="{{ route('categoria.create') }}">Categorias</a>
                <br>
            </div>

        </div>
    </div>
@endsection
