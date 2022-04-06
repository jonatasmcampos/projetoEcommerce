@extends('layouts.app')

<h1>PRODUTOS</h1>

<form action="{{route('produto.store')}}" method="POST" class="col-6">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Produto</label>
        <input name="produto" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Descrição</label>
        <input name="descricao" type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Preço</label>
        <input name="preco" type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Desconto</label>
        <input name="desconto" type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Categoria</label>
        <input name="categoria" type="number" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>




<div>
    <h1>PRODUTOS</h1>
    <div class="d-flex justify-content-center mx-5">
        @php
            $i = 1
        @endphp
        @foreach ($produtos as $p)
            <h1>Produto: {{$i}} | {{$p->produto}} | {{$p->descricao}} | {{$p->preco}} | {{$p->desconto}} | {{$p->categoria->categoria}}</h1>

            <?php $i++?>
        @endforeach
      </div>
</div>
