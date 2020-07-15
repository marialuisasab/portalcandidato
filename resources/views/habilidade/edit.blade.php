@extends('adminlte::page')

@section('content')



@extends('adminlte::page')

@section('content')


<div class="container">



  <div class="row">

    <div class="col-xs-1 col-md-1">


    </div>

    <div class="col-xs-10 col-md-10">

      <div id="accordion" style="margin-top: 40px;">
        <div class="card-border-light">
          <div class="card-header" id="headingOne" style="background-color: white;">
            <div class="container">
              <div class="row">
                <div class="col-">
                  <h2 class="mb-0" style="color:dodgerblue; text-align: center; font-size: 25px;">
                    Habilidades e Idiomas
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-graduate fa-stack-1x fa-inverse"></i>
                    </span>

                  </h2>

                </div>


                <div class="col-xs-6 col-2" style="margin-left: auto; text-align: end;">
                  <div class="btn-group " role="group" aria-label="">
                    {{-- <button class=" btn btn-link">
											<a href="/curriculo/editar/{{Auth::user()->id}}" >Editar</a>
                    <span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

                    </button> --}}

                    <button class=" btn btn-secondary btn-sm" type="button" title="Voltar"
                      style="height:30px; margin-top: 10px; width:70px;">
                      <a href="/habilidades" style="color: white;">Voltar<span class="fas fa-undo"
                          style="padding-left: 5px; color:white; font-size:9px;"></span></a>
                    </button>
                  </div>
                </div>
              </div>
            </div>


          </div>


          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body" style="box-sizing: border-box;">

              <ul style="list-style-type: none;">


                <form action="/habilidade/{{$hab->idhabilidade}}" method="POST">
                  @csrf

                  <div class="form-group">
                    <li><strong> CATEGORIA:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="form-control {{$errors->has('tipo_idtipo') ? 'is-invalid' : ''}}" id="tipo"
                        name="tipo_idtipo" title="Categoria">
                        <option value="">Selecionar</option>
                        @foreach(Helper::getTiposHab() as $tp)
                        <option value="{{$tp->idtipo}}" {{$hab->tipo_idtipo == $tp->idtipo ? 'selected' : '' }}>
                          {{$tp->nome}}</option>
                        @endforeach
                      </select>
                      @if($errors->has('tipo_idtipo'))
                      <div class="invalid-feedback">
                        {{$errors->first('tipo_idtipo')}}
                      </div>
                      @endif
                    </li>
                  </div>


                  {{-- complemento  definicao pendente --}}
                  <div class="form-group">
                    <li><strong>DESCRIÇÃO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" name="nome"
                        value="{{$hab->nome}}" title="Descrição da Habilidade">
                      @if($errors->has('nome'))
                      <div class="invalid-feedback">
                        {{$errors->first('nome')}}
                      </div>
                      @endif
                    </li>
                  </div>




                  <div class="form-group" id="idnivel">
                    <li><strong> NIVEL:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="form-control {{ $errors->has('nivel') ? 'is-invalid' : ''}}" id="nivel"
                        name="nivel" title="Nível de Aprimoramento">
                        <option value="">Selecionar</option>
                        <option value="1" {{$hab->nivel == 1 ? 'selected' : '' }}>Básico</option>
                        <option value="2" {{$hab->nivel == 2 ? 'selected' : '' }}>Intermediário</option>
                        <option value="3" {{$hab->nivel == 3 ? 'selected' : '' }}>Avançado</option>
                      </select>
                      @if($errors->has('nivel'))
                      <div class="invalid-feedback">
                        {{$errors->first('nivel')}}
                      </div>
                      @endif
                    </li>
                  </div>

                  <br>
                  <div class="form-group" style="text-align: end;">
                    <button type="submit" class="btn btn-primary" title="Confirmar Alterações">Salvar<span
                        class="fas fa-save" style="padding-left: 15px;"></button>
                    <button class=" btn btn-danger" style="color:red;" type="cancel" title="Cancelar Alterações">
                      <a href="/habilidades" style="color: white;">Cancelar<span class="fas fa-window-close"
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



@endsection





{{-- <div class="card border">
    <div class= "card-body">  
      <h5>Cadastrar habilidades e ferramentas</h5>

      <form action="/habilidade/{{$hab->idhabilidade}}" method="POST">
@csrf
<div class="form-group">
  <label for="tipo">Categoria *</label>
  <select class="custom-select" id="tipo" name="tipo_idtipo">
    <option value="">Selecione</option>
    @foreach(Helper::getTiposHab() as $tp)
    <option value="{{$tp->idtipo}}" {{$hab->tipo_idtipo == $tp->idtipo ? 'selected' : '' }}>{{$tp->nome}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="nome">Descrição *</label>
  <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" name="nome"
    value="{{$hab->nome}}">
  @if($errors->has('nome'))
  <div class="invalid-feedback">
    {{$errors->first('nome')}}
  </div>
  @endif
</div>
<div class="form-group">
  <label for="nivel">Nível de Conhecimento *</label>
  <select class="custom-select" id="nivel" name="nivel">
    <option value="">Selecionar</option>
    <option value="1" {{$hab->nivel == 1 ? 'selected' : '' }}>Básico</option>
    <option value="2" {{$hab->nivel == 2 ? 'selected' : '' }}>Intermediário</option>
    <option value="3" {{$hab->nivel == 3 ? 'selected' : '' }}>Avançado</option>
  </select>
</div>

<br>
<button type="submit" class="btn btn-primary btn-sm">Salvar</button>
<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
</form>
</div>
</div>
@endsection --}}