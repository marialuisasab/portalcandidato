$(function () {

    var corpo_tabela = document.querySelector("tbody");

    // criando o select2 de acordo com os valores do select do AJAX dos estados
    $('.buscar-area').select2({
        width: '100%',
        language: "pt-BR",
    });



    $('#selectidarea').change(function () {
        var valorarea = $('#selectidarea').val();
        // alert(valorarea);

        $('tbody').empty();
        if (valorarea != '') {
            $.get('/get-formacao/' + valorarea, function (cursosform) {

                var vetorcurriculo = [];
                var vetValores = [];
                $.each(cursosform, function (key, value) {
                    // $('select[name=curriculo_select]').append('<option value=' + value.area_idarea + '>' + value.curriculo_idcurriculo + '</option>');
                    // console.log(value);
                    vetValores.push(value.curriculo_idcurriculo);
                });
                var unico = [];
                $.each(vetValores, function (i, el) {
                    if ($.inArray(el, unico) === -1) unico.push(el);
                });
                // console.log(unico);
                for (var i = 0; i < unico.length; i++) {
                    $.get('/get-curriculos/' + unico[i], function (curriculos) {
                        $.each(curriculos, function (chave, data) {
                            console.log(data);
                            vetorcurriculo.push(data);
                            // $('select[name=curriculo_select]').append('<option value=' + data.user_id + '>' + data.cpf + '</option>');
                            $.get('/get-users/' + data.users_id, function (users) {
                                // $.each(users, function (keyusers, dadosusuarios) {
                                // console.log(dadosusuarios);
                                vetorcurriculo.push(users);
                                console.log(vetorcurriculo);
                                for (var i = 0; i < users.length; i++) {
                                    var linha = document.createElement("tr");
                                    var nome = document.createElement("td");
                                    var email = document.createElement("td");
                                    var cpf = document.createElement("td");
                                    var salario = document.createElement("td");
                                    var telefone = document.createElement("td");

                                    // var foto = document.createElement("td");
                                    nome.className = "bold";

                                    var texto_nome = document.createTextNode(users[i].name);
                                    var texto_email = document.createTextNode(users[i].email);
                                    var texto_cpf = document.createTextNode(curriculos[i].cpf);
                                    var text_pretsalarial = document.createTextNode(curriculos[i].pretsalarial);
                                    var texto_telefone1 = document.createTextNode(curriculos[i].telefone1);

                                    nome.appendChild(texto_nome);
                                    email.appendChild(texto_email);
                                    cpf.appendChild(texto_cpf);
                                    salario.appendChild(text_pretsalarial);
                                    telefone.appendChild(texto_telefone1);
                                    linha.appendChild(nome);
                                    linha.appendChild(email);
                                    linha.appendChild(cpf);
                                    linha.appendChild(salario);
                                    linha.appendChild(telefone);
                                    corpo_tabela.appendChild(linha);
                                    // var text_foto  = document.im

                                }
                                // $('tr[name=trnome]').append('<td>' + dadosusuarios.name + '</td>');
                                // $('tr[name=tremail]').append('<td>' + dadosusuarios.email + '</td>');
                                // $('tr[name=cpf]').append('<td>' + dadosusuarios.cpf + '</td>');
                                // tabela_usuarios(dadosusuarios, dadosusuarios.user_id, dadosusuarios.name, dadosusuarios.email);

                                // });
                            });

                        });
                    });

                }
            });
        } else {
            $('select[name=curriculo_select]').empty();
            $('select[name=curriculo_select]').append("<option> </option");
            // console.log(value);
        }
    });


    function tabela_usuarios(objeto, conteudo, maisconteudo, conteudo3) {
        var table = document.getElementById("tabelausers");
        var tbody = table.getElementByTagName("tbody")[0];
        for (var i = 0; i < objeto.length; i++) {
            tbody.innerHTML += "<tr><td>" + conteudo + "</td><td>" + maisconteudo + "</td><td>" + conteudo3 + "</td></tr>";
        }
    }
});
