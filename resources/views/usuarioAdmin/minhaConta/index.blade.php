@extends('layouts.app')

@section('content')
    <div class="container-externo">

        {{-- PARTE DO CONTEUDO --}}
        <div class="container-conteudo">

            @include('navbar.navbar',['titulo' => 'Minha Conta'])
            @include('usuarioAdmin.minhaConta.inc._menus')

        </div>
    </div>
@endsection
