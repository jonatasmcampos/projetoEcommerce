@extends('layouts.app')

@section('content')
    @if (Session::has('true'))

        <body onload="msgSuccess('<?php echo Session::get('true'); ?>', 'success')">
    @endif

    <h1>Editar Produto</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    @if (!$categorias->count())
        <h1>Nenhuma Produto cadastrado</h1>
    @else
        @include('usuarioAdmin.produto.inc._formImagem', [
            'produto' => $produto,
        ])

        <form enctype="multipart/form-data" action="{{ route('produto.update', $produto->id) }}" method="POST">
            @method('PUT')
            @csrf

            @include('usuarioAdmin.produto.inc._form', ['produto' => $produto])

        </form>
    @endif
@endsection
<script type="text/javascript" src="{{ asset('js/userAdmin/produto/edit.js') }}" defer></script>
