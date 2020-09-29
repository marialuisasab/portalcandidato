$(function () {
    let valor_quant = document.querySelectorAll('#idname');
    document.getElementById("valor").innerHTML = valor_quant.length;



    $(".radio-inline").change(function () {
        var quantidade = document.querySelectorAll('#idname');
        // $("#valor").TextContent = quantidade.length;
        document.getElementById("valor").innerHTML = quantidade.length;
        let classi = document.getElementsByName('classificacao');
        var valor_conferi = 0;
        var vetor_conferi = [];
        for (var i = 0; i < classi.length; i++) {
            if (classi[i].checked) {
                valor_conferi++;
                if (classi[i].value != undefined) {
                    vetor_conferi[i] = classi[i];
                    var valor = vetor_conferi[i].value;
                }
            }
        }
        // alert(valor);
        // console.log(vetor_conferi);
        if (valor_conferi == '0') {
            // console.log("passei aqui 0");
            let camposfiltrados = document.querySelectorAll("#idcandidatos");
            for (var i = 0; i < camposfiltrados.length; i++) {
                var idcamposfiltrados = camposfiltrados[i];
                $(idcamposfiltrados).removeClass('invisivel');
                let quantidade = document.querySelectorAll('#idname');
                // $("#valor").TextContent = quantidade.length;
                document.getElementById("valor").innerHTML = quantidade.length;
                // console.log(quantidade.length);

            }
        } else if (valor_conferi == '1') {
            // console.log("passei aqui 1");
            for (var i = 0; i < vetor_conferi.length; i++) {
                if (vetor_conferi[i] != undefined) {
                    if (vetor_conferi[i].value == '2') {
                        let quantidade = filtrar_por_campos(classi[i].value, "#idcandidatos");
                        // filtrar_por_campos(3, "#idcandidatos", ".idstatus");
                        // alert("Classificado" + vetor_conferi[i].value);
                        // let quantidade = document.querySelectorAll('#idname');
                        // $("#valor").TextContent = quantidade.length;
                        document.getElementById("valor").innerHTML = quantidade;
                    } else if (vetor_conferi[i].value == '3') {
                        let quantidade = filtrar_por_campos(classi[i].value, "#idcandidatos");
                        // filtrar_por_campos(2, "#idcandidatos", ".idstatus");
                        // alert("Desclassificado" + vetor_conferi[i].value);
                        document.getElementById("valor").innerHTML = quantidade;
                    } else if (vetor_conferi[i].value == '1') {
                        let quantidade = filtrar_por_campos(classi[i].value, "#idcandidatos");
                        document.getElementById("valor").innerHTML = quantidade;
                    } else if (vetor_conferi[i].value == '0') {
                        let camposfiltrados = document.querySelectorAll("#idcandidatos");
                        for (var i = 0; i < camposfiltrados.length; i++) {
                            let idcamposfiltrados = camposfiltrados[i];
                            $(idcamposfiltrados).removeClass('invisivel');
                        }
                        document.getElementById("valor").innerHTML = camposfiltrados.length;

                    }
                }
            }
        } else if (valor_conferi > '1') {
            // console.log("passei aqui 2");
            // var vetor_aux = ['1', '2', '3'];
            // var valor_nao_contido;
            // for (var i = 0; i < vetor_aux.length; i++) {

            //     // if (vetor_conferi[i].value != undefined) {
            //     if ($.inArray(vetor_aux[i], vetor_conferi) !== 1) {
            //         valor_nao_contido = vetor_aux[i];
            //         console.log(valor_nao_contido + "lkjdhfkjsd");
            //         console.log(vetor_conferi);
            //         alert(valor_nao_contido);
            //     }


            //     // }

            // }
            // for (var j = 0; j < vetor_conferi.length; j++) {
            //     if (vetor_conferi[j].value != undefined) {
            //         console.log(vetor_conferi[j].value);
            //     }
            // }

            if (vetor_conferi.length == '2') {
                var camposfilt = document.querySelectorAll("#idcandidatos");
                for (var i = 0; i < camposfilt.length; i++) {
                    let idcamposfiltrados = camposfilt[i];
                    var status = $(idcamposfiltrados).attr('data_value');
                    // if (vetor_conferi[i] != undefined) {
                    if ($.inArray(status, vetor_conferi[i]) !== -1) {
                        console.log("passei aqui" + status + vetor_conferi);
                        $(idcamposfiltrados).classList.remove('invisivel');

                    } else {
                        $(idcamposfiltrados).addClass('invisivel');
                    }
                    console.log(status);

                    // console.log(vetor_conferi[i].value);
                    // }

                    // console.log(vetor_conferi.length);

                    // for (var j = 0; j < vetor_conferi.length; j++) {
                    //     if (vetor_conferi[j].value != undefined) {
                    //         if (vetor_conferi[j].value != status) {
                    //             // var valor_res = vetor_conferi[j].value;
                    //             // console.log(status);
                    //             // console.log(vetor_conferi[j].value);
                    //             $(idcamposfiltrados).addClass('invisivel');
                    //             // var teste = typeof (vetor_conferi);
                    //             console.log("passei aqui");

                    //         } else if (vetor_conferi[j].value == status) {
                    //             $(idcamposfiltrados).removeClass('invisivel');
                    //             // alert("aquiiiiiiiiiiiiiiiiiiiii");
                    //             console.log("nao contido igual " + vetor_conferi[j].value + status);
                    //         }
                    //     }

                    // }
                    // let idcamposfiltrados = camposfiltrados[i];
                    // let status = $(idcamposfiltrados).attr('data_value');
                    // // var status = $(".idstatus").attr('data_value');
                    // if (valor_nao_contido != status) {
                    //     // console.log("não contido diferente" + status + valor_nao_contido);
                    //     idcamposfiltrados.classList.remove('invisivel');
                    // } else {
                    //     $(idcamposfiltrados).addClass('invisivel');
                    //     console.log("nao contido igual" + status + valor_nao_contido);
                    // }
                }
            } else if (vetor_conferi.length == 3) {
                // console.log("passei aqui 3" + valor_conferi);
                let camposfiltrados = document.querySelectorAll("#idcandidatos");
                for (var i = 0; i < camposfiltrados.length; i++) {
                    let idcamposfiltrados = camposfiltrados[i];
                    $(idcamposfiltrados).removeClass('invisivel');
                }
            }
        }
        // else {
        //                 var camposfiltrados = document.querySelectorAll("#idcandidatos");
        //                 for (var i = 0; i < camposfiltrados.length; i++) {
        //                     var idcamposfiltrados = camposfiltrados[i];
        //                     idcamposfiltrados.classList.remove('invisivel');
        //                 }
        // }


    });
});


// funcao pra filtrar campos (desclassificados, classificados e etc)
function filtrar_por_campos(valorclassi, idatributosfiltrados) {

    let camposfiltrados = document.querySelectorAll(idatributosfiltrados);
    let count = 0;
    for (var i = 0; i < camposfiltrados.length; i++) {
        let idcamposfiltrados = camposfiltrados[i];
        // $(idcamposfiltrados).each(function () {});
        let status = $(idcamposfiltrados).attr('data_value');

        // var status = $(".idstatus").attr('data_value');
        if (valorclassi != status) {
            // alert("diferente" + status + valorclassi);
            $(idcamposfiltrados).addClass('invisivel');
        } else {
            // alert("igual" + status + valorclassi);
            $(idcamposfiltrados).removeClass('invisivel');
            count++;

        }

    }
    return count;
}
