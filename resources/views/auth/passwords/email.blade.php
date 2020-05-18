@extends('auth.footernavbartemplate')
<link rel="stylesheet" href="/css/principal.css">
<link rel="stylesheet" href="/css/LoginCSS.css">
<link rel="stylesheet" href="/css/redes.css">

@section('footerconteudo')

    

                    <form method="POST" action="{{ route('password.email') }}" id ="formulariologin">
                        @csrf

                        <div class="form-group row" id ="emaillogin" >
                            <label for="email" class="col-md-2 col-form-label text-md-right"><span class="fas fa-envelope-square" id="TamEnvelope"></span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Informe seu email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0" id="submitesquece">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary" id="resetsenha">
                                 {{__('Enviar')}} <span class="fas fa-check" id="idchecknovasenha"> </span>  
                                </button>
                            </div>
                        </div>
                    </form>
               

@endsection
