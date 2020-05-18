
@extends('auth.footernavbartemplate')
<link rel="stylesheet" href="/css/principal.css">
<link rel="stylesheet" href="/css/LoginCSS.css">
<link rel="stylesheet" href="/css/redes.css">




  {{-- <div class="container"> --}}
   @section('footerconteudo')

          <div class="card-header"  id="HeaderID">
        <span class="fas fa-user-tie" style="font-size: 30px; width: 50px; height: 40px;"></span><h3 class="font-italic"style="font-size: 25px; color:red;"><strong>Login do administrador</strong> </h3>
         </div>

          <div class="card-body" id ="cardlogin">
        <form method="POST" action="{{ route('login') }}" id ="formulariologin">
          @csrf

          <div class="form-group row"id ="emaillogin" >
            <label for="email" class="col-md-2 col-form-label text-md-right" id="labelemail"><span class="fas fa-envelope-square" id="TamEnvelope"></span></label>

            <div class="col-md-6" >
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row" id="senhalogin" >
            <label for="password" class="col-md-2 col-form-label d-flex text-md-right" ><span class="fas fa-key" id="TamChave"></span></label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"placeholder="Senha">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row" style="margin-left: 3px;"">
            <div class="col-md-6 offset-md-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                  {{ __('Manter me conectado') }}
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row mb-0" id="submitilogin">
            <div class="col-md-8 offset-md-2">

              <button type="submit" class="btn btn-primary" id="submitid">
                {{ __('Entrar') }} <span class="fas fa-user-check" id ="usercheck"></span>
              </button>

              @if (Route::has('password.request'))


              <a class="btn btn-primary" href="{{ route('password.request') }}" id="botaoesqueceu">
                {{ __('Esqueceu sua senha') }}
                <span class="fas fa-question" id="question"></span>
              </a>
              @endif
            </div>
          </div>
        </form>
          </div>
  

                      <div class="container" id="containerRecuSenha">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-md-12" style="margin-top: 30px;  margin-right: 240px; text-content:center;">
             
            <h5 class="text-center" style="color: red"><em> Esta pagina é especificamente voltada para o login do usuário administrador.</em></h5>
          
        </div>
        
        </div>

       </div>


  
 @endsection
  
  



 
 




        
