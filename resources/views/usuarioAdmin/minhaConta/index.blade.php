@extends('layouts.app')

@section('content')
    <div class="container-externo">

        {{-- PARTE DA SIEDBAR COM ICONES --}}
        <div class="container-siedbar-icons">
            <div class="box-menu">
                <i class="bi bi-list d-flex justify-content-center"></i>
            </div>
            <div class="box-opcoes-icones">
                <i class="bi bi-house-fill"></i>
            </div>
        </div>

        {{-- PARTE DA SIEDBAR --}}
        <div class="container-siedbar">
            {{-- NOME DA EMPRESA --}}
            <div class="box-empresa">
                <a href="#" class="d-flex justify-content-center" style="letter-spacing: 3px;">Empresa</a>
            </div>
            {{-- AS OPCOES DO ADMIN --}}
            <div class="box-opcoes">
                <a href="#">Dashboarda</a>
            </div>
        </div>

        {{-- PARTE DO CONTEUDO --}}
        <div class="container-conteudo">

            @include('navbar.navbar')
            <form action="{{ route('mihaConta.store') }}" method="POST" enctype="multipart/form-data">
                {{-- @method('PUT') --}}
                @csrf
                @include('usuarioAdmin.minhaConta.inc._form', ['user', $user->foto])
            </form>
        </div>
    </div>
@endsection
