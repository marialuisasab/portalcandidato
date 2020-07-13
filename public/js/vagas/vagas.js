$(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");


    $("#idcandidatar").click(function () {
        var valorIdvaga = $("#idcandidatar").val();
        var valorConfirm = confirm("Deseja realmente se candidatar a esta vaga?!");

        if (valorConfirm) {
            location.href = "/vaga/candidatar/" + valorIdvaga;
        } else {

        }

    });
});
