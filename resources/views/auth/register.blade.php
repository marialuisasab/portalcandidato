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

              <div class="input-group mb-3">
                <label for="name">
                </label>

                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome">
                  
                  
                  <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2"><span class="fas fa-address-card" id="NomeID"></span></span>
                    </div>


                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
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



                  
              <div class="input-group mb-3" id ="emaillogin">
                <label for="email"></label>

                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                  
                  <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2"><span class="fas fa-envelope-square" id="TamEnvelopeReg"></span></span>
                    </div>

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              
              <div class="input-group mb-3" id="senhalogin">
                <label for="password"></label>

                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha">
                    <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2"> <span class="fas fa-key" id="TamChave"></span></span>
                    </div>
                    
                    
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                

              <div class="input-group mb-3">
                <label for="password-confirm"></label>

               
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"placeholder="Confirmar Senha">
              <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2"><span class="fas fa-check-double" id="checksenha"></span> </span>
                    </div>
              </div>

              <div class="form-group" style="text-align: center;">
                
                  <button type="submit" class="btn btn-primary" id="registrarbotao">
                    {{ __('Registrar') }}<span class="fas fa-user-check" id="userregistro"></span>
                  </button>
                </div>
              </div>
            </form>
            </div>
          



    
              @endsection
