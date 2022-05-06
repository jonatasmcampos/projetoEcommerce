@extends('layouts.app')

@section('content')
    @if (Session::has('true'))

        <body onload="msgSuccess('<?php echo Session::get('true'); ?>', 'success')">
    @endif

    <div class="page">

        <h1>Produtos</h1>
        <br>
        <!-- tabs -->
        <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
            <input type="radio" name="pcss3t" checked id="tab1" class="tab-content-first">
            <label for="tab1"><i class="icon-bolt"></i>Produtos</label>

            <input type="radio" name="pcss3t" id="tab2" class="tab-content-2">
            <label for="tab2"><i class="icon-picture"></i>Cadastrar produto</label>

            <!--
                        <input type="radio" name="pcss3t" id="tab3" class="tab-content-3">
                        <label for="tab3"><i class="icon-cogs"></i>Einstein</label>

                        <input type="radio" name="pcss3t" id="tab5" class="tab-content-last">
                        <label for="tab5"><i class="icon-globe"></i>Newton</label>
                    -->

            <ul>
                <li class="tab-content tab-content-first typography">

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
                </li>

                <li class="tab-content tab-content-2 typography">

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

                </li>

                {{-- <li class="tab-content tab-content-3 typography">
                    <h1>Albert Einstein</h1>
                    <p>German-born theoretical physicist who developed the general theory of relativity, one of the two
                        pillars of modern physics (alongside quantum mechanics). While best known for his mass–energy
                        equivalence formula E = mc2 (which has been dubbed "the world's most famous equation"), he
                        received the 1921 Nobel Prize in Physics "for his services to theoretical physics, and
                        especially for his discovery of the law of the photoelectric effect". The latter was pivotal in
                        establishing quantum theory.</p>
                    <p>Near the beginning of his career, Einstein thought that Newtonian mechanics was no longer enough
                        to reconcile the laws of classical mechanics with the laws of the electromagnetic field. This
                        led to the development of his special theory of relativity. He realized, however, that the
                        principle of relativity could also be extended to gravitational fields, and with his subsequent
                        theory of gravitation in 1916, he published a paper on the general theory of relativity.</p>
                    <p class="text-right"><em>Find out more about Albert Einstein from <a
                                href="http://en.wikipedia.org/wiki/Albert_Einstein" target="_blank">Wikipedia</a>.</em>
                    </p>
                </li>

                <li class="tab-content tab-content-last typography">
                    <div class="typography">
                        <h1>Isaac Newton</h1>
                        <p>English physicist and mathematician who is widely regarded as one of the most influential
                            scientists of all time and as a key figure in the scientific revolution. His book
                            Philosophiæ Naturalis Principia Mathematica ("Mathematical Principles of Natural
                            Philosophy"), first published in 1687, laid the foundations for most of classical mechanics.
                            Newton also made seminal contributions to optics and shares credit with Gottfried Leibniz
                            for the invention of the infinitesimal calculus.</p>
                        <p>Newton's Principia formulated the laws of motion and universal gravitation that dominated
                            scientists' view of the physical universe for the next three centuries. It also demonstrated
                            that the motion of objects on the Earth and that of celestial bodies could be described by
                            the same principles. By deriving Kepler's laws of planetary motion from his mathematical
                            description of gravity, Newton removed the last doubts about the validity of the
                            heliocentric model of the cosmos.</p>
                        <p class="text-right"><em>Find out more about Isaac Newton from <a
                                    href="http://en.wikipedia.org/wiki/Isaac_Newton" target="_blank">Wikipedia</a>.</em>
                        </p>
                    </div>
                </li> --}}

            </ul>
        </div>
        <!--/ tabs -->
    </div>






















    {{-- <h6>Produtos</h6>
    <br>

    <div class="box-elevado">

        
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

        
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                
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
    </div> --}}
@endsection
<script type="text/javascript" src="{{ asset('js/userAdmin/produto/index.js') }}" defer></script>
