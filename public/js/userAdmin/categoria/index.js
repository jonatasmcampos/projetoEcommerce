function categoriadestroy(id) {

    Swal.fire({
        title: 'Excluir categoria?',
        text: "Deseja Realmente Excluir Esta Categoria?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        calcelButtonText: 'Sair!',
        confirmButtonText: 'Sim, Excluir!'
    }).then((result) => {

        if (result.isConfirmed) {

            document.getElementById('categoriadestroy' + id).submit();

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