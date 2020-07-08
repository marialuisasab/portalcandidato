@extends('auth.footernavbartemplate')
<link rel="stylesheet" href="css/principal.css">
<link rel="stylesheet" href="css/LoginCSS.css">
<link rel="stylesheet" href="css/redes.css">

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@section('footerconteudo')
<div class="card-header" id="HeaderID">
  <span class="fas fa-user-plus" style="font-size: 30px; width: 40px; height: 40px;"></span>
  <h3 class="font-italic" style="font-size: 15px;">Novo usuário</h3>
</div>
<div class="card-body" id="cardlogin">
  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <div class="input-group mb-3">
      <label for="name"></label>
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome" title="Insira seu nome">
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">
          <span class="fas fa-address-card" id="NomeID"></span></span>
      </div>
      @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="input-group mb-3" id="emaillogin">
      <label for="email"></label>
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }}" required autocomplete="email" placeholder="Email" title="Insira seu email">
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">
          <span class="fas fa-envelope-square" id="TamEnvelopeReg"></span>
        </span>
      </div>
      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>

    <div class="input-group mb-3" id="senhalogin">
      <label for="password"></label>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
        required autocomplete="new-password" placeholder="Senha" title="Insira sua senha">
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">
          <span class="fas fa-key" id="TamChave"></span>
        </span>
      </div>
      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>


    <div class="input-group mb-3">
      <label for="password-confirm"></label>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
        autocomplete="new-password" placeholder="Confirmar Senha" title="Insira novamente sua senha">
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">
          <span class="fas fa-check-double" id="checksenha"></span>
        </span>
      </div>
    </div>


    @if(env('CAPTCHA_SITE_KEY'))
    <div class="input-group mb-3" style="justify-content: center;">
      <div class="form-group" style="text-align: center">
        <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}">
        </div>
        @if ($errors->has('g-recaptcha-response'))
        <span class="invalid-feedback" style="display: block">
          <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
        </span>
        @endif
      </div>
    </div>
    @endif


    <div class="form-group" style="text-align: center;">
      <button type="submit" class="btn btn-primary" id="registrarbotao">
        {{ __('Registrar') }}<span class="fas fa-user-check" id="userregistro"></span>
      </button>
    </div>

  </form>
</div>

@endsection