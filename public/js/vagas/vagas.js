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
});
