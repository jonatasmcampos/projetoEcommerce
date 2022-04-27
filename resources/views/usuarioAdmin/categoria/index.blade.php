@extends('layouts.app')

@section('content')
    <h1>CATEGORIA</h1>
    <a href="{{ route('home') }}">HOME</a>


    <form action="{{ route('categoria.store') }}" method="POST" class="container col-6">
        @csrf
        @include('usuarioAdmin.categoria.inc._form')
    </form>
    <div class="d-flex justify-content-center mx-5 col-md-10">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Categoria</th>

                </tr>
            </thead>
            @php
                $i = 1;
            @endphp
            @foreach ($categorias as $c)
                <tbody>
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $c->nome }} </td>

                        @if (!$c->produtos->count())
                            <form action="{{ route('categoria.destroy', $c->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td><button class="btn btn-primary" type="submit">Deletar</button></td>
                            </form>
                        @else
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalContemProduto{{ $c->id }}">Deletar</button></td>
                            <!-- Modal -->
                            <div class="modal fade" id="modalContemProduto{{ $c->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Categoria
                                                <b>{{ $c->nome }}</b> Contém Produto
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group">
                                                <li class="list-group-item active">Produtos</li>
                                                @foreach ($c->produtos as $p)
                                                    <li class="list-group-item">{{ $p->nome }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Sair</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </tr>
                </tbody>

                <?php $i++; ?>
            @endforeach

        </table>


    </div>
@endsection
