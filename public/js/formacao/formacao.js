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


});
