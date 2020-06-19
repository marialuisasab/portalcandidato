$(function () {
    var nomesHabilExcluir = document.getElementsByName('botaoexcluirhabil');

    for (var i = 0; i < nomesHabilExcluir.length; i++) {
        nomesHabilExcluir[i].addEventListener('click', function () {
            var valorconfirm = confirm("Quer realmente excluir esta habilidade??");
            if (valorconfirm) {
                location.href = "/habilidade/excluir/" + this.value;
                alert("Habilidade excluida!")
            } else {
                // location.href = "cancel";

            }
        });

    }

});
