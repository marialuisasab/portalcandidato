$(function () {
    // $("#natural").change(function () {
    //     var valorid = $("#natural").val();
    //     // alert(valorid);
    //     if (valorid != '') {
    //         $.get('/get-cidades/' + valorid, function (cidades) {
    //             $('select[name=naturaidademodal]').empty();
    //             $.each(cidades, function (key, value) {
    //                 $('select[name=naturaidademodal]').append('<option value=' + value.idcidade + '>' + value.nome + '</option>');
    //                 // console.log(value);
    //             });
    //         });
    //     } else {
    //         $('select[name=naturaidademodal]').empty();
    //         $('select[name=naturaidademodal]').append("<option> </option>");
    //     }
    // });

    pegar_cidade_estado("#natural", "naturalidademodal");
    pegar_cidade_estado("#estadoatual", "cidadeatualmodal");


    $("#escolaridade").change(function () {
        var valor_escolaridade = $("#escolaridade").val();
        if (valor_escolaridade == '1') {
            document.getElementById('idnivel_modal_busca').style.display = "block";
            document.getElementById('categoria_modal_busca').style.display = "none";
            document.getElementById('area_modal_busca').style.display = "block";

        } else if (valor_escolaridade == '2') {
            document.getElementById('categoria_modal_busca').style.display = "block";
            document.getElementById('idnivel_modal_busca').style.display = "none";
            document.getElementById('area_modal_busca').style.display = "none";

        } else {
            document.getElementById('idnivel_modal_busca').style.display = "none";
            document.getElementById('categoria_modal_busca').style.display = "none";
            document.getElementById('area_modal_busca').style.display = "none";
        }

    });



    // $("#form_busca_avancada").submit(function () {


    // });


});





// funcao para pegar cidades de um estado pelo ID
function pegar_cidade_estado(idatributo, nameatributo) {
    $(idatributo).change(function () {
        //     var valorid = $("#natural").val();
        var valorid = $(idatributo).val();
        if (valorid != '') {
            $.get('/get-cidadesmodal/' + valorid, function (cidades) {
                var name = document.getElementsByName(nameatributo);
                $(name).empty();
                $.each(cidades, function (key, value) {
                    $(name).append('<option value=' + value.idcidade + '>' + value.nome + '</option>');
                });
            });
        } else {
            var name = document.getElementsByName(nameatributo);
            $(name).empty();
            $(name).append("<option> </option>");
        }
    });
}



// $("document").ready(function () {
//     var quantidade = document.querySelectorAll("td.nome_curriculo");
//     var quant = quantidade.length;

//     document.getElementById("col_quantidade").innerHTML = quant;
// });

// $("document").ready(function () {
//     $("#busca_avancada").click(function () {
//         $("#busca_avancada").addClass('active');
//         $("#busca_palavra_chave").removeClass('active');
//         document.getElementById("form_busca_avancada").style.display = "block";
//         document.getElementById("form_busca_chave").style.display = "none";
//     });
//     $("#busca_palavra_chave").click(function () {
//         $("#busca_palavra_chave").addClass('active');
//         $("#busca_avancada").removeClass('active');
//         document.getElementById("form_busca_chave").style.display = "block";
//         document.getElementById("form_busca_avancada").style.display = "none";

//     });
// });
