$(function ($) {
    $("#idformselect").submit(function () {

        var vetorids = ['#idtitulo', '#tpvaga', '#iddtinicio', '#iddescricao', '#idrequisitos'];
        var vetormens = ['menstitulo', 'menstpdvaga', 'mensdtinicio', 'mensdescricaovaga', 'mensrequisitosvaga'];
        validacaoassincrona(vetorids, vetormens);

        // var isChecked = $("input[name='disp_mudanca']:checked").val();
        // Checando se o radio foi selecionado
        if (!$("input[type='radio'][name='status']").is(':checked')) {
            event.preventDefault();
            document.getElementById('background_status').style.border = 'solid';
            document.getElementById('background_status').style.borderColor = 'red';
            document.getElementById('background_status').style.borderWidth = 'thin';
            document.getElementById('mens_status').style.display = 'block';
            // $('html, body').animate({
            //     scrollTop: 0
            // }, 1500);
        } else {
            document.getElementById('background_status').style.border = 'none';
            document.getElementById('mens_status').style.display = 'none';
        }


        var check_box = document.getElementsByName('idconclui');
        if (!$("input[type='radio'][name='pcd']").is(':checked')) {
            event.preventDefault();
            document.getElementById('background_pcd').style.border = 'solid';
            document.getElementById('background_pcd').style.borderColor = 'red';
            document.getElementById('background_pcd').style.borderWidth = 'thin';
            document.getElementById('mens_pcd').style.display = 'block';
            // $('html, body').animate({
            //     scrollTop: 0
            // }, 1500);
        } else {
            document.getElementById('background_pcd').style.border = 'none';
            document.getElementById('mens_pcd').style.display = 'none';
        }

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

    $("#quantidade").mask('NN', {
        translation: {
            N: {
                pattern: /[\d]/,
                allowNegative: false

            },
        }
    });


    // $("#pdcvaga").change(function () {
    //     var valor = $(this).prop('checked');
    //     console.log(valor);
    // });
    // var valor2 = $('#pdcvaga').prop('checked');
    // console.log(valor2);
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

$(document).ready(function () {
    $("#iddescricao").summernote({
        height: 200, // set editor height
        marginLefth: 1500,
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: true, // set focus to editable area after initializing summernote
        tabsize: 4,
        placeholder: 'Sobre a vaga...',
        title: 'Texto de descrição da vaga',
        lang: "pt-BR"


    });
    $("#idrequisitos").summernote({
        height: 150, // set editor height
        marginLefth: 100,
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: true, // set focus to editable area after initializing summernote
        tabsize: 4,
        title: 'Texto informando os requisitos',
        placeholder: 'Requisitos para ocupar a vaga...',
        lang: "pt-BR"


    });

});
