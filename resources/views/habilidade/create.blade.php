@extends('adminlte::page')
{{-- importação do jquery --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

{{-- importação do arquivo JS --}}
<script src="/js/Habilidade/habilidade.js"></script>
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
                  <h2 class="mb-0" style="color:dodgerblue; text-align: center; font-size:25px;">
                    Habilidades e Ferramentas
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fas fa-cogs  fa-stack-1x fa-inverse"></i>
                    </span>

                  </h2>

                </div>


                <div class="col-xs-6 col-2" style="margin-left: auto; text-align: end;">
                  <div class="btn-group " role="group" aria-label="">
                    {{-- <button class=" btn btn-link">
											<a href="/curriculo/editar/{{Auth::user()->id}}" >Editar</a>
                    <span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

                    </button> --}}

                    <button class=" btn btn-secondary btn-sm" type="button"
                      style="height:30px; margin-top: 10px; width:70px;" title="Voltar">
                      <a href="/experiencias" style="color: white;">Voltar<span class="fas fa-undo"
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


                <form action="/habilidade" method="POST" id="idformhabil">
                  @csrf

                  <div class="form-group">
                    <li><strong> CATEGORIA:*&nbsp;&nbsp;&nbsp;
                        <span class="fas fa-question-circle dropdown-toggle" title="Como devo preencher a categoria??"
                          type="button" id="dropdownMenuButton" data-toggle="dropdown" style="color:red;">

                          <span class=" dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <textarea name="" id="" cols="30" rows="6"
                              style="text-align:justify;">Categoria:
                                                O candidato deve colocar a categoria em que esta habilidade pertence, ou seja, se é uma habilidade relacionada a area da informática (Linguagens de Programação, desenvolvimento, suporte e etc), pacote office (Word, Excel, Power Point e etc), Idiomas (Português, Ingles, Espanhol e etc). </textarea>
                          </span>
                        </span>
                      </strong>
                      <select class="form-control " id="tipo" name="tipo_idtipo" title="Categoria">
                        <option value="" selected>Selecione</option>
                        @foreach(Helper::getTiposHab() as $tp)
                        <option value="{{$tp->idtipo}}">{{$tp->nome}}</option>
                        @endforeach
                      </select>

                      <div class="invalid-feedback" id="menstipo" style="display: none;">
                        Você precisa preencher a categoria!
                      </div>

                    </li>
                  </div>


                  {{-- complemento  definicao pendente --}}
                  <div class="form-group">
                    <li><strong>DESCRIÇÃO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="text" class="form-control " name="nome" placeholder="Ex.:Ingles, Pacote Oficce..."
                        title="Descrição da Habilidade" id="descricao">

                      <div class="invalid-feedback" id="mensdescri" style="display: none;">
                        Você precisa preencher a descrição!
                      </div>

                    </li>
                  </div>




                  <div class="form-group" id="idnivel">
                    <li><strong> NíVEL:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="form-control " id="nivel" name="nivel" title="Nível de Aprimoramento">
                        <option value="" selected>Selecionar</option>
                        <option value="1">Básico</option>
                        <option value="2">Intermediário</option>
                        <option value="3">Avançado</option>
                      </select>

                      <div class="invalid-feedback" id="mensnivel" style="display: none;">
                        Você precisa preencher o nível!
                      </div>

                    </li>
                  </div>

                  <br>
                  <div class="form-group" style="text-align: end;">
                    <button type="submit" class="btn btn-primary" id="botaosalvarend"
                      title="Confirmar Alterações">Salvar<span class="fas fa-save" style="padding-left: 15px;"></button>
                    <button class=" btn btn-danger" style="color:red;" type="cancel" title="Cancelar Alterações">
                      <a href="/home" style="color: white;">Cancelar<span class="fas fa-window-close"
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