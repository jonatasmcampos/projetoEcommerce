@extends('layouts.app')

@section('content')
    
    <h6>Categorias</h6>
    <br>

    <form action="{{ route('categoria.store') }}" method="POST" class="container col-6">
        @csrf
        @include('usuarioAdmin.categoria.inc._form')
    </form>

    <div class="noCentro my-5">
        <table class="table" style="width: 50%">
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
                    <tr style="border: 1px solid black;">
                        <td class="col-1">{{ $i }}</td>
                        <td>{{ $c->nome }} </td>

                        @if (!$c->produtos->count())
                            <form action="{{ route('categoria.destroy', $c->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td>
                                    <button class="btn" type="submit">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                            </form>
                        @else
                            <td style="width: 10% !important">
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#modalContemProduto{{ $c->id }}">
                                    <i class="material-icons">delete</i>
                                </button>
                            </td>
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
