
function pega_id_estoque(estoque_id) {
    id_estoque = estoque_id
}

(function (win, doc) {
    'use strict'

    //View cliente/index
    function zera_estoque_ajax(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Zerar Estoque?',
            text: "Deseja realmente zerar estoque deste produto?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            calcelButtonText: 'Sair!',
            confirmButtonText: 'Sim, Zerar!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: '/home/estoque/' + id_estoque,
                    type: "DELETE",

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    dataType: 'json',
                }).done(function (response) {

                    if (response === true) {
                        document.getElementById('idcampoEstoqueQuantidade' + id_estoque).innerText = '0'
                        document.getElementById('fechaModalEstoque' + id_estoque).click()

                        Swal.fire({
                            icon: 'success',
                            title: 'Estoque Zerado Com Sucesso',
                            showConfirmButton: false,
                            timer: 1500
                        }

                        )
                    }

                })
            }
        })
    }
    if (doc.querySelector('.js-zerar')) {
        var btn = doc.querySelectorAll('.js-zerar');
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', zera_estoque_ajax, false)
        }
    }

})(window, document);


function msgSuccess(msg, typ) {
    Swal.fire({
        icon: typ,
        title: msg,
        showConfirmButton: false,
        timer: 1500
    })
}