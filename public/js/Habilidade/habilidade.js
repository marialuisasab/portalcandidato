$(function () {
    var nomesHabilExcluir = document.getElementsByName('botaoexcluirhabil');

    for (var i = 0; i < nomesHabilExcluir.length; i++) {
        nomesHabilExcluir[i].addEventListener('click', function () {
            var valorconfirm = confirm("Quer realmente excluir esta habilidade??");
            if (valorconfirm) {
                location.href = "/habilidade/excluir/" + this.value;
                // alert("Habilidade excluida!");
                ;
            } else {
                // location.href = "cancel";

            }
        });

    }



    $("#idformhabil").submit(function () {

        // validaForm('#tipo', 'menstipo');
        // validaForm('#descricao', 'mensdescri');
        // validaForm('#nivel', 'mensnivel');
        var vetcampos = ['#tipo', '#descricao', '#nivel'];
        var vetmens = ['menstipo', 'mensdescri', 'mensnivel'];
        validacaoassincrona(vetcampos, vetmens);
    });

    // funcao para validar formulario
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

    // funcao para validar e chamar o scroll apenas uma vez e impedir o acumulo de chamadas de scroll
    function validacaoassincrona(vet1, vet2) {
        var count = 0;
        for (var i = 0; i < vet1.length; i++) {
            var valorvalida = validaForm(vet1[i], vet2[i]);
            if (valorvalida)
                count++;
        }
        if (count != '0') {
            $('html, body').animate({
                scrollTop: 0
            }, 1500);
        }

    }




});

$("document").ready(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");
});
