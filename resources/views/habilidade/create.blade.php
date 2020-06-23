@extends('adminlte::page')

@section('content')


<div class="container">



  <div class="row">

    <div class="col-xs-1 col-md-1">


    </div>

    <div class="col-xs-10 col-md-10">

      <div id="accordion" style="margin-top: 40px;">
        <div class="card-border-light">
          <div class="card-header" id="headingOne" style="background-color: aliceblue;">
            <div class="container">
              <div class="row">
                <div class="col-xs-5 col-md-5">
                  <h2 class="mb-0" style="color:dodgerblue;">
                    Habilidades
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-graduate fa-stack-1x fa-inverse"></i>
                    </span>

                  </h2>

                </div>


                <div class="col-xs-4 col-md-4" style="margin-left: auto; text-align: end;">
                  <div class="btn-group " role="group" aria-label="">
                    {{-- <button class=" btn btn-link">
											<a href="/curriculo/editar/{{Auth::user()->id}}" >Editar</a>
                    <span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

                    </button> --}}

                    <button class=" btn btn-secondary" type="button" style="margin-top: 10px;">
                      <a href="/experiencias" style="color: white;">Voltar<span class="fas fa-undo"
                          style="padding-left: 15px;"></span></a>
                    </button>
                  </div>
                </div>
              </div>
            </div>


          </div>


          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body" style="box-sizing: border-box;">

              <ul style="list-style-type: none;">


                <form action="/habilidade" method="POST">
                  @csrf

                  <div class="form-group">
                    <li><strong> CATEGORIA:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select" id="tipo" name="tipo_idtipo">
                        <option value="" selected>Selecione</option>
                        @foreach(Helper::getTiposHab() as $tp)
                        <option value="{{$tp->idtipo}}">{{$tp->nome}}</option>
                        @endforeach
                      </select>
                    </li>
                  </div>


                  {{-- complemento  definicao pendente --}}
                  <div class="form-group">
                    <li><strong>DESCRIÇÃO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" name="nome"
                        placeholder="Ex.: Inglês">
                      @if($errors->has('nome'))
                      <div class="invalid-feedback">
                        {{$errors->first('nome')}}
                      </div>
                      @endif
                    </li>
                  </div>




                  <div class="form-group" id="idnivel">
                    <li><strong> NIVEL:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select" id="nivel" name="nivel">
                        <option value="" selected>Selecionar</option>
                        <option value="1">Básico</option>
                        <option value="2">Intermediário</option>
                        <option value="3">Avançado</option>
                      </select>
                    </li>
                  </div>

                  <br>
                  <div class="form-group" style="text-align: end;">
                    <button type="submit" class="btn btn-primary" id="botaosalvarend">Salvar<span class="fas fa-save"
                        style="padding-left: 15px;"></button>
                    <button class=" btn btn-danger" style="color:red;" type="cancel">
                      <a href="cancel" style="color: white;">Cancelar<span class="fas fa-window-close"
                          style="padding-left: 15px;"></span></a>
                    </button>
                  </div>
                </form>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="col-xs1 col-md-1"></div>

  </div>
</div>
{{-- <script type="text/javascript" src="{{asset('js/app.js')}}"></script> --}}


@endsection





{{-- 
<div class="card border">
  <div class="card-body">
    <h5>Cadastrar habilidades e ferramentas</h5>

    <form action="/habilidade" method="POST">
      @csrf
      <div class="form-group">
        <label for="tipo">Categoria *</label>
        <select class="custom-select" id="tipo" name="tipo_idtipo">
          <option value="" selected>Selecione</option>
          @foreach(Helper::getTiposHab() as $tp)
          <option value="{{$tp->idtipo}}">{{$tp->nome}}</option>
@endforeach
</select>
</div>
<div class="form-group">
  <label for="nome">Descrição *</label>
  <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" name="nome"
    placeholder="Ex.: Inglês">
  @if($errors->has('nome'))
  <div class="invalid-feedback">
    {{$errors->first('nome')}}
  </div>
  @endif
</div>
<div class="form-group">
  <label for="nivel">NÍVEL *</label>
  <select class="custom-select" id="nivel" name="nivel">
    <option value="" selected>Selecionar</option>
    <option value="1">Básico</option>
    <option value="2">Intermediário</option>
    <option value="3">Avançado</option>
  </select>
</div>

<br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
</form>
</div>
</div>
@endsection --}}