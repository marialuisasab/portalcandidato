// $(function () {

//     $("#ImageMeuPerf").mousemove(function () {
//         alert("sou um alerta");
//         console.log("asdfghjkl");
//     });
// });


$(function () {
    $("#ImageMeuPerf").click(function () {
        window.document.getElementById("ImageMeuPerf").style.background = "#32CD32";
        window.document.getElementById("ImageMeuPerf").style.color = "#32CD32";
    });

});

$(function () {
    $("#ImageMeuLog").click(function () {
        window.document.getElementById("ImageMeuLog").style.background = "#32CD32";
        window.document.getElementById("ImageMeuLog").style.color = "#32CD32";
    });

});

$(function () {
    $("#ImageMeuRegis").click(function () {
        window.document.getElementById("ImageMeuRegis").style.background = "#32CD32";
        window.document.getElementById("ImageMeuRegis").style.color = "#32CD32";
    });

});

$(function () {
    $("#IDcadastrar").click(function () {
        window.document.getElementsByTagName("idcadastrar").style.background = "#00BFFF";

    });
});


$("document").ready(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");

});



// $(function () {
//     var buscar = document.getElementById("buscarvaga");
//     buscar.addEventListener("input", function () {
//         var valor = this.value;
//         $("#accordion div.card").css("display", "block");
//         $("#accordion div.card").each(function () {
//             if ($("h4").text().indexOf(valor) < 0)
//                 $("#accordion div.card").css("display", "none");

//         });

//     });

// });



$(function () {
    var campobuscar = document.getElementById("buscarvaga");
    campobuscar.addEventListener("input", function () {
        var vagas = document.querySelectorAll("#idvagas");

        if (this.value.length > 0) {
            for (var i = 0; i < vagas.length; i++) {
                var contador = 0;
                var idvagas = vagas[i];
                var vaganome = idvagas.querySelector(".info-vaga");
                var nome = vaganome.textContent;
                var expressao = new RegExp(this.value, "i");

                if (!expressao.test(nome)) {
                    // idvagas.classList.add("invisivel");
                    $(idvagas).addClass('invisivel');
                    contador++;
                } else {
                    idvagas.classList.remove("invisivel");
                }

            }
            if (contador != 0) {
                // $("#formbuscarvaga").append("<div> Não achamos a sua vaga</div>");
                // $('<div>', {
                //     class: 'is-invalid',
                //     text: 'Não temos nada a dizer'
                // }).appendTo('#formbuscarvaga');
                document.getElementById('idmensagembuscarvaga').style.display = 'block';
                console.log("acertei");
            } else {
                document.getElementById('idmensagembuscarvaga').style.display = 'none';
                console.log("errei");

            }


        } else {
            for (var i = 0; i < vagas.length; i++) {
                var idvagas = vagas[i];
                idvagas.classList.remove("invisivel");
            }

        }
    });


    $("#idcompartilhar").click(function () {
        setClipboard('Veja as vagas de trabalho disponíveis no site da Bio Extratus: www.trabalheconosco.bioextratus.com.br');
    });



    function setClipboard(value) {
        var success = true;
        var tempInput = document.createElement("input");
        tempInput.style = "position: absolute; left: -1000px; top: -1000px";
        tempInput.value = value;
        document.body.appendChild(tempInput);
        tempInput.select();
        success = document.execCommand("copy");
        if (success) {
            alert('Link de compartilhamento copiado!');
            document.body.removeChild(tempInput);
        } else {
            alert('Falha ao copiar o link de compartilhamento!');
        }

    }

});
