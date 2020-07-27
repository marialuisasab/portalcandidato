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

            } else {
                document.getElementById("selcatcnh").style.display = 'none';
                document.getElementById("seleorigcnh").style.display = 'none';
                document.getElementById("numcnh").style.display = 'none';

            }

        });
    }


    var aux = document.getElementsByName('selectestadocivil');
    var prev = null;

    for (var i = 1; i < aux.length; i++) {
        aux[i].addEventListener('change', function () {
            if (this !== prev) {
                prev = this;
            }
            if (this.value == '1') {
                alert("escolhido é" + this.value);
            } else {
                alert("escolhido é");

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
    $("#rg").mask('NNNNNNNNNNN', {
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
        allowNegative: true,
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
    $("#telefone1").mask('(00)N0000-0000', {
        translation: {
            N: {
                pattern: /[9-9]/,
                optional: false
            },

        }
    });

    // adicionando mascara para o telefone 2
    $("#telefone2").mask('(00)N0000-0000', {
        translation: {
            N: {
                pattern: /[9-9]/,
                optional: false
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
        var cont = 0;
        for (var i = 0; i < vetidvalor.length; i++) {
            var valorvalida = validaForm(vetidvalor[i], vetidmensag[i]);
            if (valorvalida)
                cont++;
        }
        if (cont != '0') {
            $('html, body').animate({
                scrollTop: 0
            }, 1500);
        }

        // validaForm('#nome', 'mensnome');
        // validaForm('#cpf', 'menscpf');
        // validaForm('#rg', 'mensrg');
        // validaForm('#pretsalarial', 'menspretsala');
        // validaForm('#dtnascimento', 'mensdtnasc');
        // validaForm('#genero', 'mensgenero');
        // validaForm('#nomemae', 'mensmae');
        // validaForm('#dfisico', 'mensdtfisico');
        // validaForm('#nacionalidade', 'mensnacional');
        // validaForm('#naturalidade', 'mensnaturalidade');
        // validaForm('#natural', 'mensnatural');
        // validaForm('#telefone1', 'menstelefone');
        // validaForm('#estadocivil', 'mensestadociv');

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
