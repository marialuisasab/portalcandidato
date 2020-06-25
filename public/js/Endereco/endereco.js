// const {
//     ready
// } = require("jquery");

$(function () {

    $("#estado").change(function () {
        alert("ajkdhaksj");

        $('#estado').append("<div>Este elemento não pode ser em branco</div>");
    });


    $('#botaosalvarend').click(function () {
        var valor = $('#estado').val();

        if (valor == null) {
            $('#estado').append("<div>Este elemento não pode ser em branco</div>");
        }
        alert(valor);

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


    $("#estado").change(function () {
        // window.document.getElementById("genero").style.background = "#32CD32";
        // window.document.getElementById("genero").style.color = "#32CD32";
        // window.document.getElementById("genero").value = 1;
        // document.getElementById('genero').value = this.value;

        // window.document.getElementById('#collapseOne').addClass('collapse');
        // document.location.reload(true);
    });




    $('#estado').change(function () { // pega o evento do form submit
        $.ajax({ // create an AJAX call...
            data: $(this).serialize(), // pega os dados do form
            type: $(this).attr('method'), // GET ou POST
            url: $(this).attr('action'), // pega a url no form action
            success: function (response) { // quando bem sucedido

                // $('#complemento').append("<option> Test</option>");
                // $('#complemento').val(data.value)

                // $('#idcidadeselect').html(response); // atualiza o DIV
            }
        });
        return false;
    });


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

});
