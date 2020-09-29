$(function () {

    $("#estado").change(function () {
        var valoriduser = $("#idformendereco").val();


        var id_estado = $("#estado").val();
        // alert(id_estado);

        // $.get('/get-cidades/' + id_estado, function (cidade) {
        // $('select[name=cidade]').empty();
        // $.each(cidades, function (key, value) {
        // $('select[name=cidade]').append('<option value=' + value.id + '>' + value.cidade + '</option>');
        // });
        // });

        if (id_estado != '') {

            $.get('/get-cidades/' + id_estado, function (cidades) {
                $('select[name=cidade_idcidade]').empty();
                $.each(cidades, function (key, value) {
                    $('select[name=cidade_idcidade]').append('<option value=' + value.idcidade + '>' + value.nome + '</option>');
                    // console.log(value);
                });
            });


        } else {
            // $.get('/get-cidades', function (resultado) {
            $('select[name=cidade_idcidade]').empty();
            $('select[name=cidade_idcidade]').append("<option>  </option>");

            // });
        }


    });




    $("#idformselect").submit(function () {
        var vetidvalor = ['#cep', '#logradouro', '#estado', '#numero', '#bairro', '#cidade', '#pais_idpais', '#disp_mudanca'];
        // validaForm('#nacionalidade', 'mensnacional');
        var vetidmensag = ['menserrocep', 'menserrologra', 'menserroestado', 'menserronumero', 'menserrobairro', 'menserrocidade', 'menserropais', 'mensdisponi'];
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
        // var isChecked = $("input[name='disp_mudanca']:checked").val();
        // Checando se o radio foi selecionado
        if (!$("input[type='radio'][name='disp_mudanca']").is(':checked')) {
            event.preventDefault();
            document.getElementById('idbackgroud').style.border = 'solid';
            document.getElementById('idbackgroud').style.borderColor = 'red';
            document.getElementById('idbackgroud').style.borderWidth = 'thin';
            document.getElementById('mensdisponi').style.display = 'block';
            $('html, body').animate({
                scrollTop: 0
            }, 1500);
        } else {
            document.getElementById('idbackgroud').style.border = 'none';
            document.getElementById('mensdisponi').style.display = 'none';
        }

        // chamadas da fução de validação
        // validaFomr('#cep', 'menserrocep');
        // validaFomr('#logradouro', 'menserrologra');
        // validaFomr('#estado', 'menserroestado');
        // validaFomr('#numero', 'menserronumero');
        // validaFomr('#bairro', 'menserrobairro');
        // validaFomr('#cidade', 'menserrocidade');
        // validaFomr('#pais_idpais', 'menserropais');

        // Validação do formulario
        function validaForm(atributo, mensagem) {
            var valor = $(atributo).val();
            if (valor == '') {
                event.preventDefault();
                $(atributo).addClass('is-invalid');
                document.getElementById(mensagem).style.display = 'block';
                return true;
                // $("div.alext-box").fadeIn(300).delay(1500).fadeOut(400);
            } else {
                $(atributo).removeClass('is-invalid');
                document.getElementById(mensagem).style.display = 'none';
                return false;
                // $("div.alext-box").fadeOut();
            }
        }







    });
    // var docep = document.getElementById("cep");
    // docep.addEventListener("input", function () {
    //     var valorcep = this.value;
    //     console.log(valorcep);
    // });

});


$(document).ready(function ($) {

    $("#cep").mask('00000-000', {
        translation: {

        }
    });
    $("#bairro").mask('NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN', {
        translation: {
            N: {
                pattern: /[\wÀ-ú\d\s.]/
            },
        }
    });
    $("#logradouro").mask('NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN', {
        translation: {
            N: {
                pattern: /[\wÀ-ú\d\s.]/
            },
        }
    });

    $("#numero").mask('MNNNNNNNNN', {
        translation: {
            N: {
                pattern: /[\d]/
            },
            M: {
                pattern: /[1-9]/,
                optional: false
            },
        }
    });
    $("#complemento").mask('NNNNNNNNNNNNNNNNNNNNNNNNNNNNN', {
        translation: {
            N: {
                pattern: /[\d\s\wÀ-ú]/
            },
        }
    });


    $("#idformselect").submit(function () {
        var valor = $("#cep").val();
        var valor = valor.replace(/\D/g, '');
        $("#cep").val(valor);
        // console.log(valor);
    });

});

$("document").ready(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");

});
