@extends('auth.footernavbartemplate')
<link rel="stylesheet" href="/css/principal.css">
<link rel="stylesheet" href="/css/LoginCSS.css">
<link rel="stylesheet" href="/css/redes.css">




 
@section('footerconteudo')


       


                  <div class="card-header"  id="HeaderID">
       <span class="fas fa-file-medical"style="font-size: 25px; width: 40px; height: 40px;"></span><h3 class="font-italic"style="font-size: 15px;">Recuperação de senha</h3>
      </div>
                     <div class="card-body" id ="cardlogin">
                           @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" id ="formulariologin">
                        @csrf

                        <div class="input-group mb-3" id ="emaillogin" >
                            <label for="email"></label>

                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Informe seu email">

                                <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2"><span class="fas fa-envelope-square" id="TamEnvelope"></span></span>
                    </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group " id="submitesquece" style="text-align: center;">
                      
                                <button type="submit" class="btn btn-primary" id="resetsenha">
                                 {{__('Enviar')}} <span class="fas fa-check" id="idchecknovasenha"> </span>  
                                </button>
                            
                        </div>
                    </form>
                     </div>

                    
                     <div class="container" id="containerRecuSenha">
        <div class="row" style="margin-top: 100px;">
             <h5 class="text-center"><em> Insira seu email cadastrado no sistema! Neste email, você receberá um link para gerar uma nova senha.</em></h5>
          

        
        </div>

       </div>

         
             
         
                   
@endsection


