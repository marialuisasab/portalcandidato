@extends('auth.footernavbartemplate')
<link rel="stylesheet" href="/css/principal.css">
<link rel="stylesheet" href="/css/LoginCSS.css">
<link rel="stylesheet" href="/css/redes.css">

@section('footerconteudo')

                <div class="card-header" id="HeaderID"><span class="fas fa-users-cog" style="font-size: 30px; width: 40px; height: 40px;"></span><h3 class="font-italic"style="font-size: 15px;">Troca de senha:</h3>
                </div>

                <div class="card-body" id="cardlogin">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        
                        <input type="hidden" class="form-control" name="user_type" value="{{$user_type}}" required>

                        <div class="input-group mb-3">
                            <label for="email"></label>

                                
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">

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

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2"><span class="fas fa-key" id="TamChave"></span></span>
                    </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                        </div>

                        <div class="input-group mb-3">
                            <label for="password-confirm"></label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2"><span class="fas fa-check-double" id="checksenha"></span> </span>
                    </div>
                        </div>

                        <div class="form-group" style="text-align: center;">
                            
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirmar alteração') }}
                               
                            </div>
                        </div>
                    </form>
                </div>
     
@endsection
