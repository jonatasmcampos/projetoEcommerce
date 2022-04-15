@extends('layouts.app')

@section('content')
    <h1>CATEGORIA</h1>
    <a href="{{ route('home') }}">HOME</a>


    <form action="{{ route('categoria.store') }}" method="POST" class="container col-6">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Categoria</label>
            <input required name="nome" type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="d-flex justify-content-center mx-5 col-md-10">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Produto</th>
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
                                <td><button type="submit">Deletar</button></td>
                            </form>
                        @else
                            <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalContemProduto{{ $c->id }}">Deletar</button></td>
                            <!-- Modal -->

                            <div class="modal fade" id="modalContemProduto{{ $c->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Categoria
                                                <b>{{ $c->nome }}</b> Contém Produto
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
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
                                                data-dismiss="modal">Sair</button>

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
