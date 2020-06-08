$(function () {
    $("#genero").change(function () {
        // window.document.getElementById("genero").style.background = "#32CD32";
        // window.document.getElementById("genero").style.color = "#32CD32";
        // window.document.getElementById("genero").value = 1;
        // document.getElementById('genero').value = this.value;
        var exemp = this.value;

        $("#genero").append("<option value=exemp.value> Test</option>");



    });

});
