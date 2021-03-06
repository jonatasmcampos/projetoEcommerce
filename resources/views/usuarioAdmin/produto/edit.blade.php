@extends('layouts.app')

@section('content')
    @if (Session::has('true'))

        <body onload="msgSuccess('<?php echo Session::get('true'); ?>', 'success')">
    @endif

    <br>
    <h1 class="titulo">Editar produto</h1>
    <br>

    <div>
        <br>
        @if (!$categorias->count())
            <div class="alert alert-warning noCentro" style="flex-direction: column" role="alert">
                <h4 class="alert-heading"><i class="material-icons">feedback</i></h4>
                <h3>
                    Nenhum produto cadastrado!
                </h3>
                <hr>
                <p class="mb-0">
                    <a type="button" class="btn btn-primary" onclick="cadastraProdutoClick()">Cadastrar</a>
                </p>
            </div>
        @else
            <form enctype="multipart/form-data" action="{{ route('produto.update', $produto->id) }}" method="POST">
                @method('PUT')
                @csrf

                @include('usuarioAdmin.produto.inc._form', ['produto' => $produto])

            </form>

            <div style="background-color: #fff; padding: 10px 0 2px 0">
            @include('usuarioAdmin.produto.inc._formImagem', [
                'produto' => $produto,
            ])
            </div>

            <br>
        @endif
    </div>
@endsection
<script type="text/javascript" src="{{ asset('js/userAdmin/produto/edit.js') }}" defer></script>
