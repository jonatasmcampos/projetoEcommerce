@extends('layouts.app')

@section('content')
    <br>
    <h1 class="titulo">Tamanhos</h6>

        <form action="" method="POST">
            @csrf
            @include('usuarioAdmin.tamanho.inc._form')
        </form>

        <section class="ftco-section bg-table mx-auto" style="width: 50%">
            <div class="container">
                <div class="row">
                    <div style="padding:0;">
                        <div class="table-wrap" style="padding: 7px">
                            <table class="table mx-auto" style="min-width:100% !important;" >
                                <thead class="thead-primary">
                                    <tr>
                                        <th style="width: 70px">Nº</th>
                                        <th>Tamanho</th>
                                        <th style="width: 70px">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($tamanhos as $t)
                                        <tr class="alert" role="alert">
                                            <td>
                                                <span>{{ $i }}</span>
                                            </td>
                                            <td>
                                                {{ $t->tamanho }}
                                            </td>
                                            @if (!$t->count())
                                                <form action="{{ route('tamanho.destroy', $t->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <td>
                                                        <a class="btn" type="submit">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </td>
                                                </form>
                                            @else
                                                <td>
                                                    <a type="button" class="btn" data-bs-toggle="modal"
                                                        data-bs-target="#modalContemProduto{{ $t->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                                <!-- Modal -->
                                                {{-- <div class="modal fade" id="modalContemProduto{{ $t->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">
                                                                    Categoria
                                                                    <b>{{ $t->tamanho }}</b> Contém Produto
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="list-group">
                                                                    <li  style="background-color: orangered !important" class="list-group-item active">Produtos</li>
                                                                    @foreach ($t->tamanho as $p)
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
                                                </div> --}}
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
    @endsection