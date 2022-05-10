@extends('layouts.app')

@section('content')

    <br>
    <h1 class="titulo">Estoque</h1>
    <br>

    <div>
        @if (!$produtos->count())
            <h1>Nenhuma produto cadastrado</h1>
            <a href="{{ route('produto.create') }}" type="submit">Cadastrar</a>
        @else
            @php
                $i = 1;
            @endphp

            <section class="ftco-section bg-table mx-auto">
                <div class="container">
                    <div class="row">
                        <div style="padding:0;" class="col-12">
                            <div class="table-wrap" >
                                <table style="width: 70%;" class="table mx-auto">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th style="width: 70px">Nº</th>
                                            <th>Produto</th>
                                            <th style="width: 70px">Tam</th>
                                            <th class="col-3">Cor</th>
                                            <th style="width: 70px;">Estoque</th>
                                            <th style="width: 70px">&nbsp;</th>
                                            <th style="width: 70px">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produtos as $p)
                                            <tr class="alert" role="alert">
                                                <td>
                                                    <span>{{ $i }}</span>
                                                </td>
                                                <td>
                                                    <div class="email">
                                                        <span>{{ $p->nome }}</span>
                                                        <span></span>
                                                    </div>
                                                </td>
                                                <td>M</td>
                                                <td class="quantity">
                                                    <span>Branco com cinza</span>
                                                </td>                                                
                                                <td id="idcampoEstoqueQuantidade<?php echo $p->estoque->id; ?>"> 
                                                    {{ $p->estoque->quantidade }} 
                                                </td>                                               
                                                <td>
                                                    <!-- BOTAO EDITAR ESTOQUE -->
                                                    <a type="button" class="btn" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditaEstoque{{ $p->estoque->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </td>
                                                <form id="formZerarDesconto" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    <!--BOTAO ZERAR ESTOQUE -->
                                                    <td>
                                                        <a type="submit" class="Dica js-zerar"
                                                            onclick="pega_id_estoque(<?php echo $p->estoque->id; ?>)">
                                                            <i class="bi bi-file-excel"></i>
                                                            <input id="EstoqueIdValor" type="hidden">
                                                        </a>
                                                    </td>
                                                </form>
                                            </tr>
                                            <?php $i++; ?>
                                            <!-- Modal Edita Estoque -->
                                            <div class="modal fade" id="modalEditaEstoque{{ $p->estoque->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Editar
                                                                estoque de
                                                                <b style="color: orangered">{{ $p->nome }}</b>
                                                            </h5>
                                                        </div>
                                                        <form action="{{ route('estoque.update', $p->estoque->id) }}"
                                                            method="POST">
                                                            <div class="modal-body">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="form-group mx-sm-3 mb-2">
                                                                    <input name="quantidade" type="number"
                                                                        class="form-control" id="inputPassword2"
                                                                        value="{{ $p->estoque->quantidade }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Confirmar</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    Fechar
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>

@endsection
<script type="text/javascript" src="{{ asset('js/userAdmin/estoque/index.js') }}" defer></script>
