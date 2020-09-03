@extends('adminlte::page')
{{-- importação do jquery --}}

<script src="/vendor/jquery/jquery.min.js"></script>
{{-- <script src="/vendor/jquery/jquery.js"></script> --}}

{{-- link do javascript --}}
<script src="/js/vagas/vagas.js"></script>
<script src="/js/Admin/admin.js"></script>
<script src="/js/Admin/busca_avancada.js"></script>

@section('content')

@include('flash::message')
<div class="row">
  <div class="col-xs-12 col-md-12">
    <div id="accordion" style="margin-top: 40px;">
      <div class="card-border-light">
        <div class="card-header" id="headingTwo" style="background-color: white;">
          <div class="container">
            <div class="row">
              <div class="col-">
                <h2 class="mb-0" style="color:dodgerblue;">
                  {{$vaga->titulo}}
                  <span class="fa-stack fa-sm">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-user-tie fa-stack-1x fa-inverse"></i>
                  </span>
                </h2>
              </div>
              <div class="col-xs-8 col-md-8" style=" text-align:end; margin-left: auto;">
                <div class="btn-group btn-sm" role="group">
                  @if(is_null($vaga->dtfim))
                  <button class=" btn btn-primary btn-sm" style="margin-top: 15px;">
                    <a href="/editarvaga/{{$vaga->idvaga}}" style="color: white;">
                      Editar<span class="fa fa-edit" style="padding-left: 15px;"></span>
                    </a>
                  </button>

                  <button class=" btn btn-danger btn-sm" style="margin-top: 15px;">
                    <a style=" color: white;" href="/encerrar/{{$vaga->idvaga}}" id="encerrar_vaga"
                      data_value="{{$vaga->idvaga}}">
                      Encerrar Vaga<span class="fas fa-window-close" style="padding-left:15px;"></span>
                    </a>
                  </button>
                  @endif
                  <button class=" btn btn-secondary btn-sm" style="margin-top: 15px;">
                    <a style="color: white;" href="{{route('listar')}}">
                      Voltar<span class="fas fa-undo" style="padding-left: 10px; font-size:15px;"></span>
                    </a>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <div class="container">

              <div class="row" style="margin-top: 25px;">
                <div class="col-sm">
                  <ul></ul>
                  <ul style="list-style-type: none; margin-right: auto;">
                    <li><strong> TÍTULO:&nbsp;&nbsp;&nbsp;</strong>
                      {{$vaga->titulo}}
                    </li>
                    <hr>
                    <li><strong> STATUS:&nbsp;&nbsp;&nbsp;</strong>
                      {{Helper::getStatusVaga($vaga->status)}}
                    </li>
                    <hr>
                    <li><strong> DATA DE PUBLICAÇÃO DA VAGA:&nbsp;&nbsp;&nbsp;</strong>
                      {{Helper::getData($vaga->dtinicio)}}
                    </li>
                    <hr>
                    <li><strong> PREVISÃO DE ENCERRAMENTO:&nbsp;&nbsp;&nbsp;</strong>
                      {{Helper::getData($vaga->dtprazo)}}
                    </li>
                    @if(!is_null($vaga->dtfim))
                    <hr>
                    <li><strong> DATA DE ENCERRAMENTO DA VAGA:&nbsp;&nbsp;&nbsp;</strong>
                      {{Helper::getData($vaga->dtfim)}}
                    </li>
                    @endif
                    <hr>
                    <li><strong> LOCAL:&nbsp;&nbsp;&nbsp;</strong>
                      {{$vaga->local}}
                    </li>
                    <hr>
                    <li><strong> QUANTIDADE:&nbsp;&nbsp;&nbsp;</strong>
                      {{$vaga->quant}}
                    </li>
                    <hr>
                    <li><strong> DESCRIÇÃO:&nbsp;&nbsp;&nbsp;</strong>
                      {{$vaga->descricao}}
                    </li>
                    <hr>
                    <li><strong> REQUISITOS:&nbsp;&nbsp;&nbsp;</strong>
                      {{$vaga->requisitos}}
                    </li>
                    <hr>
                    <li><strong> TIPO DE VAGA:&nbsp;&nbsp;&nbsp;</strong>
                      @if($vaga->tpvaga == 1)
                      Efetiva
                      @elseif($vaga->tpvaga == 2)
                      Temporária
                      @else
                      Estágio
                      @endif
                    </li>
                    @if($vaga->pcd == 1)
                    <hr>
                    <li><strong>DESTINADA A PESSOAS COM DEFICIÊNCIA&nbsp;&nbsp;&nbsp;</strong></li>
                    @endif
                    <hr>
                  </ul>
                </div>
              </div>


              @if(count($candidatos)>0)
              <!--Filtros-->
              <div class="row" style="margin-top: 50px;">
                <div class="col-sm">
                  @if(isset($parametros))
                  <p>Filtros:</p>
                  <div class="d-flex flex-row bd-highlight mb-3">
                    @if(isset($parametros['nomemodal']))
                    @if ($parametros['nomemodal'] != '')
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">
                        {{$parametros['nomemodal']}}
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    @if(isset($parametros['emailmodal']))
                    @if ($parametros['emailmodal']!=null)
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">
                        {{$parametros['emailmodal']}}
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    @if(isset($parametros['generomodal']))
                    @if ($parametros['generomodal']!=null)
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">
                        @if ($parametros['generomodal'] =='M')
                        Masculino
                        @elseif($parametros['generomodal']=='F')
                        Feminino
                        @elseif($parametros['generomodal']=='N')
                        Prefere não informar
                        @endif
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    @if(isset($parametros['naturalidademodal']))
                    @if ($parametros['naturalidademodal']!=null)
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">
                        <i class="fas fa-check"></i>
                        {{Helper::getCidade($parametros['naturalidademodal'])}}
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    @if(isset($parametros['cidadeatualmodal']))
                    @if ($parametros['cidadeatualmodal']!=null)
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">
                        {{Helper::getCidade($parametros['cidadeatualmodal'])}}
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    @if(isset($parametros['escolaridademodal']))
                    @if ($parametros['escolaridademodal']!=null)
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">
                        @if ($parametros['escolaridademodal'] =='1')
                        Acadêmico
                        @else
                        Complementar
                        @endif
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    @if(isset($parametros['nivelmodal']))
                    @if ($parametros['nivelmodal']!=null)
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">
                        {{Helper::getNivel($parametros['nivelmodal'])}}
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    @if(isset($parametros['areamodal']))
                    @if ($parametros['areamodal']!=null)
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">
                        {{Helper::getArea($parametros['areamodal'])}}
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    @if(isset($parametros['nomecursomodal']))
                    @if ($parametros['nomecursomodal']!=null)
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">{{$parametros['nomecursomodal']}}
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    @if(isset($parametros['cargomodal']))
                    @if ($parametros['cargomodal']!=null)
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">{{$parametros['cargomodal']}}
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    @if(isset($parametros['empresamodal']))
                    @if ($parametros['empresamodal']!=null)
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">{{$parametros['empresamodal']}}
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    @if(isset($parametros['catcnhmodal']))
                    @if ($parametros['catcnhmodal']!=null)
                    <div class="p-2 bd-highlight">
                      <p class="badge badge-primary badge-primary">{{$parametros['catcnhmodal']}}
                        <i class="fas fa-check" style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                        </i>
                      </p>
                    </div>
                    @endif
                    @endif
                    <?php 
                        $maxparametros=sizeof($parametros);
                      ?>
                    @if ($maxparametros >0)
                    <div class="p-2 bd-highlight">
                      <a href="/detalhes/{{$vaga->idvaga}}" class="badge badge-danger"
                        title="Voltar para tela inicial de busca">LIMPAR FILTROS
                        <span class="fas fa-times" style="padding-left: 10px; color: white;"></a>
                    </div>
                    @endif
                  </div>

                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  <p>
                    @if(isset($parametros))
                    Mostrando de {{$candidatos->firstItem()}}
                    até {{$candidatos->lastItem()}}
                    de {{ $candidatos->total() }} registros
                    @endif
                  </p>
                </div>
              </div>
              <div class=" row">
                <div class="col-sm">
                  @if(isset($parametros))
                  {!!$candidatos->appends($parametros)->links()!!}
                  @endif
                </div>
              </div>
            </div>


            <div class="card-body">
              <div class="col" style="text-align: end;">
                <a href="#" class="btn btn-info btn-lg" type="button" style="margin-right: auto; text-align: end;"
                  data-toggle="modal" data-target="#filtrar_candidatos" style="padding-left: 7px; padding-right: 7px;">
                  Filtrar Candidatos
                </a>
                <br>

                <!-- Início Modal  buscar por vaga-->
                <div class="modal fade" id="filtrar_candidatos">
                  <div class="modal-dialog " role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">FILTRAR CANDIDATOS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{route('filtrarcandidato')}}" method="POST">
                        @csrf
                        <div class="modal-body">

                          <ul style="list-style-type: none;">
                            <div class="form-group" style="text-align: start" id="email_modal_busca">
                              <li><strong> E-MAIL:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                <input type="text" class="form-control" name="emailmodal" id="cnh"
                                  title="Insira o email para a busca">
                              </li>
                            </div>
                            <div class="form-group" style="text-align:start" id="nome_modal_busca">
                              <li><strong> NOME:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                <input type="text" class="form-control" name="nomemodal" id="nome"
                                  title="Insira o nome que será buscado">
                              </li>
                            </div>
                            <div class="form-group" id="genero_modal_busca" style="text-align: start;">
                              <li><strong> GÊNERO:&nbsp;&nbsp;&nbsp;</strong>
                                <select class="form-control " id="genero" name="generomodal"
                                  title="Selecione o gênero para a busca">
                                  <option value="" selected>Selecionar</option>
                                  <option value="F">Feminino</option>
                                  <option value="M">Masculino</option>
                                  <option value="N">Prefere não informar</option>
                                </select>
                              </li>
                            </div>
                            <div class="form-group" id="pcd_modal_busca" style="text-align: start;">
                              <li><strong> PCD:&nbsp;&nbsp;&nbsp;</strong>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="pcdmodal" id="pcd" value="1">
                                  <label class="form-check-label">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="pcdmodal" id="pcd" value="2">
                                  <label class="form-check-label">Não</label>
                                </div>
                              </li>
                            </div>

                            <div class="form-group">
                              <div class="container">
                                <div class="row">
                                  <div class="col-sm-6" style="text-align: start;">
                                    <strong>ESTADO DE NATURALIDADE:
                                      &nbsp;&nbsp;&nbsp;</strong>

                                    <select class="form-control " id="natural" name="naturalmodal"
                                      title="Estado de Origem">
                                      <option value="" selected>Selecionar
                                      </option>
                                      @foreach(Helper::getEstados() as $est)
                                      <option value="{{$est->idestado}}">
                                        {{ $est->nome }}
                                      </option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-sm-6">
                                    <strong>CIDADE DE NATURALIDADE:
                                      &nbsp;&nbsp;&nbsp;</strong>
                                    <select class="form-control" id="naturalidade" name="naturalidademodal"
                                      title="Cidade de Origem">
                                      <option value="" selected>Selecionar
                                      </option>
                                    </select>
                                  </div>

                                </div>
                              </div>
                              </li>
                            </div>

                            <div class="form-group">
                              <div class="container">
                                <div class="row">
                                  <div class="col-sm-6" style="text-align: start;">
                                    <strong>ESTADO ATUAL:
                                      &nbsp;&nbsp;&nbsp;</strong>

                                    <select class="form-control " id="estadoatual" name="estadoatualmodal"
                                      title="Estado atual">
                                      <option value="" selected>Selecionar
                                      </option>
                                      @foreach(Helper::getEstados() as $est)
                                      <option value="{{$est->idestado}}">
                                        {{ $est->nome }}
                                      </option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-sm-6">
                                    <strong>CIDADE ATUAL:
                                      &nbsp;&nbsp;&nbsp;</strong>
                                    <select class="form-control" id="cidadeatual" name="cidadeatualmodal"
                                      title="Cidade atual">
                                      <option value="" selected>Selecionar
                                      </option>
                                    </select>
                                  </div>

                                </div>
                              </div>
                              </li>
                            </div>

                            <div class="form-group" style="text-align: start;">
                              <li><strong>TIPO DE FORMAÇÃO:&nbsp;&nbsp;&nbsp;
                                </strong>
                                <select class="form-control " id="escolaridade" name="escolaridademodal"
                                  title="Tipo de Formação">
                                  <option value="" selected>Selecionar</option>
                                  <option value="1">Acadêmica</option>
                                  <option value="2">Complementar</option>
                                </select>
                              </li>
                            </div>

                            <div class="form-group" id="idnivel_modal_busca" style="display: none; text-align:start;">
                              <li><strong> NÍVEL:&nbsp;&nbsp;&nbsp;
                                </strong>
                                <select class="form-control" id="nivel_idnivel" name="nivelmodal"
                                  title="Nivel de Escolaridade">
                                  <option value="" selected>Selecionar</option>
                                  @foreach(Helper::getNiveis() as $n)
                                  <option value="{{$n->idnivel}}">{{ $n->nome }}
                                  </option>
                                  @endforeach
                                </select>
                              </li>
                            </div>


                            <div class="form-group" id="categoria_modal_busca" style="display: none; text-align:start;">
                              <li><strong> CATEGORIA:&nbsp;&nbsp;&nbsp;
                                </strong>
                                <select class="custom-select" id="categoria_idcategoria" name="categoriamodal">
                                  <option value="" selected>Selecionar</option>
                                  @foreach(Helper::getCategorias() as $c)
                                  <option value="{{$c->idcategoria}}">{{ $c->nome }}
                                  </option>
                                  @endforeach
                                </select>
                              </li>
                            </div>

                            <div class="form-group" style="text-align:start; display:none" id="area_modal_busca">
                              <li><strong> ÁREA:&nbsp;&nbsp;&nbsp;</strong>
                                <select class="custom-select" id="area_idarea" name="areamodal" title="Area de Atuação">
                                  <option value="" selected>Selecionar</option>
                                  @foreach(Helper::getAreas() as $a)
                                  <option value="{{$a->idarea}}">{{$a->nome }}
                                  </option>
                                  @endforeach
                                </select>
                              </li>
                            </div>
                            <div class="form-group" style="text-align:start" id="curso_modal_busca">
                              <li><strong> CURSO:&nbsp;&nbsp;&nbsp;</strong><span>
                                </span>
                                <input type="text" class="form-control" name="nomecursomodal" id="curso"
                                  title="Insira o curso">
                              </li>
                            </div>

                            <div class="form-group" style="text-align:start" id="empresa_modal_busca">
                              <li><strong> EMPRESA:&nbsp;&nbsp;&nbsp;</strong><span>
                                </span>
                                <input type="text" class="form-control" name="empresamodal" id="empresa"
                                  title="Insira o nome da empresa">
                              </li>
                            </div>

                            <div class="form-group" style="text-align:start" id="cargo_modal_busca">
                              <li><strong> CARGO:&nbsp;&nbsp;&nbsp;</strong><span>
                                </span>
                                <input type="text" class="form-control" name="cargomodal" id="cargo"
                                  title="Insira o cargo exercido">
                              </li>
                            </div>

                            <div class="form-group" style="text-align: start;" id="catcnh_modal_busca">
                              <li><strong> CATEGORIA DA
                                  CNH:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                <select class="custom-select" id="catcnh" name="catcnhmodal"
                                  title="Insira a categoria da CNH">
                                  <option value="" selected>Selecionar</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                                  <option value="AB">AB</option>
                                  <option value="AC">AC</option>
                                  <option value="AD">AD</option>
                                  <option value="AE">AE</option>
                                </select>
                              </li>
                            </div>

                            <div class="form-group" style="text-align:start" id="buscar_candidatos_vaga">
                              <input type="hidden" name="vagamodal" value="{{$vaga->idvaga}}">
                            </div>
                          </ul>


                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Fim Modal-->

              </div>



              <div class="container col">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Candidato</th>
                        <th scope="col">Status</th>
                        <th scope="col">Data da candidatura</th>
                        <th scope="col">Observação</th>
                        <th scope="col">Opções</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($candidatos as $c)
                      <tr>
                        <th>{{$c->name}}</th>
                        <td>{{Helper::getStatusCandidatura($c->status)}}</td>
                        <td>{{Helper::getData($c->dtcandidatura)}}</td>
                        <td>{{$c->observ}}</td>
                        <td>
                          <a href="/buscarcurriculo/visualizar/{{$c->curriculo_idcurriculo}}"
                            class="badge badge-primary">Visualizar Currículo</a><br>
                          <a href="#" class="badge badge-warning" data-toggle="modal"
                            data-target="#exampleModal{{$c->idcurriculo}}"
                            style="padding-left: 6px; padding-right:6px;">Incluir
                            Observação</a><br>
                          @if($c->status == 1)
                          <a href="/classificar/2/{{$c->vaga_idvaga}}/{{$c->curriculo_idcurriculo}}"
                            class="badge badge-success" style="padding-left: 29px; padding-right: 29px;"
                            name="name_classificar" data_value="{{$c->vaga_idvaga}}">Classificar</a><br>
                          <a href="/classificar/3/{{$c->vaga_idvaga}}/{{$c->curriculo_idcurriculo}}"
                            class="badge badge-danger" style="padding-left: 20px; padding-right: 20px;"
                            name="name_desclassificar" data_value="{{$c->vaga_idvaga}}">Desclassificar</a><br>
                          @endif
                        </td>
                      </tr>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{$c->idcurriculo}}">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Processo seletivo do(a) {{$c->name}}:</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="/editarObs" method="POST">
                              @csrf
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="message-text" class="col-form-label">Observações:</label>
                                  <textarea class="form-control" rows="4" name="observ"
                                    id="message-text">{{$c->observ}}</textarea>
                                </div>
                                <div class="form-group">
                                  <input type="hidden" name="vaga" value="{{$c->vaga_idvaga}}">
                                  <input type="hidden" name="curriculo" value="{{$c->curriculo_idcurriculo}}">
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- Fim modal-->
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            @else
            <div class="card-footer" style="text-align: center;">
              <h5>Ninguém se inscreveu nesta vaga ainda!</h5>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection