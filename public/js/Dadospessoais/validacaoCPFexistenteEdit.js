$(function () {
    $("#idformdados").submit(function (event) {
        event.preventDefault();
        var valor_tem_curriculo = $("#curriculo_CPF:first");
        var valor_verifica = valor_tem_curriculo.attr('data_value');

        var contador = 0;
        var valor_id_user = $("#id_user").attr('data_value');
        var vetor_users = [];
        var valor_cpf = $("#cpf").val();

        valor_cpf = valor_cpf.replace(/\D/g, '');

        // if (valor_verifica) {
        if (valor_cpf != '') {
            $.get('/get-cpfexistepertence/' + valor_id_user, function (curriculo) {
                // console.log(curriculo);
                vetor_users.push(curriculo);
                // var valor_cpf = curriculo[i].cpf;
                // console.log(valor);
                $.get('/get-cpfexisteNpertenceuser/' + valor_cpf, function (existe) {
                    if (existe == 2) {
                        for (var i = 0; i < curriculo.length; i++) {

                            $.get('/get-pegarcpf/' + valor_cpf, function (cpf_curriculo) {
                                for (var i = 0; i < cpf_curriculo.length; i++) {
                                    // console.log(cpf_curriculo[i].users_id);
                                    // console.log(valor_id_user);
                                    if (valor_id_user != cpf_curriculo[i].users_id) {
                                        $('html, body').animate({
                                            scrollTop: 0
                                        }, 1500);
                                        document.getElementById('menscpfexiste').style.display = "block";
                                        $("#cpf").addClass('is-invalid');
                                        // console.log("CPF existe e não é o meu o meu!");
                                    } else {
                                        // console.log("CPF existe e é o meu!");
                                        var vetidvalor = ['#nome', '#cpf', '#rg', '#pretsalarial', '#dtnascimento', '#genero', '#nomemae', '#dfisico', '#nacionalidade', '#naturalidade', '#natural', '#telefone1', '#estadocivil'];
                                        // validaForm('#nacionalidade', 'mensnacional');
                                        var vetidmensag = ['mensnome', 'menscpf', 'mensrg', 'menspretsala', 'mensdtnasc', 'mensgenero', 'mensmae', 'mensdtfisico', 'mensnacional', 'mensnaturalidade', 'mensnatural', 'menstelefone', 'mensestadociv'];
                                        validacaoassincrona(vetidvalor, vetidmensag, event);

                                        // pegando valor do tem CNH ou não
                                        var botaovoltar = $("#botaovoltar").val();
                                        if (botaovoltar == '1') {
                                            var vetcnh = ['#catcnh'];
                                            var vetmensagcnh = ['menscnh'];
                                            validacaoassincrona(vetcnh, vetmensagcnh, event);
                                        }
                                        document.getElementById('menscpfexiste').style.display = "none";
                                        $("#cpf").removeClass('is-invalid');
                                    }
                                }
                            });
                        }
                    } else {
                        if (!validacpf(valor_cpf)) {
                            $("#cpf").addClass('is-invalid');
                            document.getElementById('menscpfvalido').style.display = 'block';
                            $('html, body').animate({
                                scrollTop: 0
                            }, 1500);
                        } else {
                            var vetidvalor = ['#nome', '#cpf', '#rg', '#pretsalarial', '#dtnascimento', '#genero', '#nomemae', '#dfisico', '#nacionalidade', '#naturalidade', '#natural', '#telefone1', '#estadocivil'];
                            // validaForm('#nacionalidade', 'mensnacional');
                            var vetidmensag = ['mensnome', 'menscpf', 'mensrg', 'menspretsala', 'mensdtnasc', 'mensgenero', 'mensmae', 'mensdtfisico', 'mensnacional', 'mensnaturalidade', 'mensnatural', 'menstelefone', 'mensestadociv'];
                            validacaoassincrona(vetidvalor, vetidmensag, event);

                            // pegando valor do tem CNH ou não
                            var botaovoltar = $("#botaovoltar").val();
                            if (botaovoltar == '1') {
                                var vetcnh = ['#catcnh'];
                                var vetmensagcnh = ['menscnh'];
                                validacaoassincrona(vetcnh, vetmensagcnh, event);
                            }
                            // event.currentTarget.submit();
                            // console.log("CPF não existe na base de dados!");
                        }

                    }


                    //else if (valor_cpf == curriculo[i].cpf) {
                    //     // alert("o cpf ja existe no banco de dados e pertence a vc");
                    //     contador++;
                    //     console.log(contador);
                    //     $("#idformdados").submit();
                    // }

                });


            });

        }
        document.getElementById('menscpfexiste').style.display = "none";

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
function validacaoassincrona(vetcampos1, vetMens1, event) {
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
    } else {
        event.currentTarget.submit();

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
