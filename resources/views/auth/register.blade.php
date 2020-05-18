@extends('auth.footernavbartemplate')
<link rel="stylesheet" href="css/principal.css">
<link rel="stylesheet" href="css/LoginCSS.css">
<link rel="stylesheet" href="css/redes.css">
@section('footerconteudo')
{{-- <div class="container" id ="idcontainer">
  <div class="row justify-content-md-center" id="FormLogin">
    <div class="col-md-8">
      <div class="card" id="CabecalhoBody">

        <div class="container" id= "containerPortalBio">
          <div class ="row" id ="rowportal">
             <div class="col">
            <p class="portallogin">Portal do Candidato</p>
          </div>
            
          </div>
          <div class="row" id ="rowbioextratus">
             <div class="col">
            <a class ="ExtratusLogin"href="/"><b class="BioLogin">BIO</b>EXTRATUS</a>
             </div>
          </div>


        </div>  <p></p>
        <div class="card-header"  id="HeaderID">
          <img src="img/ImagemUsuario.png" alt="" width="40" height="40" style="justify-content: center" id ="ImagemUsuario"><h3 class="font-italic"style="font-size: 15px;">Meu Registro</h3></div>

          <div class="card-body" id ="cardlogin"> --}}
            
            <div class="card-header"  id="HeaderID">
        <span class="fas fa-user-plus" style="font-size: 30px; width: 40px; height: 40px;"></span><h3 class="font-italic"style="font-size: 15px;">Novo usuário</h3>
      </div>
            <div class="card-body" id ="cardlogin">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">
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
                <label for="email" class="col-md-2 col-form-label text-md-right"><span class="fas fa-envelope-square" id="TamEnvelopeReg"></span></label>

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
                <label for="password" class="col-md-2 col-form-label text-md-right"><span class="fas fa-key" id="TamChaveREG"></span></label>

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
                <label for="password-confirm" class="col-md-2 col-form-label text-md-right"><span class="fas fa-check-double" id="checksenha"></span></label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"placeholder="Confirmar Senha">
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-3">
                  <button type="submit" class="btn btn-primary" id="registrarbotao">
                    {{ __('Registrar') }}<span class="fas fa-user-check" id="userregistro"></span>
                  </button>
                </div>
              </div>
            </form>
            </div>
          



    
              @endsection
