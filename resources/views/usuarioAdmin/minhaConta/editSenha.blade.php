@extends('layouts.app')

@section('content')

    <h6>Alterar senha</h6>
    <br>
    <div class="noCentro">
        <div class="box-EditConfigSenha noCentro box-elevado"
                style="width: 350px !important; height: 400px">
            <form id="update_senha" method="POST">
                @csrf
                @include('usuarioAdmin.minhaConta.inc._formSenha')
            </form>
        </div>
    </div>
@endsection
<script type="text/javascript" src="{{ asset('js/userAdmin/minhaConta/formSenha.js') }}" defer></script>
