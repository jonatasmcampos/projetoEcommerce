@extends('layouts.app')

@section('content')
    <div class="box-EditConfigSenha noCentro">
        <form id="update_senha" method="POST">
            @csrf
            @include('usuarioAdmin.minhaConta.inc._formSenha')
        </form>
    </div>
@endsection
<script type="text/javascript" src="{{ asset('js/userAdmin/minhaConta/formSenha.js') }}" defer></script>
