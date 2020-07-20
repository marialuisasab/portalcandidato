$(function () {
    var aux = document.getElementsByName('trabalho');
    var prev = null;

    for (var i = 0; i < aux.length; i++) {
        aux[i].addEventListener('change', function () {

            if (this != prev) {
                prev = this;

            }
            if (this.value == '2') {
                document.getElementById("datatermino").style.display = 'block';

            } else {
                document.getElementById("datatermino").style.display = 'none';

            }
        });
    }

    // $(this).append("<p> quer realmente excluir este item??</p>");
    // window.onload = $("#botaoexcluir").click(function del(id) {

    //     var valor = confirm("deseja realmente excluir esta experiencia?!");
    //     if (valor) {
    //         location.href = '/experiencia/excluir/' + id;
    //         window.onload = alert("Experiencia excluída!");
    //     } else {
    //         location.href = 'experiencias';

    //     }
    // });

    var nomesexcluirexp = document.getElementsByName('botaoexcluir');
    var dev;

    for (var i = 0; i < nomesexcluirexp.length; i++) {
        nomesexcluirexp[i].addEventListener('click', function () {


            var valor = confirm("deseja realmente excluir esta experiencia?!");
            if (valor) {
                location.href = '/experiencia/excluir/' + this.value;
                // window.onload = alert("Experiencia excluída!");
            } else {
                // location.href = 'experiencias';

            }
        });
    }





    $("#idformexp").submit(function () {

        validaForm('#idnomeemp', 'mensempre');
        validaForm('#iddataini', 'mensdataini');
        validaForm('#idcargo', 'menscargo');



        function validaForm(atributo, messagem) {
            var valor = $(atributo).val();
            if (valor == '') {
                event.preventDefault();
                $(atributo).addClass('is-invalid');
                document.getElementById(messagem).style.display = 'block';
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            } else {

                $(atributo).removeClass('is-invalid');
                document.getElementById(messagem).style.display = 'none';
            }

        }



    });


});
$(document).ready(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");

});
