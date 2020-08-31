  $("document").ready(function () {
      $("div.alert").fadeIn(300).delay(2100).fadeOut(600).hide("slow");

      $("#idbotaocurriculo").click(function () {

          var valor_botão = $("#idbotaocurriculo").val();
          if (valor_botão) {
              //   console.log(valor_botão);
              var valorid = $("#idvalor").val();
              $.get('/imprimirCurriculo/' + valorid, function (curriculo) {
                  $.each(curriculo, function (key, value) {
                      location.href = '/gerarpdf/' + value.idcurriculo;
                      // console.log(value);
                  });
              });
          } else {
              alert("Você ainda não tem curriculo no sistema!Cadastre seu curriculo para gerar o PDF.");
          }
      });

  });
