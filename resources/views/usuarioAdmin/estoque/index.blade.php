@extends('layouts.app')

@section('content')
    <br>
    <h1 class="titulo"> &nbsp; Estoque</h1>
    <br>

    <div style="display: flex; justify-content: center">
        <div class="lista-estoque">
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

                            @foreach ($produtos as $prod)
                                @php
                                    $j = 1;
                                @endphp
                                <div>
                                    <a style="width: 100%; margin-bottom: 7px" class="btn btn-primary" data-bs-toggle="collapse"
                                        href="#collapseExample<?php echo $prod->id; ?>" role="button" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        <div class="d-flex">
                                            <div style="margin-right: 30px">{{ $i }}</div>
                                            <div>{{ $prod->nome }}</div>
                                        </div>
                                    </a>
                                    <div class="collapse" id="collapseExample<?php echo $prod->id; ?>">
                                        <div class="card card-body">
                                            <table class="table-info tabela-estoque">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Cor</th>
                                                        <th scope="col">Tamanho</th>
                                                        <th scope="col">Estoque</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                @foreach ($prod->prodTamCors as $produto)
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">{{ $j }}</th>
                                                            <td>{{ $produto->cor->nome }}</td>
                                                            <td>{{ $produto->tamanho->nome }}</td>
                                                            <td id="idcampoEstoqueQuantidade<?php echo $produto->id; ?>">
                                                                {{ $produto->estoque->quantidade }}</td>
                                                            <td>
                                                                <!-- BOTAO EDITAR ESTOQUE Tamanho -->
                                                                <a type="button" class="btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modaleditarEstqoueTamanho{{ $produto->id }}">
                                                                    <i class="bi bi-pencil-square"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    @php
                                                        $j++;
                                                    @endphp

                                                    <!-- Modal editar  -->
                                                    <div class="modal fade"
                                                        id="modaleditarEstqoueTamanho{{ $produto->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        Editar estoque
                                                                    </h5>
                                                                </div>

                                                                <form
                                                                    action="{{ route('estoque.update', $produto->id) }}"
                                                                    method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="modal-body">

                                                                        <ul class="list-group list-group-horizontal">
                                                                            <li style="width: 240px"
                                                                                class="list-group-item"><b>Cor</b></li>
                                                                            <li style="width: 110px"
                                                                                class="list-group-item"><b>Tamanho</b></li>
                                                                        </ul>
                                                                        <ul class="list-group list-group-horizontal">
                                                                            <li style="width: 240px"
                                                                                class="list-group-item">
                                                                                {{ $produto->cor->nome }}</li>
                                                                            <li style="width: 110px"
                                                                                class="list-group-item text-center">
                                                                                @if (!$produto->tamanho->count())
                                                                                    Nenhum tamanho adicionado para essa cor.
                                                                                @else
                                                                                    {{ $produto->tamanho->nome }}
                                                                                @endif
                                                                            </li>
                                                                        </ul>

                                                                        <br>

                                                                        <div>
                                                                            <div id="campoInserir" class="campo-incluir">
                                                                                <div>
                                                                                    <input placeholder="Quantidade" required
                                                                                        name="quantidade" type="text"
                                                                                        class="form-control"
                                                                                        id="exampleInputEmail1">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- BOTAO EDITAR E ZERAR ESTOQUE  -->
                                                                    <div class="modal-footer">
                                                                        <div>
                                                                            <!-- ZERAR ESTOQUE -->
                                                                            <a onclick="pega_id_estoque(<?php echo $produto->id; ?>)"
                                                                                class="js-zerar">
                                                                                Zerar estoque
                                                                            </a>

                                                                            <div class="btn-editar-fechar">
                                                                                <!-- EDITAR ESTOQUE -->
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Editar</button>

                                                                                <!-- FECHAR -->
                                                                                <button
                                                                                    id="fechaModalEstoque<?php echo $produto->id; ?>"
                                                                                    type="submit" class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">
                                                                                    Fechar
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- FIM MODAL -->
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </div>
@endsection
<script type="text/javascript" src="{{ asset('js/userAdmin/estoque/index.js') }}" defer></script>
