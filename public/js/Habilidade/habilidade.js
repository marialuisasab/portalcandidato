$(function () {
    var nomesHabilExcluir = document.getElementsByName('botaoexcluirhabil');

    for (var i = 0; i < nomesHabilExcluir.length; i++) {
        nomesHabilExcluir[i].addEventListener('click', function () {
            var valorconfirm = confirm("Quer realmente excluir esta habilidade??");
            if (valorconfirm) {
                location.href = "/habilidade/excluir/" + this.value;
                // alert("Habilidade excluida!");
                ;
            } else {
                // location.href = "cancel";

            }
        });

    }



    $("#idformhabil").submit(function () {

        validaForm('#tipo', 'menstipo');
        validaForm('#descricao', 'mensdescri');
        validaForm('#nivel', 'mensnivel');

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

$("document").ready(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");
});
