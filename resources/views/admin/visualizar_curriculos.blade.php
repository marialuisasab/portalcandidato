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

        <div class="col-xs-1 col-md-1">


        </div>

        <div class="col-xs-10 col-md-10">

            <div id="accordion" style="margin-top: 40px;">
                <div class="card-border-light">
                    <div class="card-header" id="headingOne" style="background-color: white;">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <h2 class="mb-0" style="color:dodgerblue; font-size:25px; text-align: center;">
                                        CURRICULO
                                        <span class="fa-stack fa-sm">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-file-alt fa-stack-1x fa-inverse"></i>
                                        </span>

                                    </h2>
                                </div>
                                <div class="col-sm">


                                </div>

                            </div>
                        </div>





                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body" style="box-sizing: border-box;">
                            <h4 style="margin-top: 50px; color: dodgerblue;"> DADOS PESSOAIS
                            </h4>
                            <hr>
                            @foreach($users as $candDados)
                            @foreach ($curriculos as $c)

                            @if ($c->users_id == $candDados ->id)
                            <a class="badge badge-info badge-sm" style="text-align: center; margin-left: auto;"
                                href="{{route('Curriculo.Impressao',$c->idcurriculo)}}">Gerar
                                PDF</a>
                            <ul style="list-style-type: none;">

                                @if($candDados->foto != null)
                                <h2> <img src="{{url('/fotos/'.$candDados->foto)}}" alt="{{$candDados->name}}"
                                        style="max-width: 120px; border-radius: 50%;">
                                </h2>
                                @else
                                <h2> <img class="profile-user-img img-responsive img-circle"
                                        src="/img/imagemuserPadrao.jpg" alt="Usuário sem foto" style="color: red;">
                                </h2>
                                <p></p>
                                @endif
                                <hr>



                                <li><strong> NOME:&nbsp;&nbsp;&nbsp;</strong>{{$candDados->name}}
                                </li>
                                <hr>


                                <li><strong> CPF:&nbsp;&nbsp;&nbsp;</strong> {{$c->cpf}}</li>
                                <hr>


                                <li><strong> CARTEIRA DE IDENTIFICAÇÃO(RG):&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->rg}}</li>
                                <hr>

                                @if ($c->ctps!= null)
                                <li><strong> CARTEIRA DE TRABALHO(CTPS):&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->ctps}}</li>
                                @else
                                <li><strong> CARTEIRA DE TRABALHO(CTPS):&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;"> Não Informado</span></li>
                                @endif

                                <hr>


                                <li><strong> DATA DE
                                        NASCIMENTO:&nbsp;&nbsp;&nbsp;</strong>{{date_format(new DateTime($c->dtnascimento), 'd/m/Y')}}
                                </li>
                                <hr>


                                <li><strong> TELEFONE(PRINCIPAL):&nbsp;&nbsp;&nbsp;</strong> {{$c->telefone1}}
                                </li>
                                <hr>


                                @if ($c ->telefone2 != null)
                                <li><strong> TELEFONE(2ºOPÇÃO):&nbsp;&nbsp;&nbsp;</strong> {{$c->telefone2}}
                                </li>
                                @else
                                <li><strong> TELEFONE(2ºOPÇÃO):&nbsp;&nbsp;&nbsp;</strong> <span style="color: red;">
                                        Não Informado!</span>
                                </li>
                                @endif
                                <hr>


                                <li><strong> EMAIL:&nbsp;&nbsp;&nbsp;</strong> {{$candDados->email}}</li>
                                <hr>


                                @if(($c->genero != null)&& ($c->genero =='M'))
                                <li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong>Masculino</li>
                                @elseif(($c->genero != null)&& ($c->genero =='F'))
                                <li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong>Feminino</li>
                                @else
                                <li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
                                        cadastrado!</span></li>
                                @endif
                                <hr>


                                @if(($c->estadocivil != null)&&($c->estadocivil =='1'))
                                <li><strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>Solteiro</li>
                                @elseif(($c->estadocivil != null)&&($c->estadocivil =='2'))
                                <li><strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>Casado</li>
                                @elseif(($c->estadocivil != null)&&($c->estadocivil =='3'))
                                <li><strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>Divorciado</li>
                                @elseif(($c->estadocivil != null)&&($c->estadocivil =='4'))
                                <li><strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>Viúvo</li>
                                @elseif(($c->estadocivil != null)&&($c->estadocivil =='5'))
                                <li><strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>Separado</li>
                                @else
                                <li><strong> ESTADO CIVIL :&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
                                        cadastrado!</span></li>
                                @endif
                                <hr>

                                @foreach(Helper::getPai() as $pai)
                                @if($pai->idpais == $c->nacionalidade)
                                @if($c->nacionalidade != null)
                                <li><strong> NACIONALIDADE:&nbsp;&nbsp;&nbsp;</strong>{{$pai->nome}}</li>
                                @else
                                <li><strong> NACIONALIDADE:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
                                        Informado!</span></li>
                                @endif
                                @else
                                @endif
                                @endforeach
                                <hr>




                                @if($c->naturalidade != null)
                                <li><strong>
                                        NATURALIDADE:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCidade($c->naturalidade)}}
                                </li>
                                @else
                                <li><strong> NATURALIDADE:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
                                        cadastrado!</span></li>
                                @endif

                                <hr>



                                @if(($c->dfisico != null) && ($c->dfisico == '1'))
                                <li><strong> PESSOA COM DEFICIÊNCIA:&nbsp;&nbsp;&nbsp;</strong> Sim</li>
                                @elseif(($c->dfisico != null) && ($c->dfisico == '2'))
                                <li><strong> PESSOA COM DEFICIÊNCIA:&nbsp;&nbsp;&nbsp;</strong> Não</li>
                                @else
                                <li><strong> PESSOA COM DEFICIÊNCIA:&nbsp;&nbsp;&nbsp;</strong><span
                                        style="color: red;"> Não
                                        cadastrado!</span></li>
                                @endif
                                <hr>




                                <li><strong> PRETENÇÃO SALARIAL:&nbsp;&nbsp;&nbsp;</strong>
                                    {{Helper::getPretensao($c->pretsalarial)}},00</li>
                                <hr>




                                @if($c->nomemae != null)
                                <li><strong> NOME DA MÃE:&nbsp;&nbsp;&nbsp;</strong> {{$c->nomemae}}</li>
                                @else
                                <li><strong> NOME DA MÃE:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
                                        cadastrado!</span></li>
                                @endif
                                <hr>


                                @if($c->nomepai != null)
                                <li><strong> NOME DO PAI:&nbsp;&nbsp;&nbsp;</strong> {{$c->nomepai}}</li>
                                @else
                                <li><strong> NOME DA PAI:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
                                        Informado!</span></li>
                                @endif
                                <hr>

                                @if ($c->sobre!=null)
                                <li style="word-break: break-word;"><strong> OBJETIVOS:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->sobre}}</li>
                                @else
                                <li style="word-break: break-word;"><strong> OBJETIVOS:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color:red;">Não informado!</span></li>
                                @endif
                                <hr>


                                <li><strong>CATEGORIA DA CNH:&nbsp;&nbsp;&nbsp;</strong>
                                    @if($c->catcnh == null)
                                    <span style="color: red;"> Não informado!</span>
                                    @else
                                    {{$c->catcnh}}
                                    @endif

                                    <hr>


                                    @if ($c->cnh!=null)
                                <li><strong> CARTEIRA DE HABILITAÇÃO (Nº CNH):&nbsp;&nbsp;&nbsp;</strong>
                                    {{$c->cnh}}</li>
                                @else
                                <li><strong> CARTEIRA DE HABILITAÇÃO (Nº CNH):&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color:red;">Não Informado!</span></li>
                                @endif
                                <hr>


                                @if ($c->ufcnh == null)
                                <li><strong> UF DA CNH:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
                                        informado!</span></li>
                                @else
                                @foreach (Helper::getEstados() as $estados)
                                @if($estados->idestado == $c->ufcnh)
                                <li><strong> UF DA CNH:&nbsp;&nbsp;&nbsp;</strong>{{$estados->nome}}</li>
                                @else
                                @endif
                                @endforeach
                                @endif
                            </ul>

                            @else

                            @endif
                            @endforeach
                            @endforeach
                            <hr>
                            <h4 style="margin-top: 50px; color: dodgerblue;"> ENDEREÇO
                            </h4>
                            <hr>

                            {{-- endereco do candidato --}}
                            @foreach($endereco as $e)
                            @foreach ($curriculos as $c)
                            @if ($c->endereco_idendereco == $e->idendereco)
                            <ul style="list-style-type: none;">
                                <li><strong>CEP:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$e->cep}}</li>
                                <hr>


                                <li><strong> LOGRADOURO:&nbsp;&nbsp;&nbsp;</strong> {{$e->logradouro}}
                                </li>
                                <hr>


                                <li><strong> BAIRRO:&nbsp;&nbsp;&nbsp;</strong> {{$e->bairro}}
                                </li>
                                <hr>


                                <li><strong> NUMERO:&nbsp;&nbsp;&nbsp;</strong> {{$e->numero}}</li>
                                <hr>



                                @if ($e->complemento != null)
                                <li><strong> COMPLEMENTO:&nbsp;&nbsp;&nbsp;</strong>{{$e->complemento}}
                                </li>
                                @else
                                <li><strong> COMPLEMENTO:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
                                        Informado!</span>
                                </li>
                                @endif
                                <hr>

                                <li><strong>
                                        ESTADO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getEstado($e->estado_idestado)}}
                                </li>
                                <hr>

                                <li><strong>
                                        CIDADE:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCidade($e->cidade_idcidade)}}
                                </li>
                                <hr>

                                <li><strong> PAÍS:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getPais($e->pais_idpais)}}
                                </li>
                                <hr>

                                <li><strong> DISPONIBILIDADE DE
                                        MUDANÇA:&nbsp;&nbsp;&nbsp;</strong>{{$e->disp_mudanca == '1' ? 'Sim':'Não'}}
                                </li>
                                <hr>
                            </ul>
                            @else
                            @endif
                            @endforeach
                            @endforeach






                            <h4 style="margin-top: 50px; color: dodgerblue;"> CURSOS
                            </h4>
                            <hr>
                            {{-- cursos feitos pelo candidato --}}
                            @foreach($cursos as $c)

                            <div class="container">

                                <div class="row" style="margin-top: 25px;">
                                    <div class="col-sm">
                                        <ul></ul>
                                        <ul class="item-ii" style="list-style-type: none; margin-right: auto;">
                                            <li class="item-11"><strong> NOME DO CURSO:&nbsp;&nbsp;&nbsp;</strong>
                                                {{$c->nome}}
                                            </li>
                                            <hr>


                                            @if ($c->escolaridade == '2')
                                            <li class="item-2"><strong>
                                                    CATEGORIA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCategoria($c->categoria_idcategoria)}}
                                            </li>
                                            <hr>
                                            @else
                                            @endif



                                            {{-- se a escolaridade for 1 --}}
                                            @if ($c->escolaridade == '1')
                                            {{-- se a escolaridade for 1 e os niveis forem superior (graduação, pos graduação, mestrado, doutorado) --}}
                                            <?php 
                           $vetorniveisSsuperior=array("7","8","9","10","11","12","13","14");
                            ?>
                                            @foreach ($vetorniveisSsuperior as $niveis)
                                            @if($c->nivel_idnivel == $niveis)
                                            @if ($c->instituicao_idinstituicao != null)
                                            <li class="item-2"><strong>
                                                    INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>{{Helper::getInstituicoesId($c->instituicao_idinstituicao)}}
                                            </li>
                                            <hr>
                                            @else
                                            <li class="item-2"><strong>
                                                    INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong><span style="color: red;">Não
                                                    informado</span>
                                            </li>
                                            <hr>
                                            @endif
                                            @else
                                            @endif
                                            @endforeach


                                            {{-- se a escolaridade for 1 e os niveis forem  (medio, tecnico, fundamental) --}}
                                            <?php 
                                                $vetorniveisNsuperior=array("1","2","3","4","5","6");
                                                 ?>
                                            @foreach ($vetorniveisNsuperior as $niveis)
                                            @if($c->nivel_idnivel == $niveis)
                                            <li class="item-2"><strong> ESCOLA:&nbsp;&nbsp;&nbsp;</strong>{{$c->escola}}
                                            </li>
                                            <hr>
                                            @else
                                            @endif
                                            @endforeach


                                            @else

                                            {{-- se a escolaridade for 2 e os niveis forem --}}
                                            @if ($c->escola != null)
                                            <li class="item-2"><strong>
                                                    INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>{{$c->escola}}
                                            </li>
                                            <hr>
                                            @else
                                            <li class="item-2"><strong>
                                                    INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong><span style="color: red;">Não
                                                    informado</span>
                                            </li>
                                            <hr>
                                            @endif
                                            @endif


                                            @if($c->escolaridade == '1')
                                            <li class="item-2"><strong> NIVEL:&nbsp;&nbsp;&nbsp;</strong>
                                                {{Helper::getNivel($c->nivel_idnivel)}}
                                            </li>
                                            <hr>

                                            {{-- se area for diferente de Null, quer dizer que estamos falando de um nivel superior ou seja,  diferente
                          do ensino medio, fundamental, tecnico... --}}
                                            @if($c->area_idarea !=null)
                                            <li class="item-2"><strong> AREA:&nbsp;&nbsp;&nbsp;</strong>
                                                {{Helper::getArea($c->area_idarea)}}
                                            </li>
                                            <hr>
                                            @else
                                            @endif



                                            {{-- se a escolaridade for 1 e os niveis forem superiores (graduação, pos graduação, mestrado e doutorado) --}}
                                            <?php 
                           $vetorniveisSsuperior=array("7","8","9","10","11","12","13","14");
                          ?>
                                            @foreach ($vetorniveisSsuperior as $niveis)
                                            @if($c->nivel_idnivel == $niveis)
                                            @if ($c->periodo != null)
                                            <li class="item-2"><strong>
                                                    PERÍODO:&nbsp;&nbsp;&nbsp;</strong>{{$c->periodo}}
                                            </li>
                                            <hr>
                                            @else
                                            <li class="item-2"><strong> PERÍODO:&nbsp;&nbsp;&nbsp;</strong> <span
                                                    style="color: red;">Não
                                                    Informado!</span>
                                            </li>
                                            <hr>
                                            @endif
                                            @else
                                            @endif
                                            @endforeach



                                            @else
                                            @endif





                                            <li class="item-2"><strong>
                                                    DATA DE
                                                    INÍCIO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($c->dtinicio)}}
                                            </li>
                                            <hr>

                                            @if($c->dtfim == null)
                                            <li class="item-2"><strong> DATA DE CONCLUSÃO:&nbsp;&nbsp;&nbsp;</strong>
                                                <span style="color: red;">Não
                                                    Concluido!</span>
                                            </li>
                                            @else
                                            <li class="item-2"><strong> DATA DE
                                                    CONCLUSÃO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($c->dtfim)}}
                                            </li>
                                            @endif


                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <hr>
                            <h4 style="margin-top: 50px; color: dodgerblue;"> EXPERIÊNCIAS
                            </h4>
                            <hr>

                            {{-- experiencias do usuario --}}
                            @foreach($experiencia as $e)
                            <div class="container">
                                <div class="row" style="margin-top: 25px;">

                                    <div class="col-sm">
                                        <ul></ul>

                                        <ul style="list-style-type: none; margin-right: auto;">


                                            <li><strong> EMPRESA:&nbsp;&nbsp;&nbsp;</strong> {{$e->empresa}}
                                            </li>
                                            <hr>

                                            <li><strong> CARGO&nbsp;&nbsp;&nbsp;</strong>{{$e->cargo}}</li>
                                            <hr>


                                            <li><strong> DATA DE INÍCIO:&nbsp;&nbsp;&nbsp;</strong>
                                                {{Helper::getData($e->dtinicio)}}
                                            </li>
                                            <hr>


                                            @if ($e->dtfim != null)
                                            <li><strong> DATA DE
                                                    SAÍDA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($e->dtfim)}}
                                            </li>
                                            @else
                                            <li><strong> DATA DE SAÍDA:&nbsp;&nbsp;&nbsp;</strong> <span
                                                    style="color:red;">
                                                    Trabalho nesta
                                                    empresa atualmente!</span></li>
                                            @endif

                                            <hr>


                                            @if ($e->atividades != null)
                                            <li style="word-break: break-word;"><strong>DESCRIÇÃO DAS
                                                    ATIVIDADES:&nbsp;&nbsp;&nbsp;
                                                </strong>{{$e->atividades}}
                                            </li>
                                            @else
                                            <li style="word-break: break-word;"><strong>DESCRIÇÃO DAS
                                                    ATIVIDADES:&nbsp;&nbsp;&nbsp;</strong>
                                                <span style="color: red;">Não Informado</span>
                                            </li>
                                            @endif

                                        </ul>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <hr>
                            <h4 style="margin-top: 50px; color: dodgerblue;"> HABILIDADES
                            </h4>
                            <hr>


                            {{-- Hanilidades do Candidato --}}
                            @foreach($habilidades as $i)
                            <div class="container">
                                <div class="row" style="margin-top: 25px;">
                                    <div class="col-sm">
                                        <ul></ul>
                                        <ul style="list-style-type: none; margin-right: auto;">
                                            <li><strong>
                                                    CATEGORIA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getTipoHab($i->tipo_idtipo)}}
                                            </li>
                                            <hr>
                                            <li><strong> DESCRIÇÃO:&nbsp;&nbsp;&nbsp;</strong>{{$i->nome}}</li>
                                            <hr>
                                            <li><strong>NÍVEL:&nbsp;&nbsp;&nbsp;</strong>
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
                                                Default case...
                                                @endswitch
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

        <div class="col-xs-1 col-md-1">


        </div>

    </div>

    <h4 style="margin-top: 50px; color: dodgerblue; text-align: center;"> HISTORICO DO CANDIDATO
    </h4>

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

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($curriculovaga as $curri)
                        @if ($curri !=null)
                        <tr>
                            <td>{{Helper::getvagatitulo($curri->vaga_idvaga)}}
                            </td>
                            <td>{{Helper::getStatusVaga($curri->status)}}</td>
                            @if ($curri->obs != '')
                            <td>{{$curri->obs}}</td>
                            @else
                            <td style="color:red"><strong>Sem Obervações</strong> </td>
                            @endif
                            <td>{{$curri->dtcandidatura}}
                            </td>
                            <td> <a class="badge badge-info badge-sm" href="/detalhes/{{$curri->vaga_idvaga}}"
                                    role="button">Visualizar Vaga</a>
                            </td>
                        </tr>
                        @else

                        <tr>
                            <td>
                                Não temos dados
                            </td>
                        </tr>

                        @endif


                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>






@endsection