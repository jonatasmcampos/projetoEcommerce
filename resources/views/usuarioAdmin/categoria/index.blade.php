@extends('layouts.app')

@section('content')
    <br>
    <h1 class="titulo">Categorias</h6>

        <form action="{{ route('categoria.store') }}" method="POST">
            @csrf
            @include('usuarioAdmin.categoria.inc._form')
        </form>
        @if (Session::has('true'))

            <body onload="msgSuccess('<?php echo Session::get('true'); ?>', 'success')">
        @endif
        <section class="ftco-section bg-table mx-auto">
            <div class="container">
                <div class="row">
                    <div style="padding:0;" class="col-12">
                        <div class="table-wrap">
                            <table style="width: 50%;" class="table mx-auto">
                                <thead class="thead-primary">
                                    <tr>
                                        <th style="width: 70px">Nº</th>
                                        <th>Categoria</th>
                                        <th style="width: 70px">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($categorias as $c)
                                        <tr class="alert" role="alert">
                                            <td>
                                                <span>{{ $i }}</span>
                                            </td>
                                            <td>
                                                {{ $c->nome }}
                                            </td>
                                            @if (!$c->produtos->count())
                                                <form id="categoriadestroy<?php echo $c->id ?>"
                                                    action="{{ route('categoria.destroy', $c->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    {{--onclick avisa antes e deletar a categoria caso não é pq tem produto na categoria --}}
                                                    <td onclick="categoriadestroy(<?php echo $c->id ?>)">
                                                        <a class="btn" type="submit">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </td>
                                                </form>
                                            @else
                                                <td>
                                                    <a type="button" class="btn" data-bs-toggle="modal"
                                                        data-bs-target="#modalContemProduto{{ $c->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalContemProduto{{ $c->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">
                                                                    Categoria
                                                                    <b>{{ $c->nome }}</b> Contém Produto
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="list-group">
                                                                    <li style="background-color: orangered !important"
                                                                        class="list-group-item active">Produtos</li>
                                                                    @foreach ($c->produtos as $p)
                                                                        <li class="list-group-item">{{ $p->nome }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Sair</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
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

        {{-- <div class="noCentro" style="width: 100% !important;">
        <div class="noCentro my-5 box-elevado" style="width: 70% !important">
            <table class="table my-5" style="width: 70%">
                <thead>
                    <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">Categoria</th>
                    </tr>
                </thead>
                @php
                    $i = 1;
                @endphp
                @foreach ($categorias as $c)
                    <tbody>
                        <tr style="border: 1px solid #000;">
                            <td style="width: 70px !important" class="col">{{ $i }}</td>
                            <td>{{ $c->nome }} </td>
    
                            @if (!$c->produtos->count())
                                <form action="{{ route('categoria.destroy', $c->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <td style="width: 70px !important">
                                        <button class="btn" type="submit">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </td>
                                </form>
                            @else
                                <td style="width: 70px !important">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#modalContemProduto{{ $c->id }}">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="modalContemProduto{{ $c->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Categoria
                                                    <b>{{ $c->nome }}</b> Contém Produto
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
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
                                                    data-bs-dismiss="modal">Sair</button>
    
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
    </div> --}}
    @endsection
    <script type="text/javascript" src="{{ asset('js/userAdmin/categoria/index.js') }}" defer></script>
