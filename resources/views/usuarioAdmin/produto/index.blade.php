@extends('layouts.app')

@section('content')
    @if (Session::has('true'))

        <body onload="msgSuccess('<?php echo Session::get('true'); ?>', 'success')">
    @endif

    {{-- CAIXA TABS --}}
    <div class="box-elevado">
        {{-- TÍTULOS DOS TABS --}}
        <nav class="mx-4 my-4">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">
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
                    <div class="alert alert-warning noCentro" style="flex-direction: column" role="alert">
                        <h4 class="alert-heading"><i class="material-icons">feedback</i></h4>
                        <h3>
                            Nenhum produto cadastrado!
                        </h3>
                        <hr>
                        <p class="mb-0">
                            <a type="button" class="btn btn-primary" onclick="cadastraProdutoClick()">Cadastrar</a>
                        </p>
                    </div>
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

                                            <button data-bs-toggle="modal" data-bs-target="#prod{{ $p->id }}"
                                                class="btn" style="padding:0;">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>

                                        </td>
                                    </tr>
                                </tbody>

                                {{-- modal confirma delete produto --}}
                                <div class="modal fade" id="prod{{ $p->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Excluir produto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Deseja Realmente excluir o produto {{ $p->nome }}?
                                            </div>
                                            <form action="{{ route('produto.destroy', $p->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Não</button>

                                                    <button type="submit" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Sim</button>


                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            @endforeach
                        </table>
                    </div>
                @endif
            </div>

            {{-- CADASTRO DE PRODUTOS --}}
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                <form class="box-CadastrarProdutos" enctype="multipart/form-data" id="formCadastroProduto"
                    action="{{ route('produto.store') }}" method="POST" class="col-6">
                    @csrf

                    @include('usuarioAdmin.produto.inc._form', [
                        'produto' => '',
                    ])
                    @include('usuarioAdmin.produto.inc._formImagem', [
                        'produto' => '',
                    ])
                    <div>
                        <ul id="dp-files"></ul>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
<script type="text/javascript" src="{{ asset('js/userAdmin/produto/index.js') }}" defer></script>
