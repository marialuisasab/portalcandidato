$(function () {
    // $("#genero").append("<option value=exemp.value> Test</option>");
    // $("#botaoeditar").mouseover(function () {
    //     $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
    //     $('<div>', {
    //         class: 'alext-box secondary',
    //         text: 'Não temos nada a dizer'
    //     }).appendTo('#botaoeditar');
    // });


    // Selecionando opções de exibir ou não a carteira de motorista para cadastro
    var exem = document.getElementsByName('tenhocnh');
    var prev = null;

    for (var i = 0; i < exem.length; i++) {

        exem[i].addEventListener('change', function () {
            // (prev) ? console.log(prev.value): null;
            if (this !== prev) {
                prev = this;
            }
            if (this.value == '1') {
                document.getElementById("selcatcnh").style.display = 'block';
                document.getElementById("seleorigcnh").style.display = 'block';
                document.getElementById("numcnh").style.display = 'block';
                var valor = $("#botaovoltar").val();
                valor = valor.replace('', this.value);
                $("#botaovoltar").val(valor);

            } else {
                document.getElementById("selcatcnh").style.display = 'none';
                document.getElementById("seleorigcnh").style.display = 'none';
                document.getElementById("numcnh").style.display = 'none';
                var valor = $("#botaovoltar").val();
                valor = valor.replace('', this.value);
                $("#botaovoltar").val(valor);
            }
        });
    }




    // var valorselect = document.getElementById('estadocivil');

    // $('#estadocivil').change(function () {


    //     window.$('option[value=' + this.value + ']').attr('selected', true)

    //     alert('o valor é:' + valorselect.value);

    //     alert('o valor é:' + this.value);
    //     window.document.getElementById('estadocivil').value = this.value;

    //     if (valorselect.value == this.value) {
    //         $(this).attr('selected', true);
    //         $('#estadocivil').val(this.value);
    //         $('option[value=' + this.value + ']').prop('selected', true);
    //     } else if (valorselect.value != this.value) {
    //         $('option[value=' + valorselect.value + ']').prop('selected', false);
    //     }

    // });



    $("#botaoeditar").mouseover(function () {

        // $("#botaoeditar").append("<div>Handler for .mouseover() called.</div>");

        // $("#botaoeditar").mouseout(function () {
        //     window.document.getElementById("botaoeditar").style.background = "#none";
        //     window.document.getElementById("botaoeditar").style.color = "#none";
    });
});


// $(document).ready(function ($) {

//     $("#cpf").mask("000.000.000-00");
//     $('#cpf').blur(function () {
//         var id = $(this).attr("id");
//         var val = $(this).val();
//         var pattern = new RegExp(/[0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2}/);

//         if (val.match(pattern) == null) {
//             $("#" + id + "_error").html("Digite um CPF válido");
//         }
//     });
// });



// adicionando mascaras cpf
$(document).ready(function ($) {

    $('#cpf').mask('000.000.000-00', {
        reverse: true
    });

    // Adicionando mascara para a RG
    $("#rg").mask('NNNNNNNNNN', {
        translation: {
            N: {
                pattern: /[\w]/
            },
        }
    });


    // Adicionando mascara para a CTPS
    $("#ctps").mask('AAAAAAA', {
        translation: {
            A: {
                pattern: /[0-9]/
            },
        }
    });


    // Adicionando mascara para a presenção salarial
    $("#pretsalarial").maskMoney({
        prefix: 'R$ ',
        allowNegative: false,
        thousands: '.',
        decimal: ',',
        affixesStay: true
    });




    // adicionando mascaras para telefone
    // var campotelefone = document.querySelector("#telefone1");

    // campotelefone.addEventListener("input", function () {

    //     var valor = this.value;
    //     var valor1 = valor.length;

    //     console.log(this.value);
    //     var SPMaskBehavior = function (valor1) {
    //             return val.replace(/\D/g, '').length === 11 ? '(00) 90000-0000' : '(00) 9000-0000';
    //         },
    //         spOptions = {
    //             onKeyPress: function (val, e, field, options) {
    //                 field.mask(SPMaskBehavior.apply({}, arguments), options);
    //             }
    //         };
    // });



    // adicionando mascara para o telefone 1
    $("#telefone1").mask('(M00)N0000-0000', {
        translation: {
            N: {
                pattern: /[9-9]/,
                optional: true
            },
            M: {
                pattern: /[0-0]/,
                optional: true
            },

        }
    });

    // adicionando mascara para o telefone 2
    $("#telefone2").mask('(M00)N0000-0000', {
        translation: {
            N: {
                pattern: /[9-9]/,
                optional: true
            },
            M: {
                pattern: /[0-0]/,
                optional: true
            },
        }
    });

    // adicionando mascara para o numero da CNH
    $("#cnh").mask('00000000000', {
        translation: {

        }
    });


    // Convertendo os dados novamente para que antes de serem mandados para o banco
    // eles não tenham caracteres "."
    // "( ou )"
    // "-"
    $("#idformdados").submit(function () {

        var vetidvalor = ['#nome', '#cpf', '#rg', '#pretsalarial', '#dtnascimento', '#genero', '#nomemae', '#dfisico', '#nacionalidade', '#naturalidade', '#natural', '#telefone1', '#estadocivil'];
        // validaForm('#nacionalidade', 'mensnacional');
        var vetidmensag = ['mensnome', 'menscpf', 'mensrg', 'menspretsala', 'mensdtnasc', 'mensgenero', 'mensmae', 'mensdtfisico', 'mensnacional', 'mensnaturalidade', 'mensnatural', 'menstelefone', 'mensestadociv'];
        validacaoassincrona(vetidvalor, vetidmensag);

        // pegando valor do tem CNH ou não
        var botaovoltar = $("#botaovoltar").val();
        if (botaovoltar == '1') {
            var vetcnh = ['#catcnh'];
            var vetmensagcnh = ['menscnh'];
            validacaoassincrona(vetcnh, vetmensagcnh);
        }



        var cpfValue = $("#cpf").val();
        if (!validacpf(cpfValue)) {
            event.preventDefault();
            $("#cpf").addClass('is-invalid');
            document.getElementById('menscpfvalido').style.display = 'block';
            $('html, body').animate({
                scrollTop: 0
            }, 1500);
        } else {
            $("#cpf").removeClass('is-invalid');
            document.getElementById('menscpfvalido').style.display = 'none';
        }
        // event.preventDefault();
        var cpfValue = $("#cpf").val();
        var rgvalue = $("#rg").val();
        var valorpret = $("#pretsalarial").val();
        // console.log(valorpret);

        // Remove os caracteres que não são numerais:
        cpfValue = cpfValue.replace(/\D/g, '');

        // Removendo os caracteres que não são alfanumericos
        rgvalue = rgvalue.replace(/\W/g, '');

        // Removendo os caracteres "." e ","
        valorpret = valorpret.replace(/[\R$.]+/g, '');
        // valorpret = valorpret.




        // Atualiza o valor no campo do formulário:
        $("#cpf").val(cpfValue);
        $("#rg").val(rgvalue);
        $("#pretsalarial").val(valorpret);
        // alert(cpfValue);
        // alert(rgvalue);
        // console.log(valorpret);

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




    $("#natural").change(function () {
        var valorid = $("#natural").val();
        // alert(valorid);
        if (valorid != '') {
            $.get('/get-cidades/' + valorid, function (cidades) {
                $('select[name=naturalidade]').empty();
                $.each(cidades, function (key, value) {
                    $('select[name=naturalidade]').append('<option value=' + value.idcidade + '>' + value.nome + '</option>');
                    // console.log(value);
                });
            });
        } else {
            $('select[name=naturalidade').empty();
            $('select[name=naturalidade]').append("<option> </option>");
        }
    });
});

// $("document").ready(function () {
//     setTimeout(function () {
//         $("div.alert").remove();
//     }, 5000); // 5 secs

// });

// Definindo o tempo de execução do alert da pagina
$("document").ready(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");

});

// validação cpf

function validacpf(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    // if (cpf == '') return false;
    // Eliminar entradas erradas e comuns de CPFs invalidos
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
        return false;
    // Valida 1o digito	
    add = 0;
    for (i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    // Valida 2o digito	
    add = 0;
    for (i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}




// $(document).ready(function () {
//     var vetcnhs = document.getElementsByName('tenhocnh');
//     var prev = null;
//     for (var i = 0; i < vetcnhs.length && vetcnhs[i] != null; i++) {
//         vetcnhs[i].addEventListener('change', function () {
//             if (this !== prev) {
//                 prev = this;
//             }
//             if (this.value == 1) {
//                 var valoridtemcnh = this.value;
//                 $("#idformdados").submit(function () {
//                     var valor = $('#catcnh').val();
//                     if ((valor == '') && (valoridtemcnh == 1)) {
//                         event.preventDefault();
//                         $('#catcnh').addClass('is-invalid');
//                         document.getElementById('menscnh').style.display = 'block';
//                         $('html, body').animate({
//                             scrollTop: 0
//                         }, 1500);
//                     }
//                 });


//                 // event.preventDefault();
//                 // console.log("eu estou aqui " + this.value);
//             } else if ((this.value == 2) || (this.value == null)) {
//                 $("#idformdados").submit(function () {
//                     var valor = $('#catcnh').val();
//                     if (valor == '') {
//                         // $('#catcnh').submit();
//                         $('#catcnh').removeClass('is-invalid');
//                         document.getElementById('menscnh').style.display = 'none';
//                     }
//                 });
//             }
//         });
//     }
// });
