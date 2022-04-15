@extends('layouts.app')

@section('content')
    <h1>Editar Prduto</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    <form action="{{ route('produto.update', $produto->id) }}" method="POST" class="col-6">
        @method('PUT')
        @csrf
        @include('usuarioAdmin.forms.formProduto', ['produto' => $produto])
    </form>
@endsection
