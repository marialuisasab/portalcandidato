@extends('adminlte::page')
<script src="/vendor/jquery/jquery.js"></script>
<script src="/js/Admin/buscaarea.js"></script>

{{-- Link do Bootstrap --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
        <div class="col-xs-1 col-md-1"></div>
        <div class="col-xs-10 col-md-10">
            <div id="accordion" style="margin-top: 40px;">
                <div class="card-border-light">
                    <div class="card-header" id="headingOne" style="background-color: white;">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <h2 class="mb-0" style="color:dodgerblue; font-size:25px;">
                                        Currículo
                                        <span class="fa-stack fa-sm">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-file-alt fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </h2>
                                </div>
                                <div class="col-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body" style="box-sizing: border-box;">
                            <!------------------------------------------------------------------------------------------------------------------->
                            @foreach($users as $c)
                            <div class="col" style="text-align: center">
                                <ul style="list-style-type: none;">
                                    <li>
                                        @if(Helper::getIdAdmin())
                                        <a class="badge badge-info badge-sm"
                                            href="{{route('Curriculo.Impressao',$c->idcurriculo)}}">
                                            Baixar arquivo em PDF
                                        </a>
                                        @else
                                        <a class="badge badge-info badge-sm"
                                            href="/imprimirCurriculo/{{$c->idcurriculo}}">
                                            Baixar arquivo em PDF
                                        </a>
                                        @endif
                                    </li>
                                    <li>
                                        @if($c->foto != null)
                                        <img src="{{url('/fotos/'.$c->foto)}}" alt="{{$c->name}}"
                                            style="max-width: 120px; border-radius: 50%;">
                                        @else
                                        <img class="profile-user-img img-responsive img-circle"
                                            src="/img/usuariopadrao.png" alt="Sem foto" style="color: red;">
                                        @endif
                                    </li>
                                    <li>
                                        Data do cadastro: {{Helper::getData($c->dtcadastro)}}
                                    </li>
                                    <li>
                                        Última atualização: {{Helper::getData($c->dtatualizacao)}}
                                    </li>
                                </ul>
                            </div>

                            <h4 style="margin-top: 50px; color: dodgerblue;"> DADOS PESSOAIS </h4>
                            <hr>

                            <ul style="list-style-type: none;">

                                <li>
                                    <strong> NOME:&nbsp;&nbsp;&nbsp;</strong>{{$c->name}}
                                </li>
                                <br>
                                <li>
                                    <strong> CPF:&nbsp;&nbsp;&nbsp;</strong> {{$c->cpf}}
                                </li>
                                <br>
                                <li><strong> CARTEIRA DE IDENTIFICAÇÃO(RG):&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->rg}}
                                </li>
                                <br>
                                @if ($c->ctps!= null)
                                <li><strong> CARTEIRA DE TRABALHO(CTPS):&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->ctps}}
                                </li>
                                @else
                                <li>
                                    <strong> CARTEIRA DE TRABALHO(CTPS):&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;"> Não Informado</span>
                                </li>
                                @endif
                                <br>
                                <li>
                                    <strong> DATA DE NASCIMENTO:&nbsp;&nbsp;&nbsp;</strong>
                                    {{Helper::getData($c->dtnascimento)}}
                                </li>
                                <br>
                                <li>
                                    <strong> IDADE:&nbsp;&nbsp;&nbsp;</strong>
                                    {{Helper::getIdade($c->dtnascimento)}}
                                </li>
                                <br>
                                <li>
                                    <strong> TELEFONE 1:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->telefone1}}
                                </li>
                                <br>
                                @if ($c ->telefone2 != null)
                                <li><strong> TELEFONE 2:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->telefone2}}
                                </li>
                                @else
                                <li><strong> TELEFONE 2:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;">Não Informado!</span>
                                </li>
                                @endif
                                <br>
                                <li>
                                    <strong> EMAIL:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->email}}
                                </li>
                                <br>
                                @if(($c->genero != null)&& ($c->genero =='M'))
                                <li>
                                    <strong> GÊNERO:&nbsp;&nbsp;&nbsp;</strong>
                                    Masculino
                                </li>
                                @elseif(($c->genero != null)&& ($c->genero =='F'))
                                <li><strong> GÊNERO:&nbsp;&nbsp;&nbsp;</strong>
                                    Feminino
                                </li>
                                @else
                                <li><strong> GÊNERO:&nbsp;&nbsp;&nbsp;</strong>
                                    Prefere não informar
                                </li>
                                @endif
                                <br>

                                @if(($c->estadocivil != null)&&($c->estadocivil =='1'))
                                <li>
                                    <strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>
                                    Solteiro
                                </li>
                                @elseif(($c->estadocivil != null)&&($c->estadocivil =='2'))
                                <li>
                                    <strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>
                                    Casado
                                </li>
                                @elseif(($c->estadocivil != null)&&($c->estadocivil =='3'))
                                <li>
                                    <strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>
                                    Divorciado
                                </li>
                                @elseif(($c->estadocivil != null)&&($c->estadocivil =='4'))
                                <li>
                                    <strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>
                                    Viúvo
                                </li>
                                @elseif(($c->estadocivil != null)&&($c->estadocivil =='5'))
                                <li>
                                    <strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>
                                    Separado
                                </li>
                                @else
                                <li>
                                    <strong> ESTADO CIVIL :&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;"> Não cadastrado!</span>
                                </li>
                                @endif
                                <br>

                                @foreach(Helper::getPai() as $pai)
                                @if($pai->idpais == $c->nacionalidade)
                                @if($c->nacionalidade != null)
                                <li>
                                    <strong> NACIONALIDADE:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$pai->nome}}
                                </li>
                                @else
                                <li>
                                    <strong> NACIONALIDADE:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;"> Não cadastrado!</span>
                                </li>
                                @endif
                                @endif
                                @endforeach
                                <br>

                                @if($c->naturalidade != null)
                                <li>
                                    <strong>
                                        NATURALIDADE:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCidade($c->naturalidade)}}
                                </li>
                                @else
                                <li>
                                    <strong> NATURALIDADE:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;"> Não cadastrado!</span>
                                </li>
                                @endif

                                <br>
                                @if(($c->dfisico != null) && ($c->dfisico == '1'))
                                <li>
                                    <strong> PESSOA COM DEFICIÊNCIA:&nbsp;&nbsp;&nbsp;</strong>
                                    Sim
                                </li>
                                @elseif(($c->dfisico != null) && ($c->dfisico == '2'))
                                <li>
                                    <strong> PESSOA COM DEFICIÊNCIA:&nbsp;&nbsp;&nbsp;</strong>
                                    Não
                                </li>
                                @else
                                <li>
                                    <strong> PESSOA COM DEFICIÊNCIA:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;"> Não cadastrado!</span>
                                </li>
                                @endif
                                <br>

                                <li>
                                    <strong> PRETENSÃO SALARIAL:&nbsp;&nbsp;&nbsp;</strong>
                                    {{Helper::getPretensao($c->pretsalarial)}},00
                                </li>

                                <br>
                                @if($c->nomemae != null)
                                <li>
                                    <strong> NOME DA MÃE:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->nomemae}}
                                </li>
                                @else
                                <li>
                                    <strong> NOME DA MÃE:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;"> Não cadastrado!</span>
                                </li>
                                @endif

                                <br>
                                @if($c->nomepai != null)
                                <li>
                                    <strong> NOME DO PAI:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->nomepai}}
                                </li>
                                @else
                                <li><strong> NOME DA PAI:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;"> Não cadastrado!</span>
                                </li>
                                @endif
                                <br>

                                @if ($c->sobre!=null)
                                <li style="word-break: break-word;">
                                    <strong> OBJETIVOS:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->sobre}}
                                </li>
                                @else
                                <li style="word-break: break-word;">
                                    <strong> OBJETIVOS:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color:red;">Não informado!</span>
                                </li>
                                @endif

                                <br>
                                <li>
                                    <strong>CATEGORIA DA CNH:&nbsp;&nbsp;&nbsp;</strong>
                                    @if($c->catcnh == null)
                                    <span style="color: red;"> Não informado!</span>
                                    @else
                                    {{$c->catcnh}}
                                    @endif

                                </li>
                                <br>
                                @if ($c->cnh!=null)
                                <li>
                                    <strong> NÚMERO DA CNH:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->cnh}}
                                </li>
                                @else
                                <li>
                                    <strong> NÚMERO DA CNH:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color:red;">Não Informado!</span>
                                </li>
                                @endif

                                <br>
                                @if ($c->ufcnh == null)
                                <li><strong> UF DA CNH:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;"> Não informado!</span>
                                </li>
                                @else
                                @foreach (Helper::getEstados() as $estados)
                                @if($estados->idestado == $c->ufcnh)
                                <li>
                                    <strong> UF DA CNH:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$estados->nome}}
                                </li>
                                @endif
                                @endforeach
                                @endif
                            </ul>
                            @endforeach
                            <!--------------------------------------------------------------------------------------------------------------->
                            <br>
                            <h4 style="margin-top: 50px; color: dodgerblue;"> ENDEREÇO </h4>
                            <hr>
                            @foreach($endereco as $e)

                            <ul style="list-style-type: none;">
                                <li>
                                    <strong>CEP:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$e->cep}}
                                </li>
                                <br>
                                <li>
                                    <strong> LOGRADOURO:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$e->logradouro}}
                                </li>
                                <br>
                                <li>
                                    <strong> BAIRRO:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$e->bairro}}
                                </li>
                                <br>
                                <li>
                                    <strong> NUMERO:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$e->numero}}
                                </li>
                                <br>
                                @if ($e->complemento != null)
                                <li>
                                    <strong> COMPLEMENTO:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$e->complemento}}
                                </li>
                                @else
                                <li>
                                    <strong> COMPLEMENTO:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;"> Não cadastrado!</span>
                                </li>
                                @endif
                                <br>
                                <li>
                                    <strong>
                                        ESTADO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getEstado($e->estado_idestado)}}
                                </li>
                                <br>
                                <li>
                                    <strong>
                                        CIDADE:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCidade($e->cidade_idcidade)}}
                                </li>
                                <br>
                                <li>
                                    <strong> PAÍS:&nbsp;&nbsp;&nbsp;</strong>
                                    {{Helper::getPais($e->pais_idpais)}}
                                </li>
                                <br>
                                <li>
                                    <strong> POSSUI DISPONIBILIDADE PARA MUDANÇA?
                                        &nbsp;&nbsp;&nbsp;</strong>{{$e->disp_mudanca == '1' ? 'Sim':'Não'}}
                                </li>
                            </ul>
                            @endforeach
                            <!------------------------------------------------------------------------------------------------------------------->
                            <br>
                            <h4 style="margin-top: 50px; color: dodgerblue;"> CURSOS </h4>
                            <hr>
                            @foreach($cursos as $c)
                            <div class="container">
                                <div class="row" style="margin-top: 25px;">
                                    <div class="col-sm">
                                        <ul class="item-ii" style="list-style-type: none; margin-right: auto;">
                                            <li class="item-11">
                                                <strong> NOME DO CURSO:&nbsp;&nbsp;&nbsp;</strong>
                                                {{$c->nome}}
                                            </li>
                                            <br>
                                            @if ($c->escolaridade == '2')
                                            <li class="item-2">
                                                <strong>
                                                    CATEGORIA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCategoria($c->categoria_idcategoria)}}
                                            </li>
                                            <br>
                                            @endif
                                            <!-- Se a escolaridade for 1 -->
                                            @if ($c->escolaridade == '1')
                                            <!-- E se os niveis forem superior (graduação, pos graduação, mestrado, doutorado)                                              
                                                -->
                                            <?php $vetorniveisSsuperior=array("7","8","9","10","11","12","13","14"); 
                                                ?>
                                            @foreach ($vetorniveisSsuperior as $niveis)
                                            @if($c->nivel_idnivel == $niveis)
                                            @if ($c->instituicao_idinstituicao != null)
                                            <li class="item-2">
                                                <strong> INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>
                                                {{Helper::getInstituicoesId($c->instituicao_idinstituicao)}}
                                            </li>
                                            <br>
                                            @else
                                            <li class="item-2">
                                                <strong> INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>
                                                <span style="color: red;">Não informado</span>
                                            </li>
                                            <br>
                                            @endif
                                            @endif
                                            @endforeach
                                            <!-- Ou se os niveis forem  (medio, tecnico, fundamental) -->
                                            <?php 
                                                    $vetorniveisNsuperior=array("1","2","3","4","5","6");
                                                ?>
                                            @foreach ($vetorniveisNsuperior as $niveis)
                                            @if($c->nivel_idnivel == $niveis)
                                            <li class="item-2">
                                                <strong> ESCOLA:&nbsp;&nbsp;&nbsp;</strong>{{$c->escola}}
                                            </li>
                                            <br>
                                            @endif
                                            @endforeach
                                            @else
                                            <!-- Se a escolaridade for 2 e os niveis forem -->
                                            @if ($c->escola != null)
                                            <li class="item-2">
                                                <strong> INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>
                                                {{$c->escola}}
                                            </li>
                                            <br>
                                            @else
                                            <li class="item-2">
                                                <strong> INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>
                                                <span style="color: red;">Não informado</span>
                                            </li>
                                            <br>
                                            @endif
                                            @endif

                                            @if($c->escolaridade == '1')
                                            <li class="item-2"><strong> NÍVEL:&nbsp;&nbsp;&nbsp;</strong>
                                                {{Helper::getNivel($c->nivel_idnivel)}}
                                            </li>
                                            <br>
                                            <!-- se area for diferente de Null, quer dizer que estamos falando de um nivel superior ou seja,  diferente do ensino medio, fundamental, tecnico... -->
                                            @if($c->area_idarea !=null)
                                            <li class="item-2">
                                                <strong> ÁREA:&nbsp;&nbsp;&nbsp;</strong>
                                                {{Helper::getArea($c->area_idarea)}}
                                            </li>
                                            <br>
                                            @endif
                                            <!-- se a escolaridade for 1 e os niveis forem superiores (graduação, pos graduação, mestrado e doutorado) -->
                                            <?php 
                                                        $vetorniveisSsuperior=array("7","8","9","10","11","12","13","14");
                                                    ?>
                                            @foreach ($vetorniveisSsuperior as $niveis)
                                            @if($c->nivel_idnivel == $niveis)
                                            @if ($c->periodo != null)
                                            <li class="item-2">
                                                <strong> PERÍODO:&nbsp;&nbsp;&nbsp;</strong>{{$c->periodo}}
                                            </li>
                                            <br>
                                            @else
                                            <li class="item-2">
                                                <strong> PERÍODO:&nbsp;&nbsp;&nbsp;</strong>
                                                <span style="color: red;">Não informado!</span>
                                            </li>
                                            <br>
                                            @endif
                                            @endif
                                            @endforeach
                                            @endif

                                            <li class="item-2">
                                                <strong> DATA DE
                                                    INÍCIO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($c->dtinicio)}}
                                            </li>
                                            <br>

                                            @if($c->dtfim == null)
                                            <li class="item-2">
                                                <strong> DATA DE CONCLUSÃO:&nbsp;&nbsp;&nbsp;</strong>
                                                <span style="color: red;">Não concluído!</span>
                                            </li>
                                            @else
                                            <li class="item-2">
                                                <strong> DATA DE
                                                    CONCLUSÃO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($c->dtfim)}}
                                            </li>
                                            @endif
                                            <br>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!------------------------------------------------------------------------------------------------------------------->

                            <h4 style="margin-top: 50px; color: dodgerblue;"> EXPERIÊNCIAS </h4>
                            <hr>
                            @foreach($experiencia as $e)
                            <div class="container">
                                <div class="row" style="margin-top: 25px;">
                                    <div class="col-sm">
                                        <ul style="list-style-type: none; margin-right: auto;">
                                            <li>
                                                <strong> EMPRESA:&nbsp;&nbsp;&nbsp;</strong>
                                                {{$e->empresa}}
                                            </li>
                                            <br>
                                            <li>
                                                <strong> CARGO&nbsp;&nbsp;&nbsp;</strong>
                                                {{$e->cargo}}
                                            </li>
                                            <br>
                                            <li>
                                                <strong> DATA DE INÍCIO:&nbsp;&nbsp;&nbsp;</strong>
                                                {{Helper::getData($e->dtinicio)}}
                                            </li>
                                            <br>
                                            @if ($e->dtfim != null)
                                            <li>
                                                <strong> DATA DE
                                                    SAÍDA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($e->dtfim)}}
                                            </li>
                                            @else
                                            <li>
                                                <strong> DATA DE SAÍDA:&nbsp;&nbsp;&nbsp;</strong>
                                                <span style="color:red;"> Trabalha nesta
                                                    empresa atualmente</span>
                                            </li>
                                            @endif
                                            <br>
                                            @if ($e->atividades != null)
                                            <li style="word-break: break-word;">
                                                <strong> DESCRIÇÃO DAS ATIVIDADES:&nbsp;&nbsp;&nbsp; </strong>
                                                {{$e->atividades}}
                                            </li>
                                            @else
                                            <li style="word-break: break-word;">
                                                <strong> DESCRIÇÃO DAS ATIVIDADES:&nbsp;&nbsp;&nbsp;</strong>
                                                <span style="color: red;">Não Informado</span>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!------------------------------------------------------------------------------------------------------------------>

                            <h4 style="margin-top: 50px; color: dodgerblue;"> HABILIDADES </h4>
                            <hr>
                            @foreach($habilidades as $i)
                            <div class="container">
                                <div class="row" style="margin-top: 25px;">
                                    <div class="col-sm">
                                        <ul style="list-style-type: none; margin-right: auto;">
                                            <li>
                                                <strong>
                                                    CATEGORIA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getTipoHab($i->tipo_idtipo)}}
                                            </li>
                                            <br>
                                            <li>
                                                <strong> DESCRIÇÃO:&nbsp;&nbsp;&nbsp;</strong>
                                                {{$i->nome}}
                                            </li>
                                            <br>
                                            <li>
                                                <strong>NÍVEL:&nbsp;&nbsp;&nbsp;</strong>
                                                @switch($i->nivel)
                                                @case(1)
                                                Básico
                                                @break
                                                @case(2)
                                                Intermediário
                                                @break
                                                @case(3)
                                                Avançado
                                                @break
                                                @default
                                                -
                                                @endswitch
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach

        <!---------------------------------------------------------------------------------------------------->
                            <h4 style="margin-top: 50px; color: dodgerblue;"> REDES SOCIAIS</h4>
                            <hr>

                            @foreach($redes as $rs)
                              <div class="container">
                                <div class="row" style="margin-top: 25px;">
                                  <div class="col-sm">                                    
                                    <ul style="list-style-type: none; margin-right: auto;">
                                      <li>
                                        <strong>{{Helper::getRedeCurriculo($rs->redesocial_idredesocial)}}:&nbsp;&nbsp;&nbsp;
                                        </strong>
                                        @if($rs->link == null)
                                        <span style="color: red;">Não informado!</span>
                                        @else
                                        {{$rs->link}}
                                        @endif
                                      </li>                                      
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </div>
    <!------------------------------------------------------------------------------------------------------>
    @if(count($curriculovaga)>0)
    <h4 style="margin-top: 50px; color: dodgerblue; text-align: center;"> HISTORICO DO CANDIDATO </h4>

    <div class="row">
        <div class="col-sm">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Candidaturas</th>
                            <th>Status da Vaga</th>
                            <th>Obs</th>
                            <th>Data da Candiatura</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($curriculovaga as $processo)
                        <tr>
                            <td>
                                {{Helper::getvagatitulo($processo->vaga_idvaga)}}
                            </td>
                            <td>
                                {{Helper::getStatusCandidatura($processo->status)}}
                            </td>
                            @if ($processo->obs != '')
                            <td>{{$processo->obs}}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>
                                {{Helper::getData($processo->dtcandidatura)}}
                            </td>
                            <td>
                                <a class="badge badge-info badge-sm" href="/detalhes/{{$processo->vaga_idvaga}}"
                                    role="button">Visualizar Vaga</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @endif
</div>






@endsection