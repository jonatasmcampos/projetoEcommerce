@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <a href="{{route('categoria.create')}}">Cadastrar categoria</a>
        <br>
        <a href="{{route('produto.create')}}">Cadastrar produto</a>
    </div>
@endsection
