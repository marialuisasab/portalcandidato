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

  <style type="text/css">

  </style>
</head>

<body class="idBodyPrincipal">

  <div class="pos-f-t">
    <ul class="navbar-nav mr-auto">
    </ul>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #658f69;">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img class="for_default"
          src="https://bioextratus.com.br/wp-content/uploads/2016/06/Logo-Bio-Extratus-Cosméticos-Naturais-Site.png"
          width="225" height="54" alt="Bio Extratus">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">

            <a class="navbar-brand" href="{{ route('login') }}" style="color:white;" type="button">
              Entrar
              <span class="fas fa-sign-in-alt px-2">
              </span>
            </a>

          </li>
          <li class="nav-item">

            <a class="navbar-brand" href="{{ route('register') }}" style="color: white;" type="button">Criar uma conta
              <span class="fas fa-user-plus px-2"></span>
            </a>

          </li>

        </ul>
      </div>
    </nav>
  </div>


  <div class="bio-image">
    <div class="bio-text">
      <h1><i>Trabalhe Conosco <b>Bio Extratus</b></i></h1>
      <h5>Cadastre seu currículo na plataforma e venha trabalhar conosco!</h5>
    </div>
  </div>
  <!--
  <div class="page-header">
    <h1><i>Portal do Candidato <b>Bio Extratus</b></i></h1>
    <p>Cadastre seu currículo na plataforma e venha trabalhar conosco!</p> 
    <h5>Caso não encontre uma vaga adequada, faça sua inscrição e seu currículo ficará em nosso banco de talentos</h5>  
  </div>
-->
  <div class="container">
    <div class="row justify-content-md-center" style="margin-top: 40px;">
      <br>
      <div class="col mr-auto">
        <p class="SOBRENOS">
          <span class="sobrenosspan">
            <strong
              style="margin: 0px; font-family: open_sansregular, sans-serif; font-weight: 700; text-decoration: none;">
              NOSSA RECEITA DE SUCESSO
            </strong>
          </span>
          <br style="margin: 0px; font-family: open_sansregular, sans-serif; text-decoration: none;">
          Os nossos
          preciosos ingredientes são as pessoas que compõem a nossa empresa, funcionários, distribuidores e clientes. A
          relação honesta, bem sucedida e prazerosa que se estabeleceu entre a empresa e todos que a cercam e torna a
          Bio Extratus uma marca sólida, que continua sonhando e ousando para atingir as suas metas, com um enorme
          compromisso social e respeito ao meio-ambiente.</p>
        <p class="SOBRENOS">
          <span class="sobrenosspan">
            <strong
              style="margin: 0px; font-family: open_sansregular, sans-serif; font-weight: 700; text-decoration: none;">
              NOSSO MUITO OBRIGADO
            </strong>
          </span>
          <br style="margin: 0px; font-family: open_sansregular, sans-serif; text-decoration:none;">
          Pelo companheirismo, dedicação e vontade de vencer a cada dia, gostaríamos de agradecer a todos que nos
          cercam. Sem vocês, o sonho não se tornaria realidade.
        </p>
      </div>
    </div>

  </div>

  <div class="container">
    <div class="row justify-content-md-center" style="margin-top: 40px;">
      <div class="col">
        <div id="accordion">
          <div class="card" style="text-align: center;">
            <div class="card-header" id="headingOne">
              <div class="container">
                <div class="row">
                  <h5>
                    Veja abaixo as vagas disponíveis, ou, caso não encontre uma vaga no momento, não
                    se preocupe, deixe seus dados cadastrados em nosso Banco de Talentos.<br>Clique <a name="cadastrar"
                      href="{{route('home')}}" class="badge badge-info" style="color:white;"><u>aqui</u></a> para entrar
                    e cadastrar o seu currículo.
                  </h5>
                </div>
                <hr>
                <div class="row">
                  <div class="col">
                    <h4>
                      Caso seja o primeiro acesso, clique abaixo para criar uma conta:
                    </h4>
                    <button class="btn btn-info ">
                      <a name="cadastrar" href="{{route('register')}}" style="color:white;">
                        <b>Criar uma conta</b> <span class="fas fa-user-plus px-2"></span>
                      </a>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <ul>
            <form class="form-inline ml-auto" style="margin-top: 20px;">
              <input class="form-control mr-sm-2" type="text" placeholder="Filtrar pelo cargo, vaga..."
                aria-label="Search" title="Buscar por vaga" id="buscarvaga">
            </form>
            <div class="is-invalid" style="color:red; display: none;" id="idmensagembuscarvaga">
              <strong>Não encontramos a vaga que foi buscada!</strong>
            </div>
          </ul>
          @if(count($vagas)==0)
          <div class="card" style="text-align: center;">
            <div class="card-header">
              <div class="container">
                <div class="row justify-content-md-center">
                  <h5> Não há vagas abertas no momento. Continue acompanhando o site!</h5>
                </div>
              </div>
            </div>
          </div>
          @endif
          @foreach($vagas as $v)
          <div class=" card" id="idvagas">

            <div class="card-header" id="headingOne">
              <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <h4 class="info-vaga">
                      {{$v->titulo}}
                    </h4>
                  </div>
                  <div class="col-sm">
                    <div class="btn-group btn-group-sm flex-wrap" data-toggle="buttons">
                      <button class="btn btn-info">
                        <a href="#vaga{{$v->idvaga}}" style="color:white;" data-toggle="collapse"
                          data-target="#vaga{{$v->idvaga}}" aria-expanded="false" aria-controls="vaga{{$v->idvaga}}">
                          <b>Mais Informações</b>
                          <span class="fa fa-eye" style="padding-left: 10px;"></span>
                        </a>
                      </button>
                      <button class="btn btn-info">
                        <a name="" href="/vaga/{{$v->idvaga}}" id="" style="color:white;">
                          <b>Candidate-se</b>
                          <span class="fa fa-check" style="padding-left: 10px;"></span>
                        </a>
                      </button>
                      <button class="btn btn-info" id="idcompartilhar">
                        <b>Compartilhe</b>
                        <span class="fas fa-share-alt" style=" padding-left: 10px;"></span>
                      </button>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm">
                    <div class="pull-left">
                      <div class="meta-tag">
                        <i class="fa fa-map-marker-alt" style="padding-right: 10px;"
                          aria-hidden="true"></i>{{$v->local}}
                      </div>
                    </div>
                  </div>
                  <div class="col-sm"> </div>
                </div>
              </div>
            </div>
            <div id="vaga{{$v->idvaga}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm">
                    <ul></ul>
                    <ul style="list-style-type: none; margin-right: auto;">
                      @if($v->pcd == 1)
                      <li>&nbsp;&nbsp;&nbsp;
                        DESTINADA A PESSOAS COM DEFICIÊNCIA
                      </li>
                      <hr>
                      @endif
                      <li><strong> DATA DE PUBLICAÇÃO DA VAGA:&nbsp;&nbsp;&nbsp;</strong>
                        {{Helper::getData($v->dtinicio)}}
                      </li>
                      <hr>
                      <li><strong> PREVISÃO DE ENCERRAMENTO:&nbsp;&nbsp;&nbsp;</strong>
                        {{Helper::getData($v->dtprazo)}}
                      </li>
                      <hr>
                      @if(!is_null($v->quant))
                      <li><strong> QUANTIDADE:&nbsp;&nbsp;&nbsp;</strong>
                        {{$v->quant}}
                      </li>
                      @endif
                      <hr>
                      <li style="padding: 15px;"><strong> DESCRIÇÃO:&nbsp;&nbsp;&nbsp;</strong>
                        {!!$v->descricao!!}
                      </li>
                      <hr>
                      <li style="padding: 15px;"><strong> REQUISITOS:&nbsp;&nbsp;&nbsp;</strong>
                        {!!$v->requisitos!!}
                      </li>
                      <hr>
                      <li><strong> TIPO DE VAGA:&nbsp;&nbsp;&nbsp;</strong>
                        @if($v->tpvaga == 1)
                        Efetiva
                        @elseif($v->tpvaga == 2)
                        Temporária
                        @else
                        Estágio
                        @endif
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- Conteudo --parte central //-->
  <!-- Site footer -->
  <footer class="site-footer mt-5" style="background-color: #CDD7BC;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>Institucional:</h6>
          <p class="text-justify">
            <li>
              <a href="https://bioextratus.com.br/historia/">Historia</a>
            </li>
            <li>
              <a href="https://bioextratus.com.br/tecnologia-e-controle-de-qualidade/">Tecnologia e Controle de
                Qualidade</a>
            </li>
            <li>
              <a href="https://bioextratus.com.br/onde-comprar-bio-extratus/">Onde Comprar</a>
            </li>
            <li>
              <a href="https://bioextratus.com.br/">Visite nosso site</a>
            </li>
          </p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Politicas Sociais</h6>
          <ul class="footer-links">
            <li><a href="https://bioextratus.com.br/responsabilidade-ambiental/">Responsabilidade Ambiental</a></li>
            <li><a href="https://bioextratus.com.br/responsabilidade-social/">Responsabilidade Social</a></li>
            <li><a href="http://fundacaobioextratus.org.br/">Fundação Bioextratus</a></li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Fale Conosco</h6>
          <ul class="footer-links">
            <li>
              <P> +55 (31) 3855-3002</P>
            </li>
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
            <a href="https://bioextratus.com.br">Site Oficial</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="https://www.facebook.com/bioextratus/">
                <img class="redesimg" src="img/ImagemFacebook.jpg"></a></li>
            <li><a class="twitter"
                href="https://www.linkedin.com/in/bio-extratus-cosmetic-natural-ltda-918900159/">{{--<i class="fa fa-linkedin"></i> --}}
                <img class="redesimg" src="img/ImagemLinkedIn.jpg"></a></li>
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