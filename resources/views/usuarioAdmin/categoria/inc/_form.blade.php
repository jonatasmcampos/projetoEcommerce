<style>

<<<<<<< HEAD
    .incluir-medidas {
        visibility: hidden;
    }

    .novaCategoria {
        display: flex;
        align-items: center;
        cursor: pointer;

        border: 1px dashed #ccc;
        padding: 5px 20px;
=======
    .btn-categoria{
        display: flex;
        align-items: center;
        border: 2px dashed #fff;
>>>>>>> cddf13deb38d158ec9620457c4073ee267f60832
        border-radius: 7px;
        width: fit-content; 
        padding: 5px 15px;
        margin-left: 45px;
    }

<<<<<<< HEAD
    .novaCategoria:hover {
=======
    .btn-categoria:hover{
>>>>>>> cddf13deb38d158ec9620457c4073ee267f60832
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

    <h5 onclick="exibir()" class="my-2 btn-categoria">
        <i class="material-icons">add</i>
        <p style="margin: 0 0 0 5px">
            Nova categoria
        </p>
    </h5>

    <div id="campoInserir" class="campo-incluir">
        <div>
            <input placeholder="Categoria" required name="nome" type="text" class="form-control"
                id="exampleInputEmail1">
        </div>
        <br><br>

        <div>
            <label for="">Deseja Adicionar Tamanhos para categoria?</label>
            <button onclick="exibirMedidas()" class="btn btn-primary mx-3">Sim</button>
        </div>

        <div id="campoInserirMedidas" class="incluir-medidas noCentro">
            <div>
                <label for="">Medidas</label>
                <input placeholder="ex: PP ao G3" name="un" type="text" class="form-control"
                    id="exampleInputEmail1">
            </div>
            <br>
            <div>
                <input placeholder="UN" name="tpun" type="text" class="form-control" id="exampleInputEmail1">
            </div>
            <br>
        </div>


        <button type="submit" class="btn btn-primary mx-3">Incluir</button>
    </div>

</div>

<script>
    var campoInserir = document.getElementById('campoInserir')

    function exibir() {
        campoInserir.style.visibility != "visible" ?
            campoInserir.style.visibility = "visible" :
            campoInserir.style.visibility = "hidden"
    }

    function exibirMedidas() {
        var campoInserirMedidas = document.getElementById('campoInserirMedidas')
        campoInserirMedidas.style.visibility != "visible" ?
            campoInserirMedidas.style.visibility = "visible" :
            campoInserirMedidas.style.visibility = "hidden"
    }
</script>
