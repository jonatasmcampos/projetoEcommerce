@extends('layouts.app')

@section('content')
    <h1>PRODUTOS</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    @if (!$categorias->count())
        <h1>Nenhuma categoria cadastrada</h1>
    @else
        <form action="{{ route('produto.store') }}" method="POST" class="col-6">
            @csrf
            @include('usuarioAdmin.forms.formProduto', ['produto' => ''])
        </form>
        <h1>PRODUTOS</h1>

        @php
            $i = 1;
        @endphp
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">categoria</th>
                        <th scope="col">desconto</th>
                        <th scope="col">preço</th>
                    </tr>
                </thead>
                @foreach ($produtos as $p)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $p->nome }} </td>
                            <td> {{ substr($p->descricao, 0, 10) }} </td>
                            <td>{{ $p->categoria->nome }} </td>
                            <td>{{ $p->desconto }} </td>
                            <td>{{ $p->preco }}</td>
                            <td><a href="{{ route('produto.edit', $p->id) }}">Editar</a></td>
                            <form action="{{ route('produto.destroy', $p->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                            <td><button type="submit">Deletar</button></td>
                        </form>
                        </tr>
                    </tbody>

                    <?php $i++; ?>
                @endforeach
            </table>
        </div>
    @endif

@endsection
