$(function () {
    $("#idformdados").submit(function (event) {
        // var carrega = window.onload();
        event.preventDefault();
        var valor_cpf = $("#cpf").val();
        var users_id = $("#botaosalvarend").val();
        valor_cpf = valor_cpf.replace(/\D/g, '');
        // $("#cpf").val(valor_cpf);
        // alert(valor_cpf);
        if (valor_cpf != '') {
            var valor_conferi = true;
            $.get('/get-cpfexisteNpertenceuser/' + valor_cpf, function (curriculo) {
                // console.log(curriculo);
                if (curriculo == 2) {
                    // event.submit();
                    // $("#idformdados").submit();
                    $('html, body').animate({
                        scrollTop: 0
                    }, 1500);
                    document.getElementById('menscpfexiste').style.display = "block";
                    $("#cpf").addClass('is-invalid');
                    // console.log("cpf igual");
                    valor_conferi = false;
                } else {
                    if (!validacpf(valor_cpf)) {
                        $("#cpf").addClass('is-invalid');
                        document.getElementById('menscpfvalido').style.display = 'block';
                        $('html, body').animate({
                            scrollTop: 0
                        }, 1500);
                    } else {
                        // event.currentTarget.submit();
                        // console.log("CPF não existe na base de dados!");
                        document.getElementById('menscpfexiste').style.display = 'none';

                    }
                }
            });

            // if (valor_conferi) this.submit();
        } else {

            document.getElementById('menscpfexiste').style.display = "none";
            // console.log("cpf vazio");

        }


    });
});



// função de validar o formulario
function validaForm(atributo, messagem) {
    var valor = $(atributo).val();
    if (valor == '') {
        event.preventDefault();
        $(atributo).addClass('is-invalid');
        document.getElementById(messagem).style.display = 'block';
        return true;
    } else {
        $(atributo).removeClass('is-invalid');
        document.getElementById(messagem).style.display = 'none';
        return false;
    }
}


// função de validação assincrona dos campos e scroll ao topo
function validacaoassincrona(vetcampos1, vetMens1) {
    var cont = 0;
    for (var i = 0; i < vetcampos1.length; i++) {
        var valorvalida = validaForm(vetcampos1[i], vetMens1[i]);
        if (valorvalida)
            cont++;
    }
    if (cont != '0') {
        $('html, body').animate({
            scrollTop: 0
        }, 1500);
    }
}


// função de verificação se o CPF é valido para a receita federal
function validacpf(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    // if (cpf == '') return false;
    // Eliminar entradas erradas e comuns de CPFs invalidos
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
        return false;
    // Valida 1o digito	
    add = 0;
    for (i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    // Valida 2o digito	
    add = 0;
    for (i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}
