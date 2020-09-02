@extends('adminlte::page')

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}

<script src="/vendor/jquery/jquery.js"></script>
<script src="/js/formacao/formacao.js"></script>



{{-- importação select2 --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/i18n/pt-BR.js"></script>

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
                  <h2 class="mb-0"
                    style="color:dodgerblue; text-align: center; font-size:25px; justify-content: center;">
                    Formação Acadêmica e Cursos Complementares
                    <span class="fa-stack fa-sm" style="text-align: center">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-graduate fa-stack-1x fa-inverse"></i>
                    </span>

                  </h2>

                </div>


                <div class="col-xs-4 col-2" style="margin-left: auto; text-align: end;">
                  <div class="btn-group " role="group" aria-label="">
                    {{-- <button class=" btn btn-link">
											<a href="/curriculo/editar/{{Auth::user()->id}}" >Editar</a>
                    <span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

                    </button> --}}

                    <button class=" btn btn-secondary btn-sm" type="button"
                      style="height:30px; margin-top: 10px; width:70px;" title="Voltar">
                      <a href="/cursos" style="color: white;">Voltar<span class="fas fa-undo"
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


                <form action="/curso" method="POST" enctype="multipart/form-data" id="idfomrformacao">
                  @csrf

                  <div class="form-group">
                    <li><strong> DESCRIÇÃO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="text" class="form-control " name="nome" placeholder="Descrição do Curso"
                        title="Descrição do Curso" id="nome">

                      <div class="invalid-feedback" id="mensdesc" style="display: none;">
                        Você precisa preencher a descrição!
                      </div>
                    </li>
                  </div>


                  {{-- complemento  definicao pendente --}}
                  <div class="form-group">
                    <li><strong>TIPO DE FORMAÇÃO:*&nbsp;&nbsp;&nbsp;
                        <span class="fas fa-question-circle dropdown-toggle" title="Como devo preencher a formação??"
                          type="button" id="dropdownMenuButton" data-toggle="dropdown" style="color:red;">

                          <span class=" dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-right: 40px;">
                            <textarea class="textarea" name="" id="" cols="30" rows="10"
                              style="text-align:justify; font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;padding: 10px; line-height: 1.5;
                              border-radius: 5px; border: 1px solid #ccc;box-shadow: 1px 1px 1px
                              #999;">Formação:
    O candidato deve colocar o grau de escolaridade que possui, ou seja, quem tem nível superior (Graduação, Pos Graduação, Mestrado e Doutorado), fundamental, nível médio ou técnico  deve selecionar a opção acadêmica.
    No caso da formação complementar os usuários devem selecionar quando os mesmos forem inserir cursos profissionalizantes, especialização, aprandizagem, aprimoramento e etc. </textarea>
                          </span>
                        </span>
                      </strong>
                      <select class="form-control " id="escolaridade" name="escolaridade" title="Tipo de Formação">
                        <option value="" selected>Selecionar</option>
                        <option value="1">Academica</option>
                        <option value="2">Complementar</option>
                      </select>
                      <div class="invalid-feedback" id="mensescol" style="display: none;">
                        Você precisa preencher a descrição!
                      </div>
                    </li>

                  </div>


                  <div class="form-group" id="idnivel" style="display: none;">
                    <li><strong> NÍVEL:*&nbsp;&nbsp;&nbsp;
                        <span class="fas fa-question-circle dropdown-toggle" title="Como devo preencher o nível??"
                          type="button" id="dropdownMenuButton" data-toggle="dropdown" style="color:red;">

                          <span class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-right: 40px;">
                            <textarea name="" id="" cols="30" rows="6"
                              style="text-align:justify; font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; padding: 10px; line-height: 1.5; border-radius: 5px; border: 1px solid #ccc;box-shadow: 1px 1px 1px #999;">Nivel:
    O candidato deve colocar o nível de escolaridade do curso, ou seja, curso superior (Graduação, Pos Graduação, Mestrado e Doutorado), fundamental, nível médio ou técnico. </textarea>
                          </span>
                        </span>
                      </strong>
                      <select class="form-control {{$errors->has('nivel_idnivel') ? 'is-invalid' : ''}}"
                        id="nivel_idnivel" name="nivel_idnivel" title="Nivel de Escolaridade">
                        <option value="" selected>Selecionar</option>
                        @foreach(Helper::getNiveis() as $n)
                        <option value="{{$n->idnivel}}">{{ $n->nome }}</option>
                        @endforeach
                      </select>

                      <div class="invalid-feedback" id="mensnivel" style="display:none;">
                        Você precisa preencher o nível!
                      </div>

                    </li>
                  </div>

                  <div class="form-group" id="idcategoria" style="display: none;">
                    <li><strong> CATEGORIA:*&nbsp;&nbsp;&nbsp;
                        <span class="fas fa-question-circle dropdown-toggle" title="Como devo preencher a categoria??"
                          type="button" id="dropdownMenuButton" data-toggle="dropdown" style="color:red;">

                          <span class=" dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-right: 40px;">
                            <textarea name="" id="" cols="30" rows="6"
                              style="text-align:justify;font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;padding: 10px; line-height: 1.5; border-radius: 5px; border: 1px solid #ccc;box-shadow: 1px 1px 1px #999;">Categoria:
    O candidato deve colocar a categoria em que este curso complementar pertence, ou seja, se é um curso complementar de, aprimoramento, idiomas, certificação, etc. </textarea>
                          </span>
                        </span>
                      </strong>
                      <select class="custom-select" id="categoria_idcategoria" name="categoria_idcategoria">
                        <option value="" selected>Selecionar</option>
                        @foreach(Helper::getCategorias() as $c)
                        <option value="{{$c->idcategoria}}">{{ $c->nome }}</option>
                        @endforeach
                      </select>
                      <div class="invalid-feedback" id="menscategoria" style="display: none;">
                        Você precisa preencher a categoria!
                      </div>
                    </li>
                  </div>


                  <div class="form-group" style="display: none;" id="idmostrarinstituicao">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-6">
                          <strong>ESTADO DA INSTITUIÇÃO:
                            &nbsp;&nbsp;&nbsp;
                            <span class="fas fa-question-circle dropdown-toggle" title="Estado da instituição??"
                              type="button" id="dropdownMenuButton" data-toggle="dropdown" style="color:red;">

                              <span class=" dropdown-menu" aria-labelledby="dropdownMenuButton"
                                style="margin-right: 40px;">
                                <textarea name="" id="" cols="30" rows="3"
                                  style="text-align:justify;font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; padding: 10px; line-height: 1.5; border-radius: 5px; border: 1px solid #ccc;box-shadow: 1px 1px 1px #999;">Estado da instituição:   
    O candidato deve selecionar o estado que a instituição pertence. </textarea>
                              </span>
                            </span></strong>
                          <select class="form-control" id="selectinstituicao" name="selectinstituicao"
                            title="Localidade da Instiuição">
                            <option value="">Selecionar</option>
                            @foreach (Helper::getEstados() as $est)
                            <option value="{{$est->idestado}}">{{$est->nome}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-sm-6">
                          <strong>INSTITUIÇÃO:
                            &nbsp;&nbsp;&nbsp;
                            <span class="fas fa-question-circle dropdown-toggle"
                              title="Como devo preencher a instituição??" type="button" id="dropdownMenuButton"
                              data-toggle="dropdown" style="color:red;">

                              <span class=" dropdown-menu" aria-labelledby="dropdownMenuButton"
                                style="margin-right: 40px;">
                                <textarea name="" id="" cols="30" rows="5"
                                  style="text-align:justify;font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; padding: 10px; line-height: 1.5; border-radius: 5px; border: 1px solid #ccc;box-shadow: 1px 1px 1px #999;">Formação:
             O candidato deve procurar nas opções a instituição de ensino referente ao seu curso. A procura poderá ocorrer com a inserção do nome da instituição.
                             </textarea>
                              </span>
                            </span>
                          </strong>
                          <select class="js-example-theme-single form-control" id="instituicao_idinstituicao"
                            name="instituicao_idinstituicao" title="Nome da Instituição">
                            {{-- <option value=""></option> --}}
                          </select>

                        </div>

                      </div>
                    </div>
                  </div>
                  <div class=" form-group" style="display: none;" id="idnomeescola">
                    <li><strong>NOME DA INSTITUIÇÃO:</strong>
                      <input type="text" class="form-control" name="escola" placeholder="Nome da Instituição"
                        title="Nome da Escola">
                    </li>
                  </div>


                  <div class="form-group" style="display: none;" id="idarea">
                    <li><strong> ÁREA:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select" id="area_idarea" name="area_idarea" title="Area de Atuação">
                        <option value="" selected>Selecionar</option>
                        @foreach(Helper::getAreas() as $a)
                        <option value="{{$a->idarea}}">{{$a->nome }}</option>
                        @endforeach
                      </select>
                      <div class="invalid-feedback" id="mensarea" style="display:none;">
                        Você precisa preencher o nível!
                      </div>
                    </li>
                  </div>




                  <div class="form-group" id="idperiodo" style="display: none;">
                    <li><strong>PERÍODO:&nbsp;&nbsp;&nbsp;
                        <span class="fas fa-question-circle dropdown-toggle" title="Como devo preencher o perído??"
                          type="button" id="dropdownMenuButton" data-toggle="dropdown" style="color:red;">
                          <span class=" dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-right: 40px;">
                            <textarea name="" id="" cols="30" rows="5"
                              style="text-align:justify;font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; padding: 10px; line-height: 1.5; border-radius: 5px; border: 1px solid #ccc;box-shadow: 1px 1px 1px #999;">Período:
    O candidato deve colocar o período em que esta atualmente. Caso não tenha concluido.
                           </textarea>
                          </span>
                        </span>
                      </strong>
                      <input type="number" class="form-control" name="periodo" placeholder="Ex.: 1º,2º,3º..."
                        title="Período Atual" id="periodo">
                      <div class="invalid-feedback" id="mensperiodo" style="display:none;">
                        Você precisa preencher o nível!
                      </div>
                    </li>
                  </div>



                  <div class="form-group">
                    <li><strong> DATA DE INÍCIO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="date" class="form-control {{ $errors->has('dtinicio') ? 'is-invalid' : ''}}"
                        name="dtinicio" placeholder="" title="Inicio do Curso" id="dtinicio">

                      <div class="invalid-feedback" style="display: none" id="mensdtinicio">
                        Você precisa preencher a data de inicio!
                      </div>
                    </li>
                  </div>

                  <div class="form-group">
                    <li><strong>JA CONCLUIU O CURSO?&nbsp;&nbsp;&nbsp;</strong><span> </span>
                      <div class="form-check form-check-inline" id="idconcluicurso" name="checkcurso">
                        <input class="form-check-input" type="radio" name="idconclui" id="idconclui" value="1">
                        Sim&nbsp;&nbsp;&nbsp;
                        {{-- <label class="form-check-label">Sim&nbsp;&nbsp;&nbsp;</label> --}}

                        <input class="form-check-input" type="radio" name="idconclui" id="idconclui" value="2">
                        Não
                        {{-- <label class="form-check-label">Não</label> --}}
                      </div>
                    </li>
                  </div>

                  <div class="form-group" style="display: none;" id="dataconclu">
                    <li style=""><strong> DATA DE CONCLUSÃO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="date" class="form-control" name="dtfim" placeholder="" title="Data de Conclusão">
                    </li>
                  </div>

                  {{-- <div class="form-group" style="display: none;" id="previconcl">
                    <li style=""><strong> PREVISÃO DE CONCLUSÃO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="date" class="form-control" name="dtfim" placeholder=""> </li>
                  </div> --}}



                  <br>
                  <div class="form-group " style=" text-align: end;">
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