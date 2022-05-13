@extends('layouts.app')

@section('content')
    <br>
    <h1 class="titulo">Cores</h6>

        <form action="{{route('cores.store')}}" method="POST">
            @csrf 
            @include('usuarioAdmin.cor.inc._form')
        </form>
        @if (Session::has('true'))

            <body onload="msgSuccess('<?php echo Session::get('true'); ?>', 'success')">
        @endif
        <section class="ftco-section bg-table mx-auto" style="width: 50%">
            <div class="container">
                <div class="row">
                    <div style="padding:0;">
                        <div class="table-wrap" style="padding: 7px">
                            <table class="table mx-auto" style="min-width:100% !important;">
                                <thead class="thead-primary">
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
                                        <tr class="alert" role="alert">
                                            <td>
                                                <span>{{ $i }}</span>
                                            </td>
                                            <td>
                                                {{ $c->nome }}
                                            </td>
                                            {{-- @if (!$c->produtos->count())
                                                <form id="coresdestroy<?php echo $c->id ?>" action="{{ route('cores.destroy', $c->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <td>
                                                        <a onclick="coresdestroy(<?php echo $c->id ?>)" class="btn" type="submit">
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
                </div>
            </div>
        </section>
    @endsection
    <script type="text/javascript" src="{{ asset('js/userAdmin/tamanho/index.js') }}" defer></script>
