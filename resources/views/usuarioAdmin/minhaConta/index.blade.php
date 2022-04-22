@extends('layouts.app')

@section('content')
    @include('navbar.navbar')
    <form action="{{route('mihaConta.update', auth()->user()->id)}}" method="POST">
        @method('PUT')
        @csrf
        @include('usuarioAdmin.minhaConta.inc._form')
    </form>
@endsection
