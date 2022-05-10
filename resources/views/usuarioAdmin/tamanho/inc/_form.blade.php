<style>

    .btn-tamanho{
        display: flex;
        align-items: center;
        border: 2px dashed #fff;
        border-radius: 7px;
        width: fit-content; 
        padding: 5px 15px;
        margin-left: 45px;
    }

    .btn-tamanho:hover{
        border: 2px dashed orangered;
        cursor: pointer;
    }

    .campo-incluir{
        visibility: hidden;
        display: flex;
        width: 50%;
        margin-left: 45px;
        margin-bottom: 5px
    }

    @media (max-width: 900px){
        .campo-incluir{
            width: 100%;
        }
    }

</style>

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

<script>
    var campoInserir = document.getElementById('campoInserir')

    function exibir() {
        campoInserir.style.visibility != "visible" ?
            campoInserir.style.visibility = "visible" :
            campoInserir.style.visibility = "hidden"
    }

</script>
