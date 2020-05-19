
@extends('auth.footernavbartemplate')
<link rel="stylesheet" href="/css/principal.css">
<link rel="stylesheet" href="/css/LoginCSS.css">
<link rel="stylesheet" href="/css/redes.css">




  {{-- <div class="container"> --}}
   @section('footerconteudo')

          <div class="card-header"  id="HeaderID">
        <img src="/img/ImagemUsuario.png" alt="" width="40" height="40" style="justify-content: center" id ="ImagemUsuario"><h3 class="font-italic"style="font-size: 15px;">Meu Login</h3>
         </div>

          <div class="card-body" id ="cardlogin">
        <form method="POST" action="{{ route('login') }}" id ="formulariologin">
          @csrf

          <div class="input-group mb-3">
            <label for="email"></label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
               
              <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2"><span class="fas fa-envelope-square" id="TamEnvelope"></span></span>
                    </div>

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
         

          <div class="input-group mb-3">
            <label for="password"></label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"placeholder="Senha">
               

              <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2"><span class="fas fa-key" id="TamChave"></span></span>
                    </div>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

          <div class="form-group" style="  text-align: center;">
           
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                  {{ __('Manter me conectado') }}
                </label>
              </div>
            </div>
          

          <div class="form-group" style="  text-align: center;">
         

              <button type="submit" class="btn btn-primary" id="botaoesqueceu">
                {{ __('Entrar') }} <span class="fas fa-user-check" id ="usercheck"></span>
              </button>

              @if (Route::has('password.request'))

            </div>


              <div class="form-group" style="  text-align: center;">
              <a class="btn btn-link" href="{{ route('password.request') }}" id="botaoesqueceu">
                {{ __('Esqueceu sua senha') }}
                <span class="fas fa-question" id="question"></span>
              </a>
               </div>
              @endif
           
           

         
        </form>
          </div>
  


  
 @endsection
  
  



 
 




        
