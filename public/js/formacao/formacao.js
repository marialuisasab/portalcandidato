$(function () {
    $('#escolaridade').change(function () {

        // var click = document.getElementById('escolaridade').value = this.value;
        // console.log('sei la' + this.value);



        if (this.value == '1') {

            // $('#nivel_idnivel').style.display = 'block';
            document.getElementById("idnivel").style.display = 'block';
            document.getElementById("idcategoria").style.display = 'none';
            document.getElementById("idnomeescola").style.display = 'none';



            $("#nivel_idnivel").change(function () {
                var valorid = $("#nivel_idnivel").val();
                // alert(valorid);
                var vetorEscolFund = ['1', '2', '3', '4', '5', '6']
                var vetorvalorComperiodo = ['7', '9', '11', '13'];
                if ($.inArray(valorid, vetorEscolFund) !== -1) {
                    document.getElementById("idnomeescola").style.display = 'block';
                    document.getElementById("idarea").style.display = 'none';
                    document.getElementById("idperiodo").style.display = 'none';
                    document.getElementById("idmostrarinstituicao").style.display = 'none';


                } else if ($.inArray(valorid, vetorvalorComperiodo) !== -1) {
                    document.getElementById("idmostrarinstituicao").style.display = 'block';
                    document.getElementById("idarea").style.display = 'block';
                    document.getElementById("idperiodo").style.display = 'block';
                    document.getElementById("idnomeescola").style.display = 'none';

                } else {
                    document.getElementById("idmostrarinstituicao").style.display = 'block';
                    document.getElementById("idarea").style.display = 'block';
                    document.getElementById("idperiodo").style.display = 'none';
                    document.getElementById("idnomeescola").style.display = 'none';
                }

            });
            // $('#idperiodo').style.display = 'block';



        } else {
            document.getElementById("idcategoria").style.display = 'block';
            document.getElementById("idnomeescola").style.display = 'block';
            document.getElementById("idmostrarinstituicao").style.display = 'none';
            document.getElementById("idnivel").style.display = 'none';
            document.getElementById("idperiodo").style.display = 'none';
            document.getElementById("idarea").style.display = 'none';




            // $('#idperiodo').style.display = 'none';
        }


    });

    var exem = document.getElementsByName('idconclui');
    var prev = null;

    for (var i = 0; i < exem.length; i++) {

        // exem[i].addEventListener('change', function () {
        //     (prev) ? console.log(prev.value): null;
        //     if (this !== prev) {
        //         prev = this;
        //     }
        //     console.log(this.value)
        // });


        exem[i].addEventListener('change', function () {
            // (prev) ? console.log(prev.value): null;
            if (this !== prev) {
                prev = this;
            }
            if (this.value == '1') {
                document.getElementById("dataconclu").style.display = 'block';

            } else {
                document.getElementById("dataconclu").style.display = 'none';

            }

            // if (this.value == '2') {
            //     document.getElementById("previconcl").style.display = 'block';
            // } else {
            //     document.getElementById("previconcl").style.display = 'none';

            // }
        });

    }


    var excluir_formacao = document.getElementsByName('idexcluirforma');


    for (var i = 0; i < excluir_formacao.length; i++) {
        excluir_formacao[i].addEventListener('click', function () {

            var valor = confirm("Deseja realmente excluir esta formação?!");
            if (valor) {
                location.href = '/curso/excluir/' + this.value;
                // window.onload = alert("Formação excluída!");
                // $("ul.item-ii").find("li").css("background-color", "red");

            } else {
                // location.href = 'can';
            }
        });
    }


    $('#selectinstituicao').change(function () {
        var valoridestado = $('#selectinstituicao').val();
        // alert(valoridestado);

        if (valoridestado != '') {
            $.get('/get-instituicoes/' + valoridestado, function (instituicoes) {

                $('select[name=instituicao_idinstituicao]').empty();
                $.each(instituicoes, function (key, value) {
                    $('select[name=instituicao_idinstituicao]').append('<option value=' + value.idinstituicao + '>' + value.nome + '</option>');
                    // console.log(value);
                });
            });
        } else {
            $('select[name=instituicao_idinstituicao]').empty();
            $('select[name=instituicao_idinstituicao]').append("<option> </option");
            // console.log(value);
        }
    });


    // criando o select2 de acordo com os valores do select do AJAX dos estados
    $('.js-example-theme-single').select2({
        width: '100%',
        language: "pt-BR",
    });

    // Se já estiver selecionado, limpar o select2 
    // $('.js-example-theme-single').val(null).trigger("change");

});




$("document").ready(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");

    $("#idfomrformacao").submit(function () {

        // validaForm('#nome', 'mensdesc');
        // validaForm('#escolaridade', 'mensescol');
        // validaForm('#dtinicio', 'mensdtinicio');

        var vetcampos1 = ['#nome', '#escolaridade', '#dtinicio'];
        var vetMens1 = ['mensdesc', 'mensescol', 'mensdtinicio']
        validacaoassincrona(vetcampos1, vetMens1);

        var valorselectescol = $("#escolaridade").val();
        if (valorselectescol == '1') {
            // nivel obrigatorio inserção
            var vetcamposnivel = ['#nivel_idnivel'];
            var vetMensnivel = ['mensnivel'];
            validacaoassincrona(vetcamposnivel, vetMensnivel);
            var valornivel = $("#nivel_idnivel").val();
            var vetorEscolFundnivel = ['1', '2', '3', '4', '5', '6']
            // var vetorvalorComperiodo = ['7', '9', '11', '13'];
            if ($.inArray(valornivel, vetorEscolFundnivel) == -1) {
                var vetcamposarea = ['#area_idarea'];
                var vetMensarea = ['mensarea'];
                validacaoassincrona(vetcamposarea, vetMensarea);
            } else {
                document.getElementById("idarea").style.display = 'none';
            }
            // validaForm('#nivel_idnivel', 'mensnivel');
            // validaForm('#area_idarea', 'mensarea');
            // var vetcampos2 = ['#nivel_idnivel', '#area_idarea'];
            // var vetMens2 = ['mensnivel', 'mensarea'];
            // validacaoassincrona(vetcampos2, vetMens2);
        } else if (valorselectescol == '2') {
            // validaForm('#categoria_idcategoria', 'menscategoria');
            var vetcampos3 = ['#categoria_idcategoria'];
            var vetMens3 = ['menscategoria'];
            validacaoassincrona(vetcampos3, vetMens3);
        }
    });





});


// $(document).ready(function () {
//     $('.select2-single').select2({
//         placeholder: 'Selecione os itens',
//         width: '100%'
//     });
// });



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
