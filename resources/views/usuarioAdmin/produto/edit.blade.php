@extends('layouts.app')

@section('content')
    @if (Session::has('true'))

        <body onload="msgSuccess('<?php echo Session::get('true'); ?>', 'success')">
    @endif

    <h6>Editar Produto</h6>

    @if (!$categorias->count())
        <h1>Nenhuma Produto cadastrado</h1>
    @else
     
        <form enctype="multipart/form-data" action="{{ route('produto.update', $produto->id) }}" method="POST">
            @method('PUT')
            @csrf

            @include('usuarioAdmin.produto.inc._form', ['produto' => $produto])

        </form>

        @include('usuarioAdmin.produto.inc._formImagem', [
            'produto' => $produto,
        ])

    @endif
@endsection
<script type="text/javascript" src="{{ asset('js/userAdmin/produto/edit.js') }}" defer></script>
