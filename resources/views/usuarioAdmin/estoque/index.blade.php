@extends('layouts.app')

@section('content')

    @if (!$produtos->count())
        <h1>Nenhuma produto cadastrado</h1>
        <a href="{{ route('produto.create') }}" type="submit">Cadastrar</a>
    @else
        @php
            $i = 1;
        @endphp
        <div class="noCentro my-5">
            <table class="table" style="width: 60%">
                <thead>
                    <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $p)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $p->nome }} </td>
                            <td> {{ $p->estoque->quantidade }} </td>

                            <td style="width: 10% !important">
                                {{-- BOTAO DE EDITAR ESTOQUE --}}
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#modalEditaEstoque{{ $p->estoque->id }}">
                                    <div class="Dica">
                                        <i class="material-icons">edit</i>
                                        <div class="DicaTexto">Editar estoque</div>
                                    </div>
                                </button>
                            </td>
                            <form action="{{ route('estoque.destroy', $p->estoque->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td style="width: 10% !important">
                                    <button style="padding:0" type="submit" class="btn">
                                        <div class="Dica">
                                            <i class="bi bi-file-excel"
                                                style="padding-top: 3px !important; padding-bottom: 3px !important;"></i>
                                            <div class="DicaTexto">Zerar estoque</div>
                                        </div>
                                    </button>
                                </td>
                            </form>
                        </tr>

                        <!-- Modal Edita Estoque -->
                        <div class="modal fade" id="modalEditaEstoque{{ $p->estoque->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Editar estoque de
                                            <b>{{ $p->nome }}</b>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
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
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>

                <?php $i++; ?>
            </table>
        </div>
    @endif

@endsection
