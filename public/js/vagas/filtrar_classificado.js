$(function () {


    // document.addEventListener("DOMContentLoaded", function () {
    //     // após o DOM ter sido carregado,
    //     // atribui o elemento à variável
    //     log = document.getElementById("lognome");
    // });
    let valor_quant = document.querySelectorAll('#idname');
    if (valor_quant != undefined) {
        var teste = document.getElementById('valor');
        if (teste != undefined) {
            teste.innerHTML = valor_quant.length;
        } else {}
    }



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
                    // var valor = vetor_conferi[i].value;
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
                idcamposfiltrados.classList.remove("invisivel");
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
                        let quantidade = filtrar_por_campos(vetor_conferi[i].value, "#idcandidatos");
                        // filtrar_por_campos(3, "#idcandidatos", ".idstatus");
                        // alert("Classificado" + vetor_conferi[i].value);
                        // let quantidade = document.querySelectorAll('#idname');
                        // $("#valor").TextContent = quantidade.length;
                        document.getElementById("valor").innerHTML = quantidade;
                        if (quantidade == '0') {
                            document.getElementById('vazio_registros').style.display = 'block';
                        } else {
                            document.getElementById('vazio_registros').style.display = 'none';
                        }
                    } else if (vetor_conferi[i].value == '3') {
                        let quantidade = filtrar_por_campos(vetor_conferi[i].value, "#idcandidatos");
                        // filtrar_por_campos(2, "#idcandidatos", ".idstatus");
                        // alert("Desclassificado" + vetor_conferi[i].value);
                        document.getElementById("valor").innerHTML = quantidade;
                        if (quantidade == '0') {
                            document.getElementById('vazio_registros').style.display = 'block';
                        } else {
                            document.getElementById('vazio_registros').style.display = 'none';
                        }
                    } else if (vetor_conferi[i].value == '1') {
                        let quantidade = filtrar_por_campos(vetor_conferi[i].value, "#idcandidatos");
                        document.getElementById("valor").innerHTML = quantidade;
                        if (quantidade == '0') {
                            document.getElementById('vazio_registros').style.display = 'block';
                        } else {
                            document.getElementById('vazio_registros').style.display = 'none';
                        }
                    } else if (vetor_conferi[i].value == '4') {
                        let quantidade = filtrar_por_campos(vetor_conferi[i].value, "#idcandidatos");
                        // filtrar_por_campos(2, "#idcandidatos", ".idstatus");
                        // alert("Desclassificado" + vetor_conferi[i].value);
                        document.getElementById("valor").innerHTML = quantidade;
                        if (quantidade == '0') {
                            document.getElementById('vazio_registros').style.display = 'block';
                        } else {
                            document.getElementById('vazio_registros').style.display = 'none';
                        }
                    } else if (vetor_conferi[i].value == '0') {
                        var camposfiltrados = document.querySelectorAll("#idcandidatos");
                        for (var i = 0; i < camposfiltrados.length; i++) {
                            console.log("passei aqui");
                            var idcamposfiltrados = camposfiltrados[i];
                            $(idcamposfiltrados).removeClass('invisivel');
                            let quantidade = document.querySelectorAll('#idname');
                            // $("#valor").TextContent = quantidade.length;
                            document.getElementById("valor").innerHTML = quantidade.length;
                            document.getElementById('vazio_registros').style.display = 'none';
                        }
                    } else {
                        break;
                    }
                }
            }
        }

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
