$(function () {

    $('#idsubmitredes').submit(function () {
        var vetorRedes = document.getElementsByClassName('redesocial_idredesocial[]');

        for (var i = 0; i < vetorRedes.length; i++) {
            var valor = $('input[name=redesocial_idredesocial[]]').val();
            if (valor == '') {
                event.preventDefault();
                alert("Você precisa preencher ao menos uma rede social");
            } else {
                event.preventDefault();
                console.log(valor);
            }

        }
    });


});
