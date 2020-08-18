$(function () {

    $("#fomrsuporte").submit(function () {
        var vetids = ['#phone_contact', '#idmensagem'];
        var vetmensagem = ['telefone_suporte', 'mensagem_suporte'];
        validacaoassincrona(vetids, vetmensagem);
    });
});


// função de validar o formulario
function validaForm(atributo, messagem) {
    var valor = $(atributo).val();
    if (valor == '') {
        event.preventDefault();
        $(atributo).addClass('is-invalid');
        document.getElementById(messagem).style.display = 'block';
        return true;
    } else {
        $(atributo).removeClass('is-invalid');
        document.getElementById(messagem).style.display = 'none';
        return false;
    }
}


// função de validação assincrona dos campos e scroll ao topo
function validacaoassincrona(vetcampos1, vetMens1) {
    var cont = 0;
    for (var i = 0; i < vetcampos1.length; i++) {
        var valorvalida = validaForm(vetcampos1[i], vetMens1[i]);
        if (valorvalida)
            cont++;
    }
    if (cont != '0') {
        $('html, body').animate({
            scrollTop: 0
        }, 1500);
    }
}
