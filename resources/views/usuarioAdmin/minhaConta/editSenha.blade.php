@extends('layouts.app')

@section('content')

    <br>
    <h1 class="titulo">Alterar senha</h1>
    <br>
    <div style="display: flex; justify-content: center; width: 100%">
        <div class="box-form-config">
            <form id="update_senha" method="POST">
                @csrf
                @include('usuarioAdmin.minhaConta.inc._formSenha')
            </form>
        </div>
    </div>
@endsection
<script type="text/javascript" src="{{ asset('js/userAdmin/minhaConta/formSenha.js') }}" defer></script>
