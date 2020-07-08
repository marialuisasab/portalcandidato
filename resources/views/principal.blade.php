<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>@yield('titulo','Trabalhe Conosco')</title>


  {{-- link font icones --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  {{-- Link do Bootstrap --}}
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="/vendor/bootstrap-4.0.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="css/principal.css">
  <link rel="stylesheet" href="css/redes.css">

  {{-- Link do Js --}}
  {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script> --}}
  <script src="/vendor/jquery/jquery.min.js">
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script> --}}
  <script src="/vendor/bootstrap/js/bootstrap.min.js">
  </script>
  {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script> --}}
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>

  <script src="js/eventos.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  {{--
  Pagina principal da aplicação --}}


</head>

<body class="idBodyPrincipal">

  <div class="pos-f-t">

    <ul class="navbar-nav mr-auto">

    </ul>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="img/ImagemBioextratus.png" width="130" height="50" class="d-inline-block align-top" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <button type="button" class="btn btn-light btn-sm" id="ImageMeuLog" style="font-size:10px;"
              data-placement="bottton" title="Entrar no sistema">
              <a class="navbar-brand" href="{{ route('login') }}" style="color: gray;">

                Login
                <span class="fas fa-sign-in-alt px-2">
                </span>
              </a>
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-light btn-sm" id="ImageMeuRegis" title="Registrar novo usuário">
              <a class="navbar-brand" href="{{ route('register') }}" style="color: gray;">Registrar
                <span class="fas fa-user-plus px-2">
                  {{-- <p class="ml-2">Registrar</p>  --}}</span></a>
            </button>
          </li>
          <li class="nav-item dropdown mt-2">
            <div class="btn-group ml-4" role="group" aria-label="Button group with nested dropdown"
              style="width: -40px;">
              <div class="btn-group" role="group" title="Idiomas">
                <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <img src="img/ImagemBrasil.png" width="40" height="30" class="d-inline-block align-top" alt="">
                </button>

                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                  <a class="dropdown-item" href="" title="Português">
                    <img src="img/ImagemBrasil.png" role="button" width="40" height="30"
                      class="d-inline-block align-top" alt=""></a>

                  <a class="dropdown-item" href="" title="Spanish">
                    <img src="img/ImagemEspanha.jpg" role="button" width="40" height="30"
                      class="d-inline-block align-top" alt=""></a>

                  <a class="dropdown-item" href="" title="English">
                    <img src="img/ImagemIngles.jpg" role="button" width="40" height="30"
                      class="d-inline-block align-top" alt=""></a>

                </div>
              </div>
            </div>
          </li>

        </ul>

      </div>
    </nav>

  </div>

  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">

      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

      <div class="carousel-inner ">

        <div class="carousel-item active">
          <a href="https://loja.bioextratus.com.br">
            <img class="img-thumbnail d-block w-100" src="img/ImagemEstrutura.jpg" alt="Primeiro Slide"
              style="height: 420px;">
            <div class="carousel-caption d-none d-md-block">
              {{-- <h1>Bio Extratus Cosmetic Natural LTDA</h1>
                    <h5>Seja também um de nossos colaboradores!!!</h5> --}}
            </div>
          </a>
        </div>

      </div>
    </div>
  </div>

  <div class="container">

    <div class="row justify-content-md-center" style="margin-top: 40px;">

      <br>
      <div class="col mr-auto">

        <p class="SOBRENOS"><span class="sobrenosspan"><strong
              style="margin: 0px; font-family: open_sansregular, sans-serif; font-weight: 700; text-decoration: none;">NOSSA
              RECEITA DE SUCESSO</strong></span>
          <br style="margin: 0px; font-family: open_sansregular, sans-serif; text-decoration: none;">“Os nossos
          preciosos ingredientes são as pessoas que compõem a nossa empresa, funcionários, distribuidores e clientes. A
          relação honesta, bem sucedida e prazerosa que se estabeleceu entre a empresa e todos que a cercam e torna a
          Bio Extratus uma marca sólida, que continua sonhando e ousando para atingir as suas metas, com um enorme
          compromisso social e respeito ao meio-ambiente.”</p>

      </div>
    </div>

  </div>

  <div class="container">
    <div class="row justify-content-md-center" style="margin-top: 40px;">
      <div class="col">

        {{-- Tipo acocordin --}}
        <ul>

          <form class="form-inline ml-auto">
            <input class="form-control mr-sm-2" type="text" placeholder="Descreva o cargo, vaga..." aria-label="Search"
              title="Buscar por vaga">
            <button class="btn btn-info btn-rounded btn-sm my-0" type="submit" id="IdBuscar">
              <h3 class="font-italic" style="font-size: 15px;"><strong><span
                    class="fas fa-search mr-2"></span>Buscar</strong></h3>

            </button>
          </form>
        </ul>

        {{-- Tipo acocordin --}}

        <div id="accordion">

          <div class="card">

            <div class="card-header" id="headingOne">
              <div class="container">
                <div class="row">
                  <div class="col">

                    <h4>
                      <a href="/">
                        <p>Vaga para ...</p>
                      </a>
                    </h4>
                    <hr>
                  </div>
                </div>
                <div class="row">

                  <div class="col-sm">

                    <div class="pull-left">
                      <div class="meta-tag">
                        <span class="badge badge-light ">Alvinopolis -MG
                          <img src="img/ImagemLocalizacao.png" width="70" height="40" class="d-inline-block align-top"
                            alt="">
                        </span>
                      </div>
                    </div>

                  </div>
                  <div class="col-sm">

                  </div>
                  <div class="col-sm">
                    <div class="btn-group-vertical">
                      <a name="idcadastrar" class="btn btn-info ml-4" role="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                        style="color:white">
                        <b title="Visualizar vaga">Visualizar</b></a>
                      <a name="idcadastrar" class="btn btn-info ml-4" role="button" href="/" id="IDcadastrar"
                        title="Cadastrar na vaga">
                        <b>Cadastrar</b></a> <a class="btn btn-info ml-4" href="/">
                        <span class="fas fa-envelope" style="font-size: 35px;" title="Enviar para um amigo"></span>

                      </a>

                    </div>
                  </div>

                </div>

              </div>

            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>


          <div class="card">
            <div class="card-header" id="headingTwo">


              <div class="container">
                <div class="row">
                  <div class="col">

                    <h4>
                      <a href="/">
                        <p>Vaga para ...</p>
                      </a>
                    </h4>
                    <hr>
                  </div>
                </div>
                <div class="row">

                  <div class="col-sm">
                    {{-- <div class="footer-links">
                                  <p class="fas fa-map-marked-alt">  Rodovia Km1, MG-123 - Zona Rural</p></li>
                                  <p class="fas fa-phone"> (031) 3855-3000</p></li>
                                  <p class="fas fa-envelope"> rh@bioextratus.com.br </p></li>
                                </div> --}}

                    <div class="pull-left">
                      <div class="meta-tag">
                        <span class="badge badge-light ">Alvinopolis -MG
                          <img src="img/ImagemLocalizacao.png" width="70" height="40" class="d-inline-block align-top"
                            alt="">
                        </span>
                      </div>

                    </div>

                  </div>
                  <div class="col-sm">

                  </div>
                  <div class="col-sm">
                    <div class="btn-group-vertical">
                      <a name="idcadastrar" class="btn btn-info ml-4" role="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                        style="color:white">
                        <b title="Visualizar vaga">Visualizar</b> </a>
                      <a name="idcadastrar" class="btn btn-info ml-4" role="button" href="/" id="IDcadastrar">
                        <b title="Cadastrar na vaga">Cadastrar</b> </a>

                      <a class="btn btn-info ml-4" href="/">
                        <span class="fas fa-envelope" style="font-size: 35px;" title="Enviar vaga para um amigo">
                      </a>

                    </div>
                  </div>

                </div>

              </div>

            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header" id="headingThree">

              <div class="container">
                <div class="row">
                  <div class="col">

                    <h4>
                      <a href="/">
                        <p>Vaga para...</p>
                      </a>
                    </h4>
                    <hr>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm">

                    <div class="pull-left">
                      <div class="meta-tag">
                        <span class="badge badge-light ">Alvinopolis -MG
                          <img src="img/ImagemLocalizacao.png" width="70" height="40" class="d-inline-block align-top"
                            alt="">
                        </span>
                      </div>

                    </div>

                  </div>
                  <div class="col-sm">

                  </div>
                  <div class="col-sm">
                    <div class="btn-group-vertical">
                      <a name="idcadastrar" class="btn btn-info ml-4" role="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
                        style="color:white">
                        <b title="Visualizar vaga">Visualizar</b> </a>
                      <a name="idcadastrar" class="btn btn-info ml-4" role="button" href="/" id="IDcadastrar">
                        <b title="Cadastrar na vaga">Cadastrar</b> </a>
                      <a class="btn btn-info ml-4" href="/">
                        <span class="fas fa-envelope" style="font-size: 35px;" title="Enviar vaga para um amigo">
                      </a>

                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
        </div>
      </div>
      {{--}} Fim do row{{--}}
    </div>
  </div>

  <!-- Conteudo --parte central //-->
  <!-- Site footer -->
  <footer class="site-footer mt-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>Institucional</h6>
          <p class="text-justify">
            <li>
              <a href="/">Historia</a>
            </li>
            <li>
              <a href="/">Tecnologia e Controle de Qualidade</a>
            </li>
            <li>
              <a href="/">Onde Comprar</a>
            </li>
            <li>
              <a href="/">Visite nosso site</a>
            </li>
          </p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Politicas sociais</h6>
          <ul class="footer-links">
            <li><a href="/">Responsabilidade Ambiental</a></li>
            <li><a href="/">Responsabilidade Social</a></li>
            <li><a href="/">Fundação Bioextratus</a></li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Fale conosco</h6>
          <ul class="footer-links">
            <li><a href="/">Email...</a></li>
            <li><a href="/"> +55 (31) 3855-3002</a></li>
            <li><a href="/">...</a></li>
            <li><a href="/">Chat...</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2020 Todos os direitos são reservados à Bioextratus Cosmetics
            Natural
            <a href="https:https://loja.bioextratus.com.br">Site Oficial</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="https://www.facebook.com/bioextratus/">
                <img class="redesimg" src="img/ImagemFacebook.jpg"></a></li>
            <li><a class="twitter"
                href="https://www.linkedin.com/in/bio-extratus-cosmetic-natural-ltda-918900159/">{{--<i class="fa fa-linkedin"></i> --}}
                <img class="redesimg" src="img/ImagemLinkedin.jpg"></a></li>
            <li><a class="dribbble" href="https://www.instagram.com/bioextratus/?hl=pt-br">
                <img class="redesimg" src="img/ImagemInstagram.jpg"></a></li>
            <li><a class="youtube" href="https://www.youtube.com/bioextratusoficial">
                <img class="redesimg" src="img/ImagemYoutube.png"></a></li>
            <li><a class="flickr" href="https://www.flickr.com/photos/bioextratus/">
                <img class="redesimg" src="img/ImagemFlicker.png"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>