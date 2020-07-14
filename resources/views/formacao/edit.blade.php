@extends('adminlte::page')

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>

<script src="/js/formacao/formacao.js"></script>




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
                <div class="col-sm-6">
                  <h2 class="mb-0" style="color:dodgerblue; text-align: center; font-size: 25px;">
                    Formação Acadêmica e Cursos Complementares
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-graduate fa-stack-1x fa-inverse"></i>
                    </span>

                  </h2>

                </div>


                <div class="col-xs-4 col-2" style="margin-left: auto; text-align:end;">
                  <button class=" btn btn-secondary" type="button" title="Voltar"
                    style="height:30px; margin-top: 10px; width:70px;">
                    <a href="/cursos" style="color: white;">Voltar<span class="fas fa-undo"
                        style="padding-left: 5px; color:white; font-size:9px;"></span></a>
                  </button>

                </div>
              </div>
            </div>




          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body" style="box-sizing: border-box;">

              <ul style="list-style-type: none;">


                <form action="/curso/{{$curso->idcurso}}" method="POST">
                  @csrf

                  <div class="form-group">
                    <li><strong> DESCRIÇÃO DO CURSO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" name="nome"
                        id="nome" placeholder="Informe a descrição ou nome do curso" value="{{$curso->nome}}"
                        title="Descrição do Curso">
                      @if($errors->has('nome'))
                      <div class="invalid-feedback">
                        {{$errors->first('nome')}}
                      </div>
                      @endif
                    </li>
                  </div>

                  <div class="form-group">
                    <li><strong>TIPO DE FORMAÇÃO:*&nbsp;&nbsp;&nbsp;
                        <span class="fas fa-question-circle dropdown-toggle" title="Como devo preencher a formação??"
                          type="button" id="dropdownMenuButton" data-toggle="dropdown" style="color:red;">

                          <span class=" dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <textarea name="" id="" cols="30" rows="10"
                              style="text-align:justify;">Formação:
                          O candidato deve colocar o grau de escolaridade que possui, ou seja, quem tem nível superior (Graduação, Pos Graduação, Mestrado e Doutorado), fundamental, nível médio ou técnico  deve selecionar a opção acadêmica!.
                          No Caso das formação complementar os usuários devem selecionar quando os mesmos forem inserir cursos profissionalizantes, especialização, aprandizagem, aprimoramento e etc. </textarea>
                          </span>
                        </span>
                      </strong>
                      @if($curso->escolaridade == '1')
                      <select class="custom-select" id="escolaridade" name="escolaridade" title="Tipo de Formação">
                        <option value="1">Academica</option>
                      </select>
                      @elseif($curso->escolaridade == '2')
                      <select class="custom-select" id="escolaridade" name="escolaridade" title="Tipo de Formação">
                        <option value="2">Complementar</option>
                      </select>
                      @else
                      @endif
                    </li>

                  </div>

                  @if ($curso->escolaridade =='1')
                  <div class="form-group" id="idnivel">
                    <li><strong> NÍVEL:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="form-control {{$errors->has('nivel_idnivel') ? 'is-invalid' : ''}}"
                        id="nivel_idnivel" name="nivel_idnivel" title="Nivel de Escolaridade">
                        {{-- <option value="">Selecionar</option> --}}
                        @foreach(Helper::getNiveis() as $n)
                        @if ($curso->nivel_idnivel == $n->idnivel)
                        <option value="{{$n->idnivel}}" {{ $curso->nivel_idnivel == $n->idnivel ? 'selected' : '' }}>
                          {{ $n->nome }}
                        </option>
                        @else
                        @endif
                        @endforeach
                      </select>
                      @if($errors->has('nivel_idnivel'))
                      <div class="invalid-feedback">
                        {{$errors->first('nivel_idnivel')}}
                      </div>
                      @endif
                    </li>
                  </div>
                  @else

                  @endif



                  @if ($curso->escolaridade =='2')
                  <div class="form-group" id="idcateg">
                    <li><strong>CATEGORIA:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select {{$errors->has('categoria_idcategoria') ? 'is-invalid' : ''}}"
                        id="categoria_idcategoria" name="categoria_idcategoria" title="Categoria do Curso">
                        <option value="">Selecionar</option>
                        @foreach(Helper::getCategorias() as $c)
                        <option value="{{$c->idcategoria}}"
                          {{ $curso->categoria_idcategoria == $c->idcategoria ? 'selected' : '' }}>
                          {{ $c->nome }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('categoria_idcategoria'))
                      <div class="invalid-feedback">
                        {{$errors->first('categoria_idcategoria')}}
                      </div>
                      @endif
                    </li>
                  </div>
                  @else

                  @endif


                  @if ($curso->escolaridade == '1')
                  <div class="form-group">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm">
                          <strong>ESTADO DA INSTITUIÇÃO:
                            &nbsp;&nbsp;&nbsp;</strong>
                          <select class="form-control" id="selectinstituicao" name="selectinstituicao"
                            title="Localidade da Instituição">
                            <option value="">Selecionar</option>
                            @foreach (Helper::getEstados() as $est)
                            <option value="{{$est->idestado}}" @foreach (Helper::getInstitui() as $inst)
                              {{(($est->idestado == $inst->estado_idestado) && ($inst->idinstituicao == $curso->instituicao_idinstituicao)) ?'selected' : ''}}
                              @endforeach>
                              {{$est->nome}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-sm">
                          <strong>INSTITUIÇÃO:
                            &nbsp;&nbsp;&nbsp;</strong>
                          <select class="form-control" id="instituicao_idinstituicao" name="instituicao_idinstituicao"
                            title="Nome da Instituição">
                            <option value="" selected>Selecionar</option>
                            @foreach (Helper::getInstitui() as $ist)
                            @if ($ist->idinstituicao == $curso->instituicao_idinstituicao)
                            @foreach (Helper::getInstitui() as $institui)
                            @if ($institui->estado_idestado == $ist ->estado_idestado)
                            <option value="{{$institui->idinstituicao}}"
                              {{ $institui->idinstituicao == $curso->instituicao_idinstituicao? 'selected' : '' }}>
                              {{ $institui->nome }}</option>
                            @else
                            @endif
                            @endforeach
                            @else
                            @endif
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  @else
                  <div class="form-group" id="idnomeescola">
                    <li><strong>NOME DA INSTITUIÇÃO:</strong>
                      <input type="text" class="form-control" name="escola" placeholder="Nome da Instituição"
                        title="Nome da Escola" value="{{$curso->escola}}">
                    </li>
                  </div>
                  @endif



                  {{-- <div class="form-group" style="display: none;" id="idnomeescola">
                    <li><strong>NOME DA INSTITUIÇÃO:</strong>
                      <input type="text" class="form-control" name="escola" placeholder="Nome da Escola"
                        title="Nome da Instituição" value="{{$n->escola}}">
                  </li>
            </div> --}}









            @if ($curso->escolaridade =='1')
            <div class="form-group" id="idarea">
              <li><strong> AREA:*&nbsp;&nbsp;&nbsp;</strong>
                <select class="form-control {{$errors->has('area_idarea') ? 'is-invalid' : ''}}" id="area_idarea"
                  name="area_idarea" title="Area de Atuação">
                  <option value="">Selecionar</option>
                  @foreach(Helper::getAreas() as $a)
                  <option value="{{$a->idarea}}" {{ $curso->area_idarea == $a->idarea ? 'selected' : '' }}>
                    {{$a->nome }}</option>
                  @endforeach
                </select>
                @if($errors->has('area_idarea'))
                <div class="invalid-feedback">
                  {{$errors->first('area_idarea')}}
                </div>
                @endif
              </li>
            </div>
            @else
            @endif




            @if ($curso->escolaridade =='1')
            <div class="form-group" id="idperiodo">
              <li><strong>PERÍODO:&nbsp;&nbsp;&nbsp;</strong><span></span>
                <input type="number" class="form-control" id="periodo" name="periodo" value="{{$curso->periodo}}"
                  placeholder="Ex: 1" title="Período Atual">
            </div>
            </li>
            @else
            @endif






            <div class="form-group">
              <li><strong>DATA DE INiCIO:*&nbsp;&nbsp;&nbsp;</strong><span></span>
                <input type="date" class="form-control {{ $errors->has('dtinicio') ? 'is-invalid' : ''}}"
                  name="dtinicio" placeholder="Ex.: 01/01/2010" value="{{$curso->dtinicio}}" title="Data de Inicio">
                @if($errors->has('dtinicio'))
                <div class="invalid-feedback">
                  {{$errors->first('dtinicio')}}
                </div>
                @endif
              </li>
            </div>



            @if ($curso->dtfim == null)
            <div class="form-group">
              <li><strong>JA CONCLUI O CURSO!?&nbsp;&nbsp;&nbsp;</strong><span> </span>
                <div class="form-check form-check-inline" id="idconcluicurso" name="checkcurso">
                  <input class="form-check-input" type="radio" name="idconclui" id="idconclui" value="1">
                  Sim&nbsp;&nbsp;&nbsp;
                  {{-- <label class="form-check-label">Sim&nbsp;&nbsp;&nbsp;</label> --}}


                  <input class="form-check-input" type="radio" name="idconclui" id="idconclui" value="2"> Não
                  {{-- <label class="form-check-label">Não</label> --}}
                </div>
              </li>
            </div>
            @else
            @endif




            @if ($curso->dtfim == null)
            <div class="form-group" style="display: none;" id="dataconclu">
              <li><strong>DATA DA CONCLUSÃO:*&nbsp;&nbsp;&nbsp;</strong><span></span>
                <input type="date" class="form-control" name="dtfim" placeholder="Ex.: 01/01/2010"
                  value="{{Helper::getData($curso->dtfim)}}" title="Data de Conclusão">
              </li>
            </div>
            @else
            <div class="form-group" id="dataconclu">
              <li><strong>DATA DA CONCLUSÃO:&nbsp;&nbsp;&nbsp;</strong><span></span>
                <input type="date" class="form-control" name="dtfim" placeholder="Ex.: 01/01/2010"
                  value="{{$curso->dtfim}}" title="Data de Conclusão">
              </li>
            </div>
            @endif



            {{-- <div class="form-group">
                    <li><strong>INSTITUIÇÃO:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                      <select class="custom-select" id="instituicao_idinstituicao" name="instituicao_idinstituicao">
                        <option value="">Selecionar</option>
                        @foreach(Helper::getInstituicoes() as $i)
                        <option value="{{$i->idinstituicao}}"
            {{ $curso->instituicao_idinstituicao == $i->idinstituicao ? 'selected' : '' }}>
            {{ $i->nome }}</option>
            @endforeach
            </select>
            </li>
          </div> --}}

          {{-- @if($errors->any())
                  <div class="card-footer">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                      {{$error}}
        </div>
        @endforeach
      </div>
      @endif --}}

      <br>
      <div class="form-group " style="text-align: end;">
        <button type="submit" class="btn btn-primary" id="botaosalvarend" title="Confirmar Alterações">Salvar<span
            class="fas fa-save" style="padding-left: 15px;"></button>
        <button class=" btn btn-danger" style="color:red;" type="cancel" title="Cancelar Alterações">
          <a href="/cursos" style="color: white;">Cancelar<span class="fas fa-window-close"
              style="padding-left: 15px;"></span></a>
        </button>
        </form>
        </ul>
      </div>
    </div>

  </div>
</div>
</div>
<div class="col-xs-1 col-md-1">


</div>
</div>
</div>

@endsection

















{{-- <div class="card border">
  <div class= "card-body">  
    <h5>Editar formação acadêmica e cursos</h5>

    <form action="/curso/{{$curso->idcurso}}" method="POST">
@csrf
<div class="row">
  <div class="col">
    <div class="form-group">
      <label for="logradouro">Nome do curso *</label>
      <input type="text" class="form-control" name="nome" placeholder="Nome do Curso" value="{{$curso->nome}}">
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="nivel_idnivel">Nível *</label>
      <select class="custom-select" id="nivel_idnivel" name="nivel_idnivel">
        <option value="">Selecionar</option>
        @foreach(Helper::getNiveis() as $n)
        <option value="{{$n->idnivel}}" {{ $curso->nivel_idnivel == $n->idnivel ? 'selected' : '' }}>{{ $n->nome }}
        </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="categoria_idcategoria">Categoria *</label>
      <select class="custom-select" id="categoria_idcategoria" name="categoria_idcategoria">
        <option value="">Selecionar</option>
        @foreach(Helper::getCategorias() as $c)
        <option value="{{$c->idcategoria}}" {{ $curso->categoria_idcategoria == $c->idcategoria ? 'selected' : '' }}>
          {{ $c->nome }}</option>
        @endforeach
      </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="form-group">
      <label for="area_idarea">Área *</label>
      <select class="custom-select" id="area_idarea" name="area_idarea">
        <option value="">Selecionar</option>
        @foreach(Helper::getAreas() as $a)
        <option value="{{$a->idarea}}" {{ $curso->area_idarea == $a->idarea ? 'selected' : '' }}>{{$a->nome }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="escolaridade">Escolaridade *</label>
      <select class="custom-select" id="escolaridade" name="escolaridade">
        <option value="">Selecionar</option>
        <option value="1" {{ $curso->escolaridade == '1' ? 'selected' : ''}}>Sim</option>
        <option value="2" {{ $curso->escolaridade == '2' ? 'selected' : ''}}>Não</option>
      </select>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="periodo">Período</label>
      <input type="number" class="form-control" name="periodo" value="{{$curso->periodo}}">
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="form-group">
      <label for="dtinicio">Data de início *</label>
      <input type="text" class="form-control" name="dtinicio" placeholder="Ex.: 01/01/2010"
        value="{{Helper::getData($curso->dtinicio)}}">
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="dtfim">Data de conclusão</label>
      <input type="text" class="form-control" name="dtfim" placeholder="Ex.: 01/01/2010"
        value="{{Helper::getData($curso->dtfim)}}">
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="instituicao_idinstituicao">Instituição</label>
      <select class="custom-select" id="instituicao_idinstituicao" name="instituicao_idinstituicao">
        <option value="">Selecionar</option>
        @foreach(Helper::getInstituicoes() as $i)
        <option value="{{$i->idinstituicao}}"
          {{ $curso->instituicao_idinstituicao == $i->idinstituicao ? 'selected' : '' }}>{{ $i->nome }}</option>
        @endforeach
      </select>
    </div>
  </div>
</div>
@if($errors->any())
<div class="card-footer">
  @foreach($errors->all() as $error)
  <div class="alert alert-danger" role="alert">
    {{$error}}
  </div>
  @endforeach
</div>
@endif
<br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
</form>
</div>
</div> --}}