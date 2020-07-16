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
        
    body, html {
      height: 100%;
      margin: 0;
    }

    .bio-image {
      background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url("img/panoramica1920x670.png");
      height: 80%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }

    .bio-text {
      text-align: center;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
    }

  </style>
  <script>   
    function setClipboard(value) {
      var success = true;
      var tempInput = document.createElement("input");
      tempInput.style = "position: absolute; left: -1000px; top: -1000px";
      tempInput.value = value;
      document.body.appendChild(tempInput);
      tempInput.select();
      success = document.execCommand("copy");
      if(success){
        alert('Link de compartilhamento copiado!');
        document.body.removeChild(tempInput);
      }else {
        alert('Falha ao copiar o link de compartilhamento!');
      }
      
  }
  </script>

</head>

<body class="idBodyPrincipal">

  <div class="pos-f-t">
    <ul class="navbar-nav mr-auto">
    </ul>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="img/logo400_96.png" width="133" height="32" class="d-inline-block align-top" alt="">
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

    
  <div class="bio-image">
    <div class="bio-text">
      <h1><i>Portal do Candidato <b>Bio Extratus</b></i></h1>
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
          <strong style="margin: 0px; font-family: open_sansregular, sans-serif; font-weight: 700; text-decoration: none;">
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
            <strong style="margin: 0px; font-family: open_sansregular, sans-serif; font-weight: 700; text-decoration: none;">
              NOSSO MUITO OBRIGADO
            </strong>
            </span>
            <br style="margin: 0px; font-family: open_sansregular, sans-serif; text-decoration:none;">
            Pelo companheirismo, dedicação e vontade de vencer a cada dia, gostaríamos de agradecer a todos que nos cercam. Sem vocês, o sonho não se tornaria realidade.
          </p>
      </div>
    </div>

  </div>

  <div class="container">
    <div class="row justify-content-md-center" style="margin-top: 40px;">
      <div class="col">
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
        
        <div id="accordion">
        @foreach($vagas as $v)
          <div class="card">

            <div class="card-header" id="headingOne">
              <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <h4>                      
                        {{$v->titulo}}                 
                    </h4>
                  </div>
                  <div class="col-sm">
                    <div class="btn-group btn-group-sm flex-wrap" data-toggle="buttons"> 
                    <button class="btn btn-info">
                        <a href="#vaga{{$v->idvaga}}" style="color:white;" data-toggle="collapse" data-target="#vaga{{$v->idvaga}}" aria-expanded="false" aria-controls="vaga{{$v->idvaga}}">
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
                      <button class="btn btn-info" onClick="setClipboard('Veja as vagas de trabalho disponíveis no site da Bio Extratus: www.trabalheconosco.bioextratus.com.br')">
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
                        <i class="fa fa-map-marker-alt" style="padding-right: 10px;" aria-hidden="true"></i>{{$v->local}} 
                      </div>
                    </div>
                  </div>
                  <div class="col-sm"> </div>               
                </div>
              </div>
            </div>
            <div id="vaga{{$v->idvaga}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <div class="row" >
                  <div class="col-sm">
                    <ul></ul>
                    <ul style="list-style-type: none; margin-right: auto;">                     
                      @if($v->pcd == 1)                               
                        <li>&nbsp;&nbsp;&nbsp;
                          DESTINADA A PESSOAS COM DEFICIÊNCIA
                        </li>
                        <hr>
                      @endif                       
                      <li><strong> DATA DE PUBLICAÇÃO DA VAGA:&nbsp;&nbsp;&nbsp;</strong>           {{Helper::getData($v->dtinicio)}}
                      </li>
                      <hr>
                      <li><strong> PREVISÃO DE ENCERRAMENTO:&nbsp;&nbsp;&nbsp;</strong> 
                        {{Helper::getData($v->dtprazo)}}
                      </li>
                      <hr>
                      <li><strong> QUANTIDADE:&nbsp;&nbsp;&nbsp;</strong>  
                        {{$v->quant}}
                      </li>
                      <hr>
                      <li><strong> DESCRIÇÃO:&nbsp;&nbsp;&nbsp;</strong>  
                        {{$v->descricao}}
                      </li>
                      <hr>
                      <li><strong> REQUISITOS:&nbsp;&nbsp;&nbsp;</strong>  
                        {{$v->requisitos}}
                      </li>
                      <hr> 
                      <li><strong> TIPO DE VAGA:&nbsp;&nbsp;&nbsp;</strong>
                        @if($v->tpvaga == 1)   
                          Fixa
                        @else
                          Temporária
                        @endif            
                      </li>                                                        
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        <div class="card" style="text-align: center;">
          <div class="card-header" id="headingOne">
            <div class="container">
              <div class="row">                  <h5>                      
                    Caso não tenha encontrado uma vaga que lhe interesse no momento, não se preocupe, deixe seus dados cadastrados em nosso <u>Banco de Talentos</u>. <br>Continue acompanhando esta página, pois serão publicadas novas vagas.                                         
                </h5>         
              </div>
              <hr>
              <div class="row">
                <div class="col">                                              
                  <h4>
                    Clique aqui para acessar a plataforma e realizar o cadastro!
                  </h4> 
                  <button class="btn btn-info ">
                    <a name="cadastrar" href="{{route('home')}}" style="color:white;">
                      <b>Cadastre-se</b>                      
                    </a> 
                  </button> 
                </div>
              </div>                
            </div>
          </div>            
        </div>
      </div>
    </div>
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