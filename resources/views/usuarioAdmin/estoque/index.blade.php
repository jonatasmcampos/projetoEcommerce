@extends('layouts.app')

@section('content')

    <h6>Estoque</h6>
    <br>

    @if (!$produtos->count())
        <h1>Nenhuma produto cadastrado</h1>
        <a href="{{ route('produto.create') }}" type="submit">Cadastrar</a>
    @else
        @php
            $i = 1;
        @endphp
        <div class="noCentro my-5 box-elevado">
            <table class="table my-3 mx-3" style="width: 100%">
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
                            <th style="width: 70px !important" scope="row">{{ $i }}</th>
                            <td>{{ $p->nome }} </td>
                            <td style="width: 70px !important;"> {{ $p->estoque->quantidade }} </td>

                            <td style="width: 70px !important;">
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
                                {{-- BOTAO ZERAR ESTOQUE --}}
                                <td style="width: 70px !important">
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
                                    </div>
                                    <form action="{{ route('estoque.update', $p->estoque->id) }}" method="POST">
                                        <div class="modal-body">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group mx-sm-3 mb-2">
                                                <input name="quantidade" type="number" class="form-control"
                                                    id="inputPassword2" value="{{ $p->estoque->quantidade }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Fechar
                                            </button>
                                        </div>
                                    </form>
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
