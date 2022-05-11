function confirmaDeleteTamanho() {

    Swal.fire({
        title: 'Excluir tamanho?',
        text: "Deseja Realmente Excluir Este Tamanho?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        calcelButtonText: 'Sair!',
        confirmButtonText: 'Sim, Excluir!'
    }).then((result) => {

        if (result.isConfirmed) {

            document.getElementById('deleteTamanho').submit();

        } else {

            msgSuccess('Não Foi Possível', 'error')

        }


    });
}

function msgSuccess(msg, typ) {
    Swal.fire({
        icon: typ,
        title: msg,
        showConfirmButton: false,
        timer: 1500
    })
}