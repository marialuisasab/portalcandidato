$(function () {

    $("#idenderecomenu").click(function () {
        var valor = $("#idcurriculouser").val();

        if (valor) {
            location.href = "/endereco";
        } else {
            location.href = "#";
            alert("Você deve preencher seus dados pessoais primeiro!!!");
        }

    });

    $("#idformacaomenu").click(function () {
        var valor = $("#idcurriculouser").val();

        if (valor) {
            location.href = "/cursos";
        } else {
            location.href = "#";
            alert("Você deve preencher seus dados pessoais primeiro!!!");
        }

    });


    $("#idexperienciasmenu").click(function () {
        var valor = $("#idcurriculouser").val();

        if (valor) {
            location.href = "/experiencias";
        } else {
            location.href = "#";
            alert("Você deve preencher seus dados pessoais primeiro!!!");
        }

    });


    $("#idhabilidadesmenu").click(function () {
        var valor = $("#idcurriculouser").val();

        if (valor) {
            location.href = "/habilidades";
        } else {
            location.href = "#";
            alert("Você deve preencher seus dados pessoais primeiro!!!");
        }

    });

    $("#idredessociaismenu").click(function () {
        var valor = $("#idcurriculouser").val();

        if (valor) {
            location.href = "/redessociais";
        } else {
            location.href = "#";
            alert("Você deve preencher seus dados pessoais primeiro!!!");
        }

    });


});
