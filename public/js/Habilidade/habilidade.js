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

});

$("document").ready(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");

});