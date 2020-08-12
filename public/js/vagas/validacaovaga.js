$(function ($) {
    $("#idformvagas").submit(function () {

        var vetorids = ['#iddatainivaga', '#idtitulo', '#iddescricao', '#idrequisitos', '#status'];
        var vetormens = ['mensagemdtvagaini', 'menstitulo', 'mensdescricaovaga', 'mensrequisitosvaga', 'mensstatus'];
        validacaoassincrona(vetorids, vetormens);

        // var isChecked = $("input[name='disp_mudanca']:checked").val();
        // Checando se o radio foi selecionado

    });

    // if ($("input[type='checkbox'][name='tpvaga']").is(':checked')) {
    // event.preventDefault();
    // document.getElementById('idtipovaga').style.border = 'solid';
    // document.getElementById('idtipovaga').style.borderColor = 'red';
    // document.getElementById('idtipovaga').style.borderWidth = 'thin';
    // document.getElementById('idtipovaga').style.display = 'block';
    // document.getElementById('pdcvaga').style.border = 'solid';
    // document.getElementById('pdcvaga').style.borderColor = 'red';
    // document.getElementById('pdcvaga').style.borderWidth = 'thin';
    // document.getElementById('pdcvaga').style.display = 'block';
    // $('html, body').animate({
    //     scrollTop: 0
    // }, 1500);
    //     var valor1 = $("#idtipovaga").val();
    //     var valor2 = $("#pdcvaga").val();
    //     alert(valor1);
    //     console.log(valor2);

    // } else {
    // document.getElementById('idtipovaga').style.border = 'none';
    // document.getElementById('pdcvaga').style.border = 'none';

    // document.getElementById('menstipovaga').style.display = 'none';
    // document.getElementById('menspcd').style.display = 'none';

    // }

});
$(document).ready(function ($) {
    $("#idstatusvaga").mask('N', {
        translation: {
            N: {
                pattern: /[\d]/
            },
        }
    });


    $("#quantidade").mask('NN', {
        translation: {
            N: {
                pattern: /[\d]/
            },
        }
    });

    $("#idtipovaga").change(function () {
        var valor = $(this).prop('checked');
        console.log(valor);
    });
    var valor2 = $('#idtipovaga').prop('checked');
    console.log(valor2);


    $("#pdcvaga").change(function () {
        var valor = $(this).prop('checked');
        console.log(valor);
    });
    var valor2 = $('#pdcvaga').prop('checked');
    console.log(valor2);
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
