<aside id="carrinho" class="carrinho top-right" style="padding: 7px">
    <i id="fechar-carrinho" class="fa fa-times fechar top-right " style="margin: 10px;"></i>

    <!-- foreach -->
    <div class="item-carrinho">
        <img src="{{ asset('img/roupa1.png') }}" alt="produto">
        <div class="item-carrinho-2">
            <h5>Nome do produto</h5>
            <h6><span>Cor:</span> &nbsp; BRANCO</h6>
            <h6><span>Tamanho:</span> &nbsp; M</h6>
            <h6><span>Quantidade:</span> &nbsp; 1</h6>
            <div class="carrinho-preco">
                <h6><span>Unitário:</span> &nbsp; R$ 15,9</h6>
                <h6><span>Total:</span> &nbsp; R$ 15,9</h6>
            </div>
        </div>
    </div>
    <!-- endforeach -->

    <!-- BOTOES -->
    <div class="finalizar-compra">
        <a href="#continuarcomprando">Continuar comprando</a>
        <a href="{{route('finaliza-compra.index')}}" type="button" class="btn btn-primary">Finalizar compra</a>
    </div>
    <!-- FIM BOTOES -->
</aside>

<script>
    var fecharCarrinho = document.getElementById('fechar-carrinho')
    var carrinho = document.getElementById('carrinho')
    var abrirCarrinho = document.getElementById('abrir-carrinho')

    fecharCarrinho.addEventListener("click", function() {
        carrinho.classList.toggle('fechar-carrinho')
    })

    abrirCarrinho.addEventListener("click", function() {
        carrinho.classList.toggle('fechar-carrinho')
    })
</script>
