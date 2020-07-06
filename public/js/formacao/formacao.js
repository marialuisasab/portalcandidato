$(function () {
    $('#escolaridade').change(function () {

        // var click = document.getElementById('escolaridade').value = this.value;
        // console.log('sei la' + this.value);



        if (this.value == '1') {

            //     $('#nivel_idnivel').style.display = 'block';
            document.getElementById("idnivel").style.display = 'block';
            document.getElementById("idperiodo").style.display = 'block';
            document.getElementById("idarea").style.display = 'block';

            // $('#idperiodo').style.display = 'block';



        } else {

            document.getElementById("idnivel").style.display = 'none';
            document.getElementById("idperiodo").style.display = 'none';
            document.getElementById("idarea").style.display = 'none';




            // $('#idperiodo').style.display = 'none';
        }



        if (this.value == '2') {
            document.getElementById("idcateg").style.display = 'block';


        } else {
            document.getElementById("idcateg").style.display = 'none';


        }


    });

    var exem = document.getElementsByName('idconclui');
    var prev = null;

    for (var i = 0; i < exem.length; i++) {

        // exem[i].addEventListener('change', function () {
        //     (prev) ? console.log(prev.value): null;
        //     if (this !== prev) {
        //         prev = this;
        //     }
        //     console.log(this.value)
        // });


        exem[i].addEventListener('change', function () {
            // (prev) ? console.log(prev.value): null;
            if (this !== prev) {
                prev = this;
            }
            if (this.value == '1') {
                document.getElementById("dataconclu").style.display = 'block';

            } else {
                document.getElementById("dataconclu").style.display = 'none';

            }

            // if (this.value == '2') {
            //     document.getElementById("previconcl").style.display = 'block';
            // } else {
            //     document.getElementById("previconcl").style.display = 'none';

            // }
        });

    }


    var excluir_formacao = document.getElementsByName('idexcluirforma');


    for (var i = 0; i < excluir_formacao.length; i++) {
        excluir_formacao[i].addEventListener('click', function () {

            var valor = confirm("Deseja realmente excluir esta formação?!");
            if (valor) {
                location.href = '/curso/excluir/' + this.value;
                // window.onload = alert("Formação excluída!");
                $("ul.item-ii").find("li").css("background-color", "red");

            } else {
                // location.href = 'can';
            }
        });
    }


    $('#selectinstituicao').change(function () {
        var valoridestado = $('#selectinstituicao').val();
        // alert(valoridestado);

        if (valoridestado != '') {
            $.get('/get-instituicoes/' + valoridestado, function (instituicoes) {

                $('select[name=instituicao_idinstituicao]').empty();
                $.each(instituicoes, function (key, value) {
                    $('select[name=instituicao_idinstituicao]').append('<option value=' + value.idinstituicao + '>' + value.nome + '</option>');
                    // console.log(value);
                });
            });
        } else {
            $('select[name=instituicao_idinstituicao]').empty();
            $('select[name=instituicao_idinstituicao]').append("<option> </option");
            // console.log(value);
        }
    });

});




$("document").ready(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");

});
