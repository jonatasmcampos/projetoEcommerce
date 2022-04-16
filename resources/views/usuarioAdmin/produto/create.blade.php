@extends('layouts.app')

@section('content')
<h1>Cadastro de Produto</h1>
<a href="{{ route('home') }}" class="btn btn-primary">Home</a>
@if (!$categorias->count())
    <h1>Nenhuma Categoria cadastrada</h1>
    <a href="{{ route('categoria.create') }}" class="btn btn-primary">Cadastrar</a>
@else
    <form action="{{ route('produto.store') }}" method="POST" class="col-6">
        @csrf
        @include('usuarioAdmin.produto.inc._form', [
            'produto' => '',
        ])
    </form>
@endif
@endsection