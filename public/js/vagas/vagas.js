$(function () {
    $("div.alert").fadeIn(9400).delay(4100).fadeOut(6000).hide("slow");

    $("#idcandidatar").click(function () {
        var valorIdvaga = $("#idcandidatar").val();
        var valorConfirm = confirm("Deseja realmente se candidatar a esta vaga?!");

        if (valorConfirm) {
            location.href = "/vaga/candidatar/" + valorIdvaga;
        } else {
            event.preventDefault();

        }

    });


    // chamada da função de excluir itens para a confirmação da exclusão da vaga
    excluir_itens('name_excluir_vaga', 'data_value', "Deseja realmente excluir a esta vaga?!", "/excluirvaga/");

    // chamada da função de excluir itens para a confirmação da copia da vaga
    excluir_itens('name_copiar_vaga', 'data_value', "Deseja realmente copiar esta vaga?!", "/copiarvaga/");


});


// função para excluir itens através de um atributo name
function excluir_itens(attr_name, data_value, mensagem_confirm, url) {
    var item_excluir = document.getElementsByName(attr_name);
    for (var i = 0; i < item_excluir.length; i++) {
        item_excluir[i].addEventListener('click', function () {
            var conteudo_valor = this.getAttribute(data_value);
            var valorConfirm = confirm(mensagem_confirm);
            if (valorConfirm) {
                event.preventDefault();
                location.href = url + conteudo_valor;
            } else {
                event.preventDefault();
            }
        });
    }
}
