$(function () {

    // window.document.getElementById("genero").style.background = "#32CD32";
    // window.document.getElementById("genero").style.color = "#32CD32";
    // window.document.getElementById("genero").value = 1;
    // document.getElementById('genero').value = this.value;
    //  $("#collapseOne").click(className = "collapse");


    $("#estado").change(function () {
        // window.document.getElementById("genero").style.background = "#32CD32";
        // window.document.getElementById("genero").style.color = "#32CD32";
        // window.document.getElementById("genero").value = 1;
        // document.getElementById('genero').value = this.value;

        // window.document.getElementById('#collapseOne').addClass('collapse');
        // document.location.reload(true);






    });




    $('#estado').change(function () { // pega o evento do form submit
        $.ajax({ // create an AJAX call...
            data: $(this).serialize(), // pega os dados do form
            type: $(this).attr('method'), // GET ou POST
            url: $(this).attr('action'), // pega a url no form action
            success: function (response) { // quando bem sucedido

                // $('#complemento').append("<option> Test</option>");
                // $('#complemento').val(data.value)

                // $('#idcidadeselect').html(response); // atualiza o DIV
            }
        });
        return false;
    });





});
