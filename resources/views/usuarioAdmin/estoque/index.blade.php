@extends('layouts.app')

@section('content')

    <br>
    <h1 class="titulo">Estoque</h1>
    <br>

    <div>
        @if (Session::has('true'))

            <body onload="msgSuccess('<?php echo Session::get('true'); ?>', 'success')">
        @endif

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

                        <form class="input-group" action="{{ route('produto.index') }}" method="GET">
                            @csrf
                            <input name="nome" placeholder="Buscar produto" type="search" id="form1"
                                class="input-buscar" />
                            <button type="submit" class="btn btn-primary btn-buscar">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>

                        <div style="padding:0;" class="col-12">
                            <div class="table-wrap">
                                <table style="width: 70%;" class="table mx-auto">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th style="width: 70px">Nº</th>
                                            <th>Produto</th>
                                            <th style="width: 70px">Cor/Tam</th>
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
                                                <td>
                                                    <!-- BOTAO visualiza tamanhos -->
                                                    <a type="button" class="btn" data-bs-toggle="modal"
                                                        data-bs-target="#modalvisualizaCores{{ $p->id }}">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>
                                                </td>
                                                <td id="idcampoEstoqueQuantidade<?php echo $p->id; ?>">
                                                    {{ $p->estoque }}
                                                </td>

                                                <!-- BOTAO EDITAR ESTOQUE -->
                                                <td>
                                                    <a href="{{ route('estoque.show', $p->id) }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </td>


                                                <form id="formZerarDesconto" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    <!--BOTAO ZERAR ESTOQUE -->
                                                    <td>
                                                        <a type="submit" class="Dica js-zerar"
                                                            onclick="pega_id_estoque(<?php echo $p->id; ?>)">
                                                            <i class="bi bi-file-excel"></i>
                                                            <input id="EstoqueIdValor" type="hidden">
                                                        </a>
                                                    </td>
                                                </form>
                                            </tr>
                                            <?php $i++; ?>
                                            <!-- Modal Edita Estoque -->
                                            <div class="modal fade" id="modalvisualizaCores{{ $p->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Tamanhos
                                                                por cores de
                                                                <b style="color: orangered">{{ $p->nome }}</b>
                                                            </h5>
                                                        </div>

                                                        <div class="modal-body">
                                                            @foreach ($p->cores as $c)
                                                                <h6>{{ $c->nome }}</h6>
                                                                @if (!$c->tamanhos->count())
                                                                    <h6>Nenhum tamanho específicado para essa cor</h6>
                                                                    @else
                                                                    @foreach ($c->tamanhos as $t)
                                                                    <h6>{{ $t->nome }}</h6>
                                                                @endforeach
                                                                @endif
                                                           
                                                            @endforeach




                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Fechar
                                                            </button>
                                                        </div>

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
