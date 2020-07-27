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

        var vetidvalor = ['#idnomeemp', '#iddataini', '#idcargo'];
        // validaForm('#nacionalidade', 'mensnacional');
        var vetidmensag = ['mensempre', 'mensdataini', 'menscargo'];
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

        // validaForm('#idnomeemp', 'mensempre');
        // validaForm('#iddataini', 'mensdataini');
        // validaForm('#idcargo', 'menscargo');
        // chamada da função de validação
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
    });


});
$(document).ready(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");

});
