@extends('layouts.app')

@section('content')
    <h1>Editar Produto</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    @if (!$categorias->count())
        <h1>Nenhuma Produto cadastrado</h1>
    @else
        <form action="{{ route('produto.update', $produto->id) }}" method="POST" class="col-6">
            @method('PUT')
            @csrf
            @include('usuarioAdmin.produto.inc._form', [
                'produto' => $produto,
            ])
        </form>
    @endif
@endsection