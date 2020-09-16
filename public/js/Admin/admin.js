$(function () {

    $("#formulariologin").submit(function (event) {
        event.preventDefault();
        var valoremail = $("#email").val();
        var valorpassword = $("#password").val();
        console.log(valoremail);
        console.log(valorpassword);
        if (valoremail != '') {
            $.get('/get-emailadmin/' + valoremail, function (email) {

                if (email == '2') {
                    document.getElementById('mensemail').style.display = 'none';
                    event.currentTarget.submit();

                } else {
                    document.getElementById('mensemail').style.display = 'block';

                }
            });
        }

        // $.get('/get-emailadmin/' + valoremail, function (email) {

        //     if (email == '2') {
        //         document.getElementById('mensemail').style.display = 'none';
        //         alert("Deu certo");
        //     } else {
        //         document.getElementById('mensemail').style.display = 'block';
        //         alert("Deu errado");
        //     }
        // });
    });


});


$("document").ready(function () {
    $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");

});
