
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="idBODY">
  <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-white" id="navbarLogin">
       
        <!-- <a class="navbar-brand" href="{{ url('/') }}">
          <img src="img/ImagemBioextratus.png" width="160" height="50" alt="">
        </a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li> --}}

            <ul>

              <a class="btn btn-primary mt-2" href="/">
                <span class="fas fa-home"></span></a>

              </ul>
              @if (Route::has('register'))
              <ul class ="ml-4">

                <a class="btn btn-primary mt-2" href="{{ route('register') }}">
                  <span class="fas fa-user-plus px-2">
                  </span></a>
                </ul>

                <ul style="margin-left: auto;">
                  <div class="btn-group ml-4 mt--5" role="group" aria-label="Button group with nested dropdown" style ="width: -40px;">
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/img/ImagemBrasil.png" width="40" height="30" class="d-inline-block align-top" alt="">
                      </button>

                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">


                        <a class="dropdown-item" href="">
                          <img src="/img/ImagemBrasil.png" role ="button" width="40" height="30" class="d-inline-block align-top" alt=""></a>

                          <a class="dropdown-item" href="">
                            <img src="/img/ImagemEspanha.jpg" role ="button" width="40" height="30" class="d-inline-block align-top" alt=""></a>

                            <a class="dropdown-item" href="">
                              <img src="/img/ImagemIngles.jpg" role ="button" width="40" height="30" class="d-inline-block align-top" alt=""></a>


                            </div>
                          </div>
                        </div>
                      </ul>


                      @endif
                      @else
                      <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
                      </div>
                    </li>
                    @endguest
                  </ul>
                </div>
             
            </nav>

<div class="container-fluid" id="dadosbiocont" style="text-align: center; margin-right:10px;">
  <div class="row justify-content-md-center" id ="FormLogin">
    <div class="card" id="CabecalhoBody">
      
      <div class="container" id="containerPortalBio">
        <div class ="row" id ="rowportal">
         
      
          
          <a class ="ExtratusLogin"href="/">Portal do Candidato <b class="BioLogin">BIO</b>EXTRATUS</a>
          
        </div>


      </div>  
      

      
              @yield('footerconteudo')
              
       

       </div> 
</div>
</div>

          </div>

















<footer class="site-footer mt-5" id="idfooter">

  <div class="container">

    <div class="row" >
      <div class="col-xs-4 col-md-4"></div>
      <div class ="col-sm-4 col-md-4">
        <h6 id="idlogininform">Para mais informações:</h6>
      </div>
      <div class="col-sm-4 col-md-4"></div>
    </div>
    <div class="row" style="margin-top: 10px; ">
      <div class="col-sm-2 col-md-2">

      </div>

      <div class="col-xs-4 col-md-4">

        <ul class="footer-links">
          <li ><p class="fas fa-map-marked-alt">  Rodovia Km1, MG-123 - Zona Rural</p></li>
          <li><p class="fas fa-phone"> (031) 3855-3000</p></li>
          <li><p class="fas fa-envelope"> rh@bioextratus.com.br </p></li>
        </ul>
      </div>

      <div class="col-xs-4 col-md-4">

        <ul class="footer-links">
          <li><p class="fas fa-road"> Alvinópolis - MG, CEP: 35950-000</p></li>
          <li><p class="fas fa-registered"> CNPJ: 02.176.615/0001-07</p></li>
        </div>
        <div class="col-xs-2 col-md-2 ">


        </ul>
      </div>
    </div>

  </div>
  <hr>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2020 Todos os direitos são reservados à Bioextratus Cosmetics Natural
          <a href="https:https://loja.bioextratus.com.br">Site Oficial</a>.
        </p>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">

        <ul class="social-icons">
          <li><a class="facebook" href="https://www.facebook.com/bioextratus/">
            <img  class ="redesimg" src="/img/ImagemFacebook.jpg"></a></li>
            <li><a class="twitter" href="https://www.linkedin.com/in/bio-extratus-cosmetic-natural-ltda-918900159/">{{--<i class="fa fa-linkedin"></i> --}}
              <img class="redesimg" src="/img/ImagemLinkedin.jpg"></a></li>
              <li><a class="dribbble" href="https://www.instagram.com/bioextratus/?hl=pt-br">
                <img class ="redesimg"src="/img/ImagemInstagram.jpg" ></a></li>
                <li><a class="youtube" href="https://www.youtube.com/bioextratusoficial">
                  <img class="redesimg"src="/img/ImagemYoutube.png"></a></li>
                  <li><a class="flickr" href="https://www.flickr.com/photos/bioextratus/">
                    <img class="redesimg"src="/img/ImagemFlicker.png"></a></li>
                  </ul>
                </div>
              </div>
            </div>
           
          </footer> 

      
</body>
        </html>

          


