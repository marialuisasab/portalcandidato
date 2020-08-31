$(function () {

    var checkfiltros = document.getElementsByName('checkfiltros');
    var prev = null;
    for (var i = 0; i < checkfiltros.length; i++) {

        checkfiltros[i].addEventListener('change', function () {
            // (prev) ? console.log(prev.value): null;
            if (this !== prev) {
                prev = this;
            }
            if (this.value == '1') {
                document.getElementById("idformfiltronome").style.display = 'block';
                document.getElementById("idformfiltrocidade").style.display = 'none';
                document.getElementById("idformfiltronaturalidade").style.display = 'none';
                document.getElementById("idformfiltroexperiencia").style.display = 'none';
                document.getElementById("idformfiltrocargo").style.display = 'none';
            } else if (this.value == '2') {
                document.getElementById("idformfiltronaturalidade").style.display = 'block';
                document.getElementById("idformfiltronome").style.display = 'none';
                document.getElementById("idformfiltrocidade").style.display = 'none';
                document.getElementById("idformfiltroexperiencia").style.display = 'none';
                document.getElementById("idformfiltrocargo").style.display = 'none';
            } else if (this.value == '3') {
                document.getElementById("idformfiltrocidade").style.display = 'block';
                document.getElementById("idformfiltronome").style.display = 'none';
                document.getElementById("idformfiltronaturalidade").style.display = 'none';
                document.getElementById("idformfiltroexperiencia").style.display = 'none';
                document.getElementById("idformfiltrocargo").style.display = 'none';
            } else if (this.value == '4') {
                document.getElementById("idformfiltroexperiencia").style.display = 'block';
                document.getElementById("idformfiltronome").style.display = 'none';
                document.getElementById("idformfiltronaturalidade").style.display = 'none';
                document.getElementById("idformfiltrocidade").style.display = 'none';
                document.getElementById("idformfiltrocargo").style.display = 'none';
            } else {
                document.getElementById("idformfiltrocargo").style.display = 'block';
                document.getElementById("idformfiltronome").style.display = 'none';
                document.getElementById("idformfiltronaturalidade").style.display = 'none';
                document.getElementById("idformfiltrocidade").style.display = 'none';
                document.getElementById("idformfiltroexperiencia").style.display = 'none';
            }
        });
    }

    // filtrando por nome
    filtrar_por_campos("filtrarcurriculos", "#idcurriculos", ".nome_curriculo");
    // filtrando por cpf
    // filtrar_por_campos("filtrarcpf", "#idcurriculos", ".cpf_curriculo");
    // filtrando por email
    // filtrar_por_campos("filtraremail", "#idcurriculos", ".email_curriculo");
    //filtrando por naturalidade
    filtrar_por_campos("filtrarnaturalidade", "#idcurriculos", ".naturalidade_curriculo");
    // filtrando por cidade atual
    filtrar_por_campos("filtrarcidade", "#idcurriculos", ".cidade_curriculo");

    //filtrar por empresas
    filtrar_por_campos("filtrarexperiencia", "#idcurriculos", ".experirencias_curriculo");


    filtrar_por_campos("filtrarcargo", "#idcurriculos", ".cargo_curriculo");









    function filtrar_por_campos(idform, idatributosfiltrados, classe) {

        var campobuscar = document.getElementById(idform);
        campobuscar.addEventListener("input", function () {
            var camposfiltrados = document.querySelectorAll(idatributosfiltrados);
            if (this.value.length > 0) {
                for (var i = 0; i < camposfiltrados.length; i++) {
                    var contador = 0;
                    var idcamposfiltrados = camposfiltrados[i];
                    var valorinput = idcamposfiltrados.querySelector(classe);
                    var nome = valorinput.textContent;
                    var expressao = new RegExp(this.value, "i");

                    if (!expressao.test(nome)) {
                        $(idcamposfiltrados).addClass('invisivel');
                        contador++;
                    } else {
                        idcamposfiltrados.classList.remove("invisivel");
                    }

                }
                if (contador != 0) {
                    // $("#formbuscarvaga").append("<div> Não achamos a sua vaga</div>");
                    // $('<div>', {
                    //     class: 'is-invalid',
                    //     text: 'Não temos nada a dizer'
                    // }).appendTo('#formbuscarvaga');
                    // document.getElementById('idmensagembuscarvaga').style.display = 'block';
                    console.log("acertei");
                } else {
                    // document.getElementById('idmensagembuscarvaga').style.display = 'none';
                    console.log("errei");

                }


            } else {
                for (var i = 0; i < camposfiltrados.length; i++) {
                    var idcamposfiltrados = camposfiltrados[i];
                    idcamposfiltrados.classList.remove("invisivel");
                }

            }
        });
    }
    // var campobuscar = document.getElementById("filtrarcurriculos");
    // campobuscar.addEventListener("input", function () {
    //     var vagas = document.querySelectorAll("#idcurriculos");

    //     if (this.value.length > 0) {
    //         for (var i = 0; i < vagas.length; i++) {
    //             var contador = 0;
    //             var idvagas = vagas[i];
    //             var nomecurri = idvagas.querySelector(".nome_curriculo");
    //             var nome = nomecurri.textContent;
    //             var expressao = new RegExp(this.value, "i");

    //             if (!expressao.test(nome)) {
    //                 // idvagas.classList.add("invisivel");
    //                 $(idvagas).addClass('invisivel');
    //                 contador++;
    //             } else {
    //                 idvagas.classList.remove("invisivel");
    //             }

    //         }
    //         if (contador != 0) {
    //             // $("#formbuscarvaga").append("<div> Não achamos a sua vaga</div>");
    //             // $('<div>', {
    //             //     class: 'is-invalid',
    //             //     text: 'Não temos nada a dizer'
    //             // }).appendTo('#formbuscarvaga');
    //             // document.getElementById('idmensagembuscarvaga').style.display = 'block';
    //             console.log("acertei");
    //         } else {
    //             // document.getElementById('idmensagembuscarvaga').style.display = 'none';
    //             console.log("errei");

    //         }


    //     } else {
    //         for (var i = 0; i < vagas.length; i++) {
    //             var idvagas = vagas[i];
    //             idvagas.classList.remove("invisivel");
    //         }

    //     }
    // });


});
