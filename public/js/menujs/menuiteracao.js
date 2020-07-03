$(function () {

    // $("#idcadastrarcurriculo").click(function () {
    //     $("#idcadastrarcurriculo").addClass("nav-link active nav-item");
    //     $(".nav-item").slideDown();
    //     $(this).next().slideDown();
    // });

    $("#idenderecomenu").click(function () {
        var valor = $("#idcurriculouser").val();

        if (valor) {
            location.href = "/endereco";

        } else {
            // location.href = "#";
            alert("Cadastre primeiro os Dados Pessoais!");
        }

    });

    $("#idformacaomenu").click(function () {
        var valor = $("#idcurriculouser").val();

        if (valor) {
            location.href = "/cursos";
        } else {
            // location.href = "#";
            alert("Cadastre primeiro os Dados Pessoais!");
        }

    });


    $("#idexperienciasmenu").click(function () {
        var valor = $("#idcurriculouser").val();

        if (valor) {
            location.href = "/experiencias";
        } else {
            // location.href = "#";
            alert("Cadastre primeiro os Dados Pessoais!");
        }

    });


    $("#idhabilidadesmenu").click(function () {
        var valor = $("#idcurriculouser").val();

        if (valor) {
            location.href = "/habilidades";
        } else {
            // location.href = "#";
            alert("Cadastre primeiro os Dados Pessoais!");
        }

    });

    $("#idredessociaismenu").click(function () {
        var valor = $("#idcurriculouser").val();

        if (valor) {
            location.href = "/redessociais";
        } else {
            // location.href = "#";
            alert("Cadastre primeiro os Dados Pessoais!");
        }

    });


});
