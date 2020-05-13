@extends('layouts.app')
<link rel="stylesheet" href="css/principal.css">
<link rel="stylesheet" href="css/LoginCSS.css">
<link rel="stylesheet" href="css/redes.css">
@section('content')
<div class="container" id ="idcontainer">
  <div class="row justify-content-md-center">
    {{-- <div class="col-md-8"> --}}
      <div class="card" id="CabecalhoBody">
        
        <div class="container">
          <div class ="row" id ="rowportal">
            <p class="portallogin">Portal do candidato</p>

          </div>
          <div class="row" id ="rowbioextratus">
            <a class ="ExtratusLogin"href="/"><b class="BioLogin">BIO</b>Extratus</a>

          </div>


        </div>  <p></p>
        <div class="card-header"  id="HeaderID">
          <img src="img/ImagemUsuario.png" alt="" width="40" height="40" style="justify-content: center" id ="ImagemUsuario"><h3 class="font-italic"style="font-size: 15px;">Meu Registro</h3></div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">
                  <span class="fas fa-address-card" id="NomeID"></span>
                </label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome">

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              {{-- <div class="form-group row">
                <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de usuario') }}</label>

                <div class="col-md-6">
                  <input id="tipo" type="integer" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="{{ old('tipo') }}" required autocomplete="tipo" autofocus>

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div> --}}




              <div class="form-group row" id ="emaillogin">
                <label for="email" class="col-md-4 col-form-label text-md-right"><span class="fas fa-envelope-square" id="TamEnvelopeReg"></span></label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row" id="senhalogin">
                <label for="password" class="col-md-4 col-form-label text-md-right"><span class="fas fa-key" id="TamChave"></span></label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><span class="fas fa-check-double" id="checksenha"></span></label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"placeholder="Confirmar Senha">
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary" id="registrarbotao">
                    {{ __('Registrar') }}<span class="fas fa-user-check" id="userregistro"></span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



    <footer class="site-footer mt-5" id="idfooter">


      <div class="container">

        <div class="row" >
          <div class="col-sm"></div>
          <div class ="col-sm">
            <h5 id="idlogininform">Em caso de duvidas:</h5>
          </div>
          <div class="col-sm"></div>
        </div>
        <div class="row">
          <div class="col-sm-3 col-md-3">

          </div>

          <div class="col-xs-3 col-md-3">

            <ul class="footer-links">
              <li ><p class="fas fa-map-marked-alt">  Rodovia Km1, MG-123 - Zona Rural</p></li>
              <li><p class="fas fa-phone"> (031) 3855-3000</p></li>
              <li><p class="fas fa-envelope"> rh@bioextratus.com.br </p></li>
            </ul>
          </div>

          <div class="col-xs-3 col-md-3">

            <ul class="footer-links">
              <li><p class="fas fa-road"> Alvinópolis - MG, CEP: 35950-000</p></li>
              <li><p class="fas fa-registered"> CNPJ: 02.176.615/0001-07</p></li>
            </div>
            <div class="col-xs-3 col-md-3 ">


            </ul>
          </div>
        </div>

      </div><hr>

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
                <img  class ="redesimg" src="img/ImagemFacebook.jpg"></a></li>
                <li><a class="twitter" href="https://www.linkedin.com/in/bio-extratus-cosmetic-natural-ltda-918900159/">{{--<i class="fa fa-linkedin"></i> --}}
                  <img class="redesimg" src="img/ImagemLinkedin.jpg"></a></li>
                  <li><a class="dribbble" href="https://www.instagram.com/bioextratus/?hl=pt-br">
                    <img class ="redesimg"src="img/ImagemInstagram.jpg" ></a></li>
                    <li><a class="youtube" href="https://www.youtube.com/bioextratusoficial">
                      <img class="redesimg"src="img/ImagemYoutube.png"></a></li>
                      <li><a class="flickr" href="https://www.flickr.com/photos/bioextratus/">
                        <img class="redesimg"src="img/ImagemFlicker.png"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </footer>
              @endsection
