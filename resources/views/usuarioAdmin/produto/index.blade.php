@extends('layouts.app')

@section('content')
    <h1>PRODUTOS</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    @if (!$produtos->count())
        <h1>Nenhuma produto cadastrado</h1>
        <a href="{{route('produto.create')}}" type="submit">Cadastrar</a>
    @else                                                               
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
                        <th scope="col">estoque</th>
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
                            <td>{{ $p->estoque->quantidade }} </td>
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
        <a href="{{route('produto.create')}}" type="submit">Cadastrar</a>
    @endif

@endsection
