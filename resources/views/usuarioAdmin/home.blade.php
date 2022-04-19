@extends('layouts.app')

@section('content')
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    
    <div class="mx-5">
        <a href="{{ route('produto.index') }}">produtos</a>
        <br>
        <a href="{{ route('produto.create') }}">Cadastrar produto</a>
        <br>
        <a href="{{ route('estoque.index') }}">Estoque</a>
        <br>
        <a href="{{ route('categoria.create') }}">Categorias</a>
        <br>
    </div>
@endsection
