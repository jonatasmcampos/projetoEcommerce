@extends('layouts.app')

@section('content')
    @if (Session::has('true'))

        <body onload="msgSuccess('<?php echo Session::get('true'); ?>', 'success')">
    @endif

    <h1 style="margin-left: 25px">Produtos</h1>

    <div class="page">

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


                        <section class="ftco-section">
                            <div class="container">
                                <div class="row">
                                    <div style="padding:0;" class="col-12">
                                        <div class="table-wrap" style="height: 57vh">
                                            <table class="table">
                                                <thead class="thead-primary">
                                                    <tr>
                                                        <th>Nº</th>
                                                        <th>Imagem</th>
                                                        <th>Produto</th>
                                                        <th>Categoria</th>
                                                        <th>Tam</th>
                                                        <th>Cor</th>
                                                        <th>Preço</th>
                                                        <th>Desconto</th>
                                                        <th>Estoque</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($produtos as $p)
                                                        <tr class="alert" role="alert">
                                                            <td>
                                                                <span>{{ $i }}</span>
                                                            </td>
                                                            <td>
                                                                {{-- <div class="img"
                                                                style="background-image: url(../../../../public/img/campo.png);"></div> --}}
                                                                <img style="width: 100px; height: 50px"
                                                                    src="{{ asset('img/campo.png') }}"
                                                                    alt="Foto do produto">
                                                            </td>
                                                            <td>
                                                                <div class="email">
                                                                    <span>{{ $p->nome }}</span>
                                                                    <span></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span>{{ $p->categoria->nome }}</span>
                                                            </td>
                                                            <td>M</td>
                                                            <td class="quantity">
                                                                <span>Branco com cinza</span>
                                                            </td>
                                                            <td>R$ {{ $p->preco }}</td>
                                                            <td>
                                                                {{ $p->desconto }}
                                                            </td>
                                                            <td>
                                                                {{ $p->estoque->quantidade }}
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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
@endsection
<script type="text/javascript" src="{{ asset('js/userAdmin/produto/index.js') }}" defer></script>
