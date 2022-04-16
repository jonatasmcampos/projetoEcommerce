@extends('layouts.app')

@section('content')
    <h1>Estoque</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    @if (!$produtos->count())
        <h1>Nenhuma produto cadastrado</h1>
        <a href="{{ route('produto.create') }}" type="submit">Cadastrar</a>
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
                        <th scope="col">Quantidade</th>
                    </tr>
                </thead>
                @foreach ($produtos as $p)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $p->nome }} </td>
                            <td> {{ $p->estoque->quantidade }} </td>

                            <td><button type="button" data-toggle="modal"
                                    data-target="#modalEditaEstoque{{ $p->estoque->id }}">Editar</a></td>
                            <form action="{{ route('estoque.destroy', $p->estoque->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td><button type="submit">Zerar</button></td>
                            </form>
                        </tr>
                    </tbody>

                    <?php $i++; ?>
                    <!-- Modal Edita Estoque -->

                    <div class="modal fade" id="modalEditaEstoque{{ $p->estoque->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Editar estoque de
                                        <b>{{ $p->nome }}</b>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('estoque.update', $p->estoque->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group mx-sm-3 mb-2">

                                            <input name="quantidade" type="number" class="form-control"
                                                id="inputPassword2" value="{{ $p->estoque->quantidade }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">Editar</button>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
        </div>
    @endif

@endsection
