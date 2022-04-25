@extends('layouts.app')

@section('content')
    <div class="container-externo">

        {{-- PARTE DO CONTEUDO --}}
        <div class="container-conteudo">

            @include('navbar.navbar')

            @include('usuarioAdmin.minhaConta.inc._menus')
            <div class="mx-5">
                <form id="update_senha" method="POST">
                    @csrf
                    @include('usuarioAdmin.minhaConta.inc._formSenha')
                </form>
            </div>

        </div>
    </div>
@endsection
<script type="text/javascript" src="{{ asset('js/formSenha.js') }}" defer></script>
