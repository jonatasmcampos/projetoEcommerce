@extends('layouts.app')

@section('content')
    <br>
    <h1 class="titulo">Estoque {{ $produto->nome }}</h1>
    <br>

    <div>
        @if (Session::has('true'))

            <body onload="msgSuccess('<?php echo Session::get('true'); ?>', 'success')">
        @endif

        <section class="ftco-section bg-table mx-auto">
            <div class="container">
                <div class="row">
                    
                    <div style="padding:0;" class="col-12">
                        <div class="table-wrap">
                            <table style="width: 70%;" class="table mx-auto">
                                <thead class="thead-primary">
                                    <tr>
                                        <th style="width: 70px;">Cores</th>
                                        <th style="width: 70px;">Tamanhos</th>
                                        <th style="width: 70px;">Estoque</th>
                                        <th style="width: 70px">&nbsp;</th>
                                        <th style="width: 70px">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($produto->prodTamCors as $c)
                                        <tr class="alert" role="alert">

                                            <td id="idcampoEstoqueQuantidade<?php echo $c->id; ?>">
                                                {{ $c->cor->nome }}
                                            </td>
                                            <td>                                               
                                                {{$c->tamanho->nome}}                                               
                                            </td>
                                            <td>
                                                {{$c->estoque->quantidade}}                                               
                                            </td>
                                            <td>
                                                <!-- BOTAO EDITAR ESTOQUE Tamanho -->
                                                <a type="button" class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#modaleditarEstqoueTamanho{{ $c->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </td>
                                            <form id="formZerarDesconto" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <!--BOTAO ZERAR ESTOQUE -->
                                                <td>
                                                    <a type="submit" class="Dica js-zerar"
                                                        onclick="pega_id_estoque(<?php echo $c->id; ?>)">
                                                        <i class="bi bi-file-excel"></i>
                                                        <input id="EstoqueIdValor" type="hidden">
                                                    </a>
                                                </td>
                                            </form>
                                        </tr>                                    

                                        <!-- Modal editar  -->
                                        <div class="modal fade" id="modaleditarEstqoueTamanho{{ $c->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Editar Estoque
                                                            
                                                        </h5>
                                                    </div>

                                                    <div class="modal-body">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Cor :
                                                            {{ $c->cor->nome }}
                                                        </h5>
                                                        <ul class="list-group">
                                                            <li class="list-group-item active" aria-current="true">Tamanhos
                                                            </li>
                                                            @if (!$c->tamanho->count())
                                                                <li class="list-group-item" aria-current="true">Nenhum
                                                                    tamanho adicionado para essa cor</li>
                                                            @else
                                                                
                                                                    <li class="list-group-item" aria-current="true">
                                                                        {{ $c->tamanho->nome }}</li>
                                                                
                                                            @endif

                                                            <div>

                                                                <h5 onclick="exibir()" class="my-2 btn-tamanho">
                                                                    <i class="material-icons">add</i>
                                                                    <p style="margin: 0 0 0 5px">
                                                                        Adicionar tamanho
                                                                    </p>
                                                                </h5>
                                                            
                                                                <div id="campoInserir" class="campo-incluir">
                                                                    <div>
                                                                        <input placeholder="Tamanho" required name="tamanho" type="text" class="form-control"
                                                                            id="exampleInputEmail1">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary mx-3">Adicionar</button>
                                                                </div>
                                                            
                                                            </div>


                                                        </ul>
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

    </div>
@endsection
<script>
    var campoInserir = document.getElementById('campoInserirTamanhoEstoque')

    function exibir() {
        campoInserir.style.visibility != "visible" ?
            campoInserir.style.visibility = "visible" :
            campoInserir.style.visibility = "hidden"
    }

</script>
<script type="text/javascript" src="{{ asset('js/userAdmin/estoque/index.js') }}" defer></script>
