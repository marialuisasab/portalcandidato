$(function () {
    $("#genero").change(function () {
        // window.document.getElementById("genero").style.background = "#32CD32";
        // window.document.getElementById("genero").style.color = "#32CD32";
        // window.document.getElementById("genero").value = 1;
        // document.getElementById('genero').value = this.value;
        var exemp = this.value;

        $("#genero").append("<option value=exemp.value> Test</option>");



    });


    var exem = document.getElementsByName('tenhocnh');
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
                document.getElementById("selcatcnh").style.display = 'block';
                document.getElementById("seleorigcnh").style.display = 'block';
                document.getElementById("numcnh").style.display = 'block';

            } else {
                document.getElementById("selcatcnh").style.display = 'none';
                document.getElementById("seleorigcnh").style.display = 'none';
                document.getElementById("numcnh").style.display = 'none';

            }

        });
    }


    var aux = document.getElementsByName('selectestadocivil');
    var prev = null;

    for (var i = 1; i < aux.length; i++) {
        aux[i].addEventListener('change', function () {
            if (this !== prev) {
                prev = this;
            }
            if (this.value == '1') {
                alert("escolhido é" + this.value);
            } else {
                alert("escolhido é");

            }

        });
    }


    // var valorselect = document.getElementById('estadocivil');

    // $('#estadocivil').change(function () {


    //     window.$('option[value=' + this.value + ']').attr('selected', true)

    //     alert('o valor é:' + valorselect.value);

    //     alert('o valor é:' + this.value);
    //     window.document.getElementById('estadocivil').value = this.value;

    //     if (valorselect.value == this.value) {
    //         $(this).attr('selected', true);
    //         $('#estadocivil').val(this.value);
    //         $('option[value=' + this.value + ']').prop('selected', true);
    //     } else if (valorselect.value != this.value) {
    //         $('option[value=' + valorselect.value + ']').prop('selected', false);
    //     }

    // });



    $("#botaoeditar").mouseover(function () {
        // window.document.getElementById("botaoeditar").style.background = "#32CD32";
        // window.document.getElementById("botaoeditar").style.color = "#32CD32";
        // $("#botaoeditar").append("<div>Handler for .mouseover() called.</div>");

        // $("#botaoeditar").mouseout(function () {
        //     window.document.getElementById("botaoeditar").style.background = "#none";
        //     window.document.getElementById("botaoeditar").style.color = "#none";
    });
});
