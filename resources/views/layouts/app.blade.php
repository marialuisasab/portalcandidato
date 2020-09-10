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
  <script src="/vendor/jquery/jquery.min.js">
  </script>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="vendor/fontawesome-free/css/all.css">
  <link rel="stylesheet" href="/vendor/bootstrap-4.0.0/css/bootstrap.min.css">

  {{-- link do pooper --}}
  <link rel="stylesheet" href="vendor/popper/umd/popper.min.js">

  <link href="css/homeadmin.css" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="css/principal.css">
  <link rel="stylesheet" href="css/redes.css">
</head>

<body class="idBODY">
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class=" border-right" id="sidebar-wrapper" style="background-color: #CDD7BC;">
      <div class="sidebar-heading" style="color: red; background-color:  white;">
        <p id="admin"> Usuario Administrador</p>
      </div>
      <div class="list-group list-group-flush">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
          style="list-style-type: none">
          <li class="nav-header">Gerenciar Perfil:</li>
          <li class="nav-item ">
            <a href="#" class="nav-link list-group-item-action">
              <p><i class="fas fa-edit">Editar Perfil</i></p>
            </a>
          </li>
          <li class="nav-header">Gerenciar Vagas:</li>
          <li class="nav-item ">
            <a href="#" class="nav-link list-group-item-action ">
              <p><i class=" fas fa-bullhorn"> Anunciar vaga</i>
              </p>
            </a>
          </li>
          <li class="nav-header">Gerenciar Curriculos:</li>
          <li class="nav-item ">
            <a href="#" class="nav-link list-group-item-action">
              <p><i class="fas fa-search">Buscar Curriculos</i></p>
            </a>
          </li>
        </ul>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-white" id="navbarLogin">
        <button class="fas fa-bars" type="button" id="menu-toggle" style="background-color: "></button>
        <!-- <a class="navbar-brand" href="{{ url('/') }}">
        <img src="img/ImagemBioextratus.png" width="160" height="50" alt="">
      </a> -->
        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
        </button> --}}

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- lado esquerdo navbar botão menu -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              @if(Auth::user()->foto != null)
              <img src="{{'/fotos/'.Auth::user()->foto}}" alt="{{Auth::user()->name}}"
                style="max-width: 50px; text-align: center; border-radius: 50%; margin-right:10px;">
              @else
              <img class="profile-user-img img-responsive img-circle" src="/img/imagemtie.png" alt="Usuário sem foto"
                style="max-width: 50px; text-align: center; border-radius: 50%; margin-right: 10px; margin-top: 10px">
              @endif
            </li>
            <li class="nav-item dropdown user-menu">
              <div class="btn-group" role="group" aria-label="Exemplo básico">
                <a href="{{route('home')}}" class="sino mr-5 mt-3">
                  <span class="fas fa-home" title="Início"></span>
                </a>
                <a href="#" class="mr-5 mt-3">
                  <span class="fas fa-question-circle" style="margin-left: -10px;" id="idajuda"
                    title="Precisa de ajuda?"></span>
                </a>
              </div>
            </li>
            <!-- Authentication Links -->
            @guest
            {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li> --}}
            <ul>
            </ul>
            @if (Route::has('register'))
            <ul class="ml-4">

              <a class="btn btn-primary mt-2" href="{{ route('register') }}">
                <span class="fas fa-user-plus px-2">
                </span></a>
            </ul>

            <ul style="margin-left: auto;">
              <div class="btn-group ml-4 mt--5" role="group" aria-label="Button group with nested dropdown"
                style="width: -40px;">
                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="img/ImagemBrasil.png" width="40" height="30" class="d-inline-block align-top" alt="">
                  </button>
                </div>
              </div>
            </ul>


            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

      @yield('content')


    </div>
    <!-- /#page-content-wrapper -->
    <!-- Menu Toggle Script -->

  </div>
  <!-- /#wrapper -->


  <footer class="main-footer" style="background-color:  #CDD7BC;">
    <div class=" container">
      <div class="row">
        <div class="col-xs-4 col-md-4"></div>
        <div class="col-sm-4 col-md-4">
          <h6 id="idlogininform">Para mais informações:</h6>
        </div>
        <div class="col-sm-4 col-md-4"></div>
      </div>
      <div class="row" style="margin-top: 10px; ">
        <div class="col-sm-2 col-md-2"></div>
        <div class="col-xs-4 col-md-4">
          <ul class="footer-links">
            <li>
              <p class="fas fa-map-marked-alt"> Rodovia Km1, MG-123 - Zona Rural</p>
            </li>
            <li>
              <p class="fas fa-phone"> (031) 3855-3000</p>
            </li>
            <!--<li>
              <p class="fas fa-envelope"> rh@bioextratus.com.br </p>
            </li>-->
          </ul>
        </div>
        <div class="col-xs-4 col-md-4">
          <ul class="footer-links">
            <li>
              <p class="fas fa-road"> Alvinópolis - MG, CEP: 35950-000</p>
            </li>
            <li>
              <p class="fas fa-registered"> CNPJ: 02.176.615/0001-07</p>
            </li>
          </ul>
        </div>
        <div class="col-xs-2 col-md-2 "></div>
      </div>
    </div>
    <hr>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2020 Todos os direitos são reservados à Bio Extratus
            Cosmetics Natural
            <a href="https://bioextratus.com.br/">Site Oficial</a>.
          </p>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="https://www.facebook.com/bioextratus/">
                <img class="redesimg" src="/img/ImagemFacebook.jpg"></a></li>
            <li><a class="twitter"
                href="https://www.linkedin.com/in/bio-extratus-cosmetic-natural-ltda-918900159/">{{--<i class="fa fa-linkedin"></i> --}}
                <img class="redesimg" src="/img/ImagemLinkedIn.jpg"></a></li>
            <li><a class="dribbble" href="https://www.instagram.com/bioextratus/?hl=pt-br">
                <img class="redesimg" src="/img/ImagemInstagram.jpg"></a></li>
            <li><a class="youtube" href="https://www.youtube.com/bioextratusoficial">
                <img class="redesimg" src="/img/ImagemYoutube.png"></a></li>
            <li><a class="flickr" href="https://www.flickr.com/photos/bioextratus/">
                <img class="redesimg" src="/img/ImagemFlicker.png"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script>
    $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
              });
  </script>
</body>

</html>