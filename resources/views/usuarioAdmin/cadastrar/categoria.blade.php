@extends('layouts.app')

<h1>CATEGORIA</h1>
<a href="{{route('home')}}">HOME</a>


<form action="{{route('categoria.store')}}" method="POST" class="container col-6">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Categoria</label>
      <input name="categoria" type="text" class="form-control" id="exampleInputEmail1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="d-flex justify-content-center mx-5">
  @php
      $i = 1
  @endphp
  @foreach ($categorias as $c)
      <h1>Categoria: {{$i}} | {{$c->categoria}}</h1>
      <?php $i++?>
  @endforeach
</div>