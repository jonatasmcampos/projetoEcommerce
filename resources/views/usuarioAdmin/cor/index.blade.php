@extends('layouts.app')

@section('content')
    <h1 class="titulo">Cores</h6>
        <br>
        <br>
        <br>

        @if (Session::has('true'))

            <body onload="msgSuccess('<?php echo Session::get('true'); ?>', 'success')">
        @endif

        <!-- Modal -->
        <div class="modal fade" id="modalCor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar cor</h5>
                    </div>
                    <form action="{{ route('cores.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">

                            <input placeholder="Cor" required name="nome" type="text" class="form-control"
                                id="exampleInputEmail1">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary mx-3">Adicionar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="section-all mx-auto">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary add-all"
                data-bs-toggle="modal" data-bs-target="#modalCor">
                <i class="fa fa-plus-square"></i>
                Adicionar cor
            </button>

            <section class="ftco-section bg-table mx-auto" style="padding: 10px">
                <div class="container">
                    <div class="row">
                        <table class="table-info tb-all">
                            <thead>
                                <tr>
                                    <th style="width: 70px">Nº</th>
                                    <th>Cores</th>
                                    <th style="width: 70px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($cores as $c)
                                    <tr>
                                        <td>
                                            <span>{{ $i }}</span>
                                        </td>
                                        <td>
                                            {{ $c->nome }}
                                        </td>
                                        {{-- @if (!$c->produtos->count())
                                            <form id="coresdestroy<?php echo $c->id; ?>" action="{{ route('cores.destroy', $c->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <td>
                                                    <a onclick="coresdestroy(<?php echo $c->id; ?>)" class="btn" type="submit">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </form> --}}
                                        {{-- @else --}}
                                        {{-- <td>
                                                <a type="button" class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#modalContemProduto{{ $c->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                            <!-- Modal Caso contem item para esse tamanho-->
                                             <div class="modal fade" id="modalContemProduto{{ $c->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                                Categoria
                                                                <b>{{ $c->tamanho }}</b> Contém Produto
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-group">
                                                                <li  style="background-color: orangered !important" class="list-group-item active">Produtos</li>
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
                                        @endif --}}
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </section>
        </div>
    @endsection
    <script type="text/javascript" src="{{ asset('js/userAdmin/tamanho/index.js') }}" defer></script>
