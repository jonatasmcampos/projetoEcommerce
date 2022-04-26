
$(function () {
    $('form[id="update_senha"]').submit(function (event) {
        event.preventDefault();

        var senha_atual = $('#senha_atual').val();
        var senha_nova = $('#senha_nova').val();
        var senha_confirma_senha = $('#senha_confirma_senha').val();
        console.log(senha_atual);
        $.ajax({
            url: "/mihaConta/update_senha",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                senha_atual: senha_atual,
                senha_nova: senha_nova,
                senha_confirma_senha: senha_confirma_senha,
            },
            dataType: 'json',
        }).done(function (response) {
            if (response === 'atualIvalida') {
                console.log(response);
                var msg = document.getElementById('senhaAtualInvalid');
                msg.style.color = "red";
                msg.innerHTML = "Senha não Confere com a atual";
            } else if (response === 'senhaConfirmFalse') {



                var msg = document.getElementById('senhaConfirmFalse');
                console.log(msg);
                msg.style.color = "red";
                msg.innerHTML = "Confirmação não confere com a nova senha";
                document.getElementById('senhaAtualInvalid').innerHTML = ""
            } else if (response === true) {
                //caso não entre em nenhuma fdessas validações conclui a atualização da senha
                Swal.fire({
                    icon: 'success',
                    title: 'Senha alterada com sucesso',
                    showConfirmButton: false,
                    timer: 2000
                });
                document.getElementById('senhaAtualInvalid').innerHTML = ""
                document.getElementById('senhaConfirmFalse').innerHTML = ""
                console.log(response);
            }
        });
    });
});