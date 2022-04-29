@if (!$categorias->count())
    {{-- somente para não aparecer a opcao de inserir imagem caso esteja sem categoria --}}
@else
    @if ($produto && count($produto->imagens))
        <p class="mt-3">

            <a class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Imagens
            </a>
        </p>

        <div class="collapse" id="collapseExample">

            <form enctype="multipart/form-data" action="{{ route('produto.update', $produto->id) }}" method="POST">
                @method('PUT')
                @csrf

                <input required id="imagesProdutoName" type='file' name='image[]' accept="image/*" multiple
                    id='file-input' onchange="newInput(this)" class='file-input' />

                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Adicionar</button>

            </form>

            <ul id="dp-files"></ul>

            <div class="card card-body">
                <div class="row card-deck mt-3">
                    @foreach ($produto->imagens as $imagem)
                        <div class="card col-3 mx-2">
                            <img class="card-img-top" src="{{ asset($imagem->nome) }}" alt="Card image cap">
                            <div class="card-footer mt-3">
                                @if ($imagem->prioridade)
                                    <a style="cursor: pointer;">
                                        <i  class="bi bi-star-fill"></i>
                                    </a>
                                @else
                                    <form action="{{ route('img_padrao', $imagem->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button class="btn" type="submit">
                                            <i style="cursor: pointer" class="bi bi-star"></i>
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('produto.update', $produto->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <a type="submit" class="btn btn-excluir" data-bs-toggle="modal"
                                        data-bs-target="#img{{ $imagem->id }}" style="padding:0;">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </form>
                            </div>
                        </div>

                        <!-- Modal Confirma Exclusao-->
                        <div class="modal fade" id="img{{ $imagem->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Excluir Imagem
                                            {{ $imagem->id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Deseja Realmente excluir esta imagem do produto {{ $produto->nome }}?
                                    </div>
                                    <form action="{{ route('deleta_image', $imagem->id) }}" method="POST">
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
                    @endforeach
                </div>
            </div>

        </div>
    @else
        <div class="mb-3">
            <label for="formFileSm" class="form-label">iamgens</label>
            <input id="imagesProdutoName" type='file' name='image[]' accept="image/*" multiple id='file-input'
                onchange="newInput(this)" class='file-input' />

            <ul id="dp-files"></ul>
        </div>

    @endif
@endif
