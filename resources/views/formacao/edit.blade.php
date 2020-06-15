@extends('adminlte::page')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="/js/Dadospessoais/edit.js"></script>
<script src="/js/formacao/formacao.js"></script>




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
                <div class="col-xs-6 col-md-6">
                  <h2 class="mb-0" style="color:dodgerblue;">
                    Formação Acadêmica e Cursos Complementares
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-graduate fa-stack-1x fa-inverse"></i>
                    </span>

                  </h2>

                </div>


                <div class="col-xs-6 col-md-5" style="margin-left: auto; text-align:end; margin-top: 25px;">
                  <button class=" btn btn-link" style="color: gray;">
                    <a style="color: gray;" href="/cursos"><strong><span class="fas fa-undo"
                          style="font-size: 25px; text-align: center;">Voltar</span></strong></a>
                  </button>

                </div>
              </div>
            </div>




          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body" style="box-sizing: border-box;">

              <ul style="list-style-type: none;">


                <form action="/endereco/{{Auth::user()->id}}" method="POST">
                  @csrf

                  <div class="form-group">
                    <li><strong> DESCRIÇÃO DO CURSO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="text" class="form-control" name="nome" id="nome"
                        placeholder="Informe a descrição ou nome do curso" value="{{$curso->nome}}">
                    </li>
                  </div>

                  <div class="form-group">
                    <li><strong>TIPO DE FORMAÇÃO:&nbsp;&nbsp;&nbsp;</strong>
                      @if($curso->escolaridade == '1')
                      <select class="custom-select" id="escolaridade" name="escolaridade">
                        <option value="1" {{ $curso->escolaridade == '1' ? 'selected' : ''}}>Academica</option>
                      </select>
                      @elseif($curso->escolaridade == '2')
                      <select class="custom-select" id="escolaridade" name="escolaridade">
                        <option value="2" {{ $curso->escolaridade == '1' ? 'selected' : ''}}>Complementar</option>
                      </select>
                      @else
                      @endif
                    </li>
                  </div>


                  @if ($curso->escolaridade =='1')
                  <div class="form-group" id="idnivel">
                    <li><strong> NÍVEL:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select" id="nivel_idnivel" name="nivel_idnivel">
                        <option value="">Selecionar</option>
                        @foreach(Helper::getNiveis() as $n)
                        <option value="{{$n->idnivel}}" {{ $curso->nivel_idnivel == $n->idnivel ? 'selected' : '' }}>
                          {{ $n->nome }}
                        </option>
                        @endforeach
                      </select>
                    </li>
                  </div>
                  @else

                  @endif




                  @if ($curso->escolaridade =='2')
                  <div class="form-group" id="idcateg">
                    <li><strong>CATEGORIA:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select" id="categoria_idcategoria" name="categoria_idcategoria">
                        <option value="">Selecionar</option>
                        @foreach(Helper::getCategorias() as $c)
                        <option value="{{$c->idcategoria}}"
                          {{ $curso->categoria_idcategoria == $c->idcategoria ? 'selected' : '' }}>
                          {{ $c->nome }}</option>
                        @endforeach
                      </select>
                    </li>
                  </div>
                  @else

                  @endif





                  @if ($curso->escolaridade =='1')
                  <div class="form-group" id="idarea">
                    <li><strong> AREA:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select" id="area_idarea" name="area_idarea">
                        <option value="">Selecionar</option>
                        @foreach(Helper::getAreas() as $a)
                        <option value="{{$a->idarea}}" {{ $curso->area_idarea == $a->idarea ? 'selected' : '' }}>
                          {{$a->nome }}</option>
                        @endforeach
                      </select>
                    </li>
                  </div>
                  @else
                  @endif




                  @if ($curso->escolaridade =='1')
                  <div class="form-group" id="idperiodo">
                    <li><strong>PERIODO:*&nbsp;&nbsp;&nbsp;</strong><span></span>
                      <input type="number" class="form-control" name="periodo" value="{{$curso->periodo}}"
                        placeholder="Ex: 1">
                  </div>
                  </li>
                  @else
                  @endif






                  <div class="form-group">
                    <li><strong>DATA DE INÍCIO:*&nbsp;&nbsp;&nbsp;</strong><span></span>
                      <input type="text" class="form-control" name="dtinicio" placeholder="Ex.: 01/01/2010"
                        value="{{Helper::getData($curso->dtinicio)}}">
                    </li>
                  </div>



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



                  <div class="form-group" style="display: none;" id="dataconclu">
                    <li><strong>DATA DA CONCLUSÃO:*&nbsp;&nbsp;&nbsp;</strong><span></span>
                      <input type="date" class="form-control" name="dtfim" placeholder="Ex.: 01/01/2010"
                        value="{{Helper::getData($curso->dtfim)}}">
                    </li>
                  </div>

                  {{-- <div class="form-group" style="display: none;" id="previconcl">
                    <li style=""><strong> PREVISÃO DE CONCLUSÃO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="date" class="form-control" name="dtfim" placeholder=""> </li>
                  </div> --}}





                  <div class="form-group">
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

                  <br>
                  <div class="btn-group " role="group" aria-label="">
                    <button type="submit" class="btn btn-link" id="botaosalvarend"
                      style="color: dodgerblue; font-size:25px;"><span class="fas fa-save">Salvar</button>
                    <button class=" btn btn-link" style="color:red;" type="cancel">
                      <a href="cancel" style="color: red;"><span class="fas fa-window-close"
                          style="font-size: 25px; text-align: center;">Cancelar</span></a>
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