@extends('layouts.app')

@section('content')


    @include('navbar.navbar')


    {{-- TÍTULOS DOS TABS --}}
    <nav class="mx-4 my-4">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
                role="tab" aria-controls="nav-home" aria-selected="true">
                Produtos
            </button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                Cadastro
            </button>
        </div>
    </nav>

    {{-- CONTEUDO DAS TABS --}}
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            {{-- LISTA DE PRODUTOS --}}
            @if (!$produtos->count())
                <h1>Nenhuma produto cadastrado!</h1>
                <a href="{{ route('produto.create') }}" type="submit">Cadastrar</a>
            @else
                @php
                    $i = 1;
                @endphp
                <div class="col-md-10 mx-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nº</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Desconto</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Estoque</th>
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
                                    <td>
                                        <a href="{{ route('produto.edit', $p->id) }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('produto.destroy', $p->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-excluir" style="padding:0;">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>

                            <?php $i++; ?>
                        @endforeach
                    </table>
                </div>
                <a href="{{ route('produto.create') }}" type="submit">Cadastrar</a>
            @endif
        </div>

        {{-- CADASTRO DE PRODUTOS --}}
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            CADASTRO DE PRODUTOS AQUI
        </div>
    </div>

@endsection
