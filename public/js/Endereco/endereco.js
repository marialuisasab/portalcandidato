// const {
//     ready
// } = require("jquery");
// FIND UTILIZADO PARA PESQUISAR SOBRE O DOMN    FORM[NAME="FORMLOGIN"]').SUBMIT(FUNCTION (EVENT)){
// VAR EMAIL = $THIS.FUNC('INPUT#EMAIL').VAL();
// }

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
                    console.log(value);
                });
            });


        } else {
            // $.get('/get-cidades', function (resultado) {
            $('select[name=cidade_idcidade]').empty();
            $('select[name=cidade_idcidade]').append("<option>  </option>");

            // });
        }


    });



    // $("#estado").change(function () {
    //     var valoriduser = $("#idformendereco").val();


    //     var id_estado = $("#estado").val();
    //     // alert(id_estado);

    //     $.ajax({
    //         url: '/endereco/editar/' + valoriduser,
    //         type: 'GET',
    //         data: {
    //             id_estado: id_estado,

    //         },
    //         success: function (data) {
    //             // window.location.reload();
    //             alert("ok");
    //         }
    //     });



    // });


    $('#botaosalvarend').click(function () {
        var valor = $('#estado').val();

        if (valor == null) {
            $('#estado').append("<div>Este elemento não pode ser em branco</div>");
        }
        // alert(valor);

        // var SelectEstado = document.querySelector("#estado");
        // SelectEstado.addEventListener("change", function () {
        //     var valor = this.value;
        //     alert(valor);


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

    });

    // window.document.getElementById("genero").style.background = "#32CD32";
    // window.document.getElementById("genero").style.color = "#32CD32";
    // window.document.getElementById("genero").value = 1;
    // document.getElementById('genero').value = this.value;
    //  $("#collapseOne").click(className = "collapse");


    // $('#estado').change(function () {
    //     // window.document.getElementById("genero").style.background = "#32CD32";
    //     // window.document.getElementById("genero").style.color = "#32CD32";
    //     // window.document.getElementById("genero").value = 1;
    //     // document.getElementById('genero').value = this.value;

    //     // window.document.getElementById('#collapseOne').addClass('collapse');
    //     // document.location.reload(true);
    // });




    // $('#estado').change(function () { // pega o evento do form submit
    //     $.ajax({ // create an AJAX call...
    //         data: $(this).serialize(), // pega os dados do form
    //         // type: $(this).attr('method'), // GET ou POST
    //         // url: "/endereco.php" // pega a url no form action
    //         // success: function (response) { // quando bem sucedido

    //         // $('#complemento').append("<option> Test</option>");
    //         // $('#complemento').val(data.value)

    //         // $('#idcidadeselect').html(response); // atualiza o DIV

    //     });
    //     return false;
    // });

    $("#idformselect").submit(function () {
        // var valorcep = $("#cep").val();
        // if (valorcep == '') {
        //     event.preventDefault();
        //     $("#cep").addClass('is-invalid');
        //     $('<div>', {
        //         class: 'invalid-feedback',
        //         text: 'Você deve preencher o cep corretamente!'
        //     }).appendTo('#idlicep');
        //     $("div.invalid-feedback").fadeIn(300).delay(1500).fadeOut(400);
        // }

        // function validavazio(atributo, atributo2, atributo3) {
        //     var valoratributo = $(atributo).val();
        //     if (valoratributo == '') {
        //         validaFomr(atributo, atributo2, atributo3);
        //     }
        //     $(atributo).removeClass('is-invalid');
        // }
        // validavazio('#cep', '#idlicep', 'cep');
        // validavazio('#logradouro', '#idlilogr', 'logradouro');
        // validavazio('#estado', '#idliestado', 'estado');
        // validavazio('#numero', '#idlinumero', 'numero');
        // validavazio('#bairro', '#idlibairro', 'bairro');
        // validavazio('#cidade', '#idlicidade', 'cidade');
        // validavazio('#pais_idpais', '#idlipais', 'pais');


        validaFomr('#cep', '#idlicep', 'cep');
        validaFomr('#logradouro', '#idlilogr', 'logradouro');
        validaFomr('#estado', '#idliestado', 'estado');
        validaFomr('#numero', '#idlinumero', 'numero');
        validaFomr('#bairro', '#idlibairro', 'bairro');
        validaFomr('#cidade', '#idlicidade', 'cidade');
        validaFomr('#pais_idpais', '#idlipais', 'pais');



        function validaFomr(atributo, li, name) {
            var valorcep = $(atributo).val();
            if (valorcep == '') {
                event.preventDefault();
                $(atributo).addClass('is-invalid');
                // $('<div>', {
                //     class: 'invalid-feedback',
                //     text: 'Você deve o ' + name + ' corretamente'
                // }).appendTo(li);
                // $("div.invalid-feedback").fadeIn(300).delay(1500).fadeOut(400);
            } else {
                $(atributo).removeClass('is-invalid');

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

    $("#numero").mask('9N#', {
        translation: {
            N: {
                pattern: /[\d]/
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
