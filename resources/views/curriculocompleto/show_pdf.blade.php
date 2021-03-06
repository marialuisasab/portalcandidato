<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curriculo do Candidato</title>
    <link rel="stylesheet" href="css/pdfcurriculo.css">

</head>

<body>

    <div class="container">
        <div class="row">

            <div class="col-xs-10 col-md-10">
                <div id="accordion">
                    <div class="card-border-light">
                        <div class="card-header" id="headingOne" style="background-color: white;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <h2 class="mb-0" style="color:dodgerblue; font-size:25px; text-align: center;">
                                            CURRÍCULO
                                        </h2>
                                    </div>
                                    <div class="col-sm"></div>
                                </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body" style="box-sizing: border-box;">
                                <br>
                                @foreach($users as $c)

                                <div class="col" style="text-align: center;">
                                    <div class="row">
                                        @if($c->foto != null)
                                        <img src="{{url('/fotos/'.$c->foto)}}" alt="{{$c->name}}"
                                            style="max-width: 120px; border-radius: 50%;">
                                        @else
                                        <img class="profile-user-img img-responsive img-circle"
                                            src="{{url('img/usuariopadrao.png')}}" alt="Sem foto"
                                            style="color: red;">
                                        @endif
                                    </div>
                                    <div class="row">
                                        Data do cadastro: {{Helper::getData($c->dtcadastro)}}
                                    </div>
                                    <div class="row">
                                        Última atualização: {{Helper::getData($c->dtatualizacao)}}
                                    </div>
                                </div>

                                <h4 style="margin-top: 50px; color: dodgerblue;"> DADOS PESSOAIS </h4>
                                <hr>

                                <ul style="list-style-type: none;">
                                    <li>
                                        <strong> NOME:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->name}}
                                    </li>
                                    <li>
                                        <strong> CPF:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->cpf}}
                                    </li>
                                    <li>
                                        <strong>RG:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->rg}}
                                    </li>
                                    @if ($c->ctps!= null)
                                    <li><strong>CARTEIRA DE TRABALHO:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->ctps}}
                                    </li>
                                    @else
                                    <li><strong>CARTEIRA DE TRABALHO:&nbsp;&nbsp;&nbsp;</strong>
                                        <span style="color: red;"> Não informado!</span>
                                    </li>
                                    @endif
                                    <li>
                                        <strong> DATA DE NASCIMENTO:&nbsp;&nbsp;&nbsp;</strong>
                                        {{Helper::getData($c->dtnascimento)}}
                                    </li>
                                    <li>
                                        <strong> IDADE:&nbsp;&nbsp;&nbsp;</strong>
                                        {{Helper::getIdade($c->dtnascimento)}}
                                    </li>
                                    <li>
                                        <strong> TELEFONE 1:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->telefone1}}
                                    </li>
                                    @if($c->telefone2 != null)
                                    <li>
                                        <strong> TELEFONE 2:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->telefone2}}
                                    </li>
                                    @endif
                                    <li>
                                        <strong> EMAIL:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->email}}
                                    </li>
                                    @if(($c->genero != null)&& ($c->genero =='M'))
                                    <li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong>
                                        Masculino
                                    </li>
                                    @elseif(($c->genero != null)&& ($c->genero =='F'))
                                    <li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong>
                                        Feminino
                                    </li>
                                    @else
                                    <li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong>
                                        Prefere não informar
                                    </li>
                                    @endif

                                    <li>
                                        <strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>
                                        @if($c->estadocivil != null)
                                        @if($c->estadocivil =='1')
                                        Solteiro(a)
                                        @elseif($c->estadocivil =='2')
                                        Casado(a)
                                        @elseif($c->estadocivil =='3')
                                        Divorciado(a)
                                        @elseif($c->estadocivil =='4')
                                        Viúvo(a)
                                        @elseif($c->estadocivil =='5')
                                        Separado(a)
                                        @endif
                                        @else
                                        <span style="color: red;"> Não cadastrado!</span>
                                        @endif
                                    </li>

                                    @foreach(Helper::getPai() as $pai)
                                    @if($pai->idpais == $c->nacionalidade)
                                    @if($c->nacionalidade != null)
                                    <li><strong> NACIONALIDADE:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$pai->nome}}
                                    </li>
                                    @endif
                                    @endif
                                    @endforeach

                                    <li>
                                        <strong>
                                            NATURALIDADE:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCidade($c->naturalidade)}}
                                    </li>

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
                                    @endif

                                    <li>
                                        <strong> PRETENSÃO SALARIAL:&nbsp;&nbsp;&nbsp;</strong>
                                        {{Helper::getPretensao($c->pretsalarial)}},00
                                    </li>

                                    <li>
                                        <strong> NOME DA MÃE:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->nomemae}}
                                    </li>

                                    @if($c->nomepai != null)
                                    <li>
                                        <strong> NOME DO PAI:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->nomepai}}
                                    </li>
                                    @else
                                    <li>
                                        <strong> NOME DA PAI:&nbsp;&nbsp;&nbsp;</strong>
                                        <span style="color: red;"> Não informado!</span>
                                    </li>
                                    @endif

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
                                    <li>
                                        <strong>CATEGORIA DA CARTEIRA DE HABILITAÇÃO:&nbsp;&nbsp;&nbsp;</strong>
                                        @if($c->catcnh == null)
                                        <span style="color: red;"> Não informado!</span>
                                        @else
                                        {{$c->catcnh}}
                                        @endif
                                    </li>
                                    @if ($c->cnh!=null)
                                    <li>
                                        <strong> NÚMERO DA CARTEIRA DE HABILITAÇÃO:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->cnh}}
                                    </li>
                                    @else
                                    <li>
                                        <strong> NÚMERO DA CARTEIRA DE HABILITAÇÃO:&nbsp;&nbsp;&nbsp;</strong>
                                        <span style="color:red;">Não informado!</span>
                                    </li>
                                    @endif
                                    @if ($c->ufcnh == null)
                                    <li>
                                        <strong> ESTADO DE ORIGEM DA CARTEIRA DE HABILITAÇÃO:&nbsp;&nbsp;&nbsp;</strong>
                                        <span style="color: red;">Não informado!</span>
                                    </li>
                                    @else
                                    @foreach (Helper::getEstados() as $estados)
                                    @if($estados->idestado == $c->ufcnh)
                                    <li>
                                        <strong> UF DA CNH:&nbsp;&nbsp;&nbsp;</strong>{{$estados->nome}}
                                    </li>
                                    @endif
                                    @endforeach
                                    @endif
                                </ul>
                                @endforeach
                                <!------------------------------------------------------------------------------------------------------------------->

                                @if ($endereco->count())
                                <h4 style="color: dodgerblue;"> ENDEREÇO </h4>
                                <hr>
                                @endif


                                @foreach ($endereco as $e)
                                <ul style="list-style-type: none;">
                                    <li>
                                        <strong>CEP:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$e->cep}}
                                    </li>
                                    <li>
                                        <strong> LOGRADOURO:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$e->logradouro}}
                                    </li>
                                    <li>
                                        <strong> BAIRRO:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$e->bairro}}
                                    </li>
                                    <li>
                                        <strong> NÚMERO:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$e->numero}}
                                    </li>
                                    @if ($e->complemento != null)
                                    <li>
                                        <strong> COMPLEMENTO:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$e->complemento}}
                                    </li>
                                    @endif
                                    <li>
                                        <strong>
                                            ESTADO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getEstado($e->estado_idestado)}}
                                    </li>
                                    <li>
                                        <strong>
                                            CIDADE:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCidade($e->cidade_idcidade)}}
                                    </li>
                                    <li>
                                        <strong> PAÍS:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getPais($e->pais_idpais)}}
                                    </li>
                                    <li>
                                        <strong> DISPONIBILIDADE DE
                                            MUDANÇA:&nbsp;&nbsp;&nbsp;</strong>{{$e->disp_mudanca == '1' ? 'Sim':'Não'}}
                                    </li>
                                </ul>
                                @endforeach
                                <!---------------------------------------------------------------------------------------------------------------->
                                @if ($cursos->count())
                                <h4 style="color: dodgerblue;"> FORMAÇÃO/CURSOS </h4>
                                <hr>
                                @endif

                                @foreach($cursos as $c)
                                <ul style="list-style-type: none;">
                                    <li class="item-11">
                                        <strong> NOME DO CURSO:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->nome}}
                                    </li>
                                    @if ($c->escolaridade == '2')
                                    <li class="item-2">
                                        <strong>
                                            CATEGORIA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCategoria($c->categoria_idcategoria)}}
                                    </li>
                                    @endif
                                    <!--se a escolaridade for 1 -->
                                    @if ($c->escolaridade == '1')
                                    <!-- se a escolaridade for 1 e os niveis forem superior (graduação, pos graduação, mestrado, doutorado) -->
                                    <?php 
                                                $vetorniveisSsuperior=array("7","8","9","10","11","12","13","14");
                                            ?>
                                    @foreach ($vetorniveisSsuperior as $niveis)
                                    @if($c->nivel_idnivel == $niveis)
                                    @if ($c->instituicao_idinstituicao != null)
                                    <li class="item-2">
                                        <strong> INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>
                                        {{Helper::getInstituicoesId($c->instituicao_idinstituicao)}}
                                    </li>

                                    @else
                                    <li class="item-2">
                                        <strong> INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>
                                        <span style="color: red;">Não informado</span>
                                    </li>

                                    @endif
                                    @endif
                                    @endforeach
                                    <!-- se a escolaridade for 1 e os niveis forem  (medio, tecnico, fundamental) -->
                                    <?php 
                                                $vetorniveisNsuperior=array("1","2","3","4","5","6");
                                            ?>
                                    @foreach ($vetorniveisNsuperior as $niveis)
                                    @if($c->nivel_idnivel == $niveis)
                                    <li class="item-2">
                                        <strong> ESCOLA:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->escola}}
                                    </li>
                                    @endif
                                    @endforeach
                                    @else
                                    <!-- se a escolaridade for 2 e os niveis forem -->
                                    @if ($c->escola != null)
                                    <li class="item-2">
                                        <strong> INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->escola}}
                                    </li>
                                    @else
                                    <li class="item-2">
                                        <strong> INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>
                                        <span style="color: red;">Não informado!</span>
                                    </li>
                                    @endif
                                    @endif
                                    @if($c->escolaridade == '1')
                                    <li class="item-2">
                                        <strong> NÍVEL:&nbsp;&nbsp;&nbsp;</strong>
                                        {{Helper::getNivel($c->nivel_idnivel)}}
                                    </li>
                                    <!-- se area for diferente de Null, quer dizer que estamos falando de um nivel superior ou seja,  diferente do ensino medio, fundamental, tecnico... -->
                                    @if($c->area_idarea !=null)
                                    <li class="item-2">
                                        <strong> ÁREA:&nbsp;&nbsp;&nbsp;</strong>
                                        {{Helper::getArea($c->area_idarea)}}
                                    </li>
                                    @endif
                                    <!---- se a escolaridade for 1 e os niveis forem superiores (graduação, pos graduação, mestrado e doutorado) -->
                                    <?php 
                                                $vetorniveisSsuperior=array("7","8","9","10","11","12","13","14");
                                            ?>
                                    @foreach ($vetorniveisSsuperior as $niveis)
                                    @if($c->nivel_idnivel == $niveis)
                                    @if ($c->periodo != null)
                                    <li class="item-2">
                                        <strong> PERÍODO:&nbsp;&nbsp;&nbsp;</strong>
                                        {{$c->periodo}}
                                    </li>
                                    @else
                                    <li class="item-2"><strong> PERÍODO:&nbsp;&nbsp;&nbsp;</strong>
                                        <span style="color: red;">Não informado!</span>
                                    </li>

                                    @endif
                                    @endif
                                    @endforeach
                                    @endif

                                    <li class="item-2">
                                        <strong> DATA DE
                                            INÍCIO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($c->dtinicio)}}
                                    </li>


                                    @if($c->dtfim == null)
                                    <li class="item-2">
                                        <strong> DATA DE CONCLUSÃO:&nbsp;&nbsp;&nbsp;</strong>
                                        <span style="color: red;">Não concluido!</span>
                                    </li>
                                    @else
                                    <li class="item-2">
                                        <strong> DATA DE
                                            CONCLUSÃO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($c->dtfim)}}
                                    </li>
                                    @endif
                                </ul>

                            </div>
                            @endforeach
                            <!------------------------------------------------------------------------------------------------------------->
                            @if ($experiencia->count())
                            <h4 style="color: dodgerblue;"> EXPERIÊNCIAS </h4>
                            <hr>
                            @endif
                            @foreach($experiencia as $e)
                            <ul style="list-style-type: none;">
                                <li>
                                    <strong> EMPRESA:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$e->empresa}}
                                </li>
                                <li>
                                    <strong> CARGO&nbsp;&nbsp;&nbsp;</strong>
                                    {{$e->cargo}}
                                </li>
                                <li>
                                    <strong> DATA DE INÍCIO:&nbsp;&nbsp;&nbsp;</strong>
                                    {{Helper::getData($e->dtinicio)}}
                                </li>
                                @if ($e->dtfim != null)
                                <li>
                                    <strong> DATA DE SAÍDA:&nbsp;&nbsp;&nbsp;</strong>
                                    {{Helper::getData($e->dtfim)}}
                                </li>
                                @else
                                <li>
                                    <strong> DATA DE SAÍDA:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color:red;"> Trabalha nesta empresa atualmente</span>
                                </li>
                                @endif

                                @if ($e->atividades != null)
                                <li style="word-break: break-word;">
                                    <strong>DESCRIÇÃO DAS ATIVIDADES:&nbsp;&nbsp;&nbsp;
                                    </strong>
                                    {{$e->atividades}}
                                </li>
                                @else
                                <li style="word-break: break-word;">
                                    <strong>DESCRIÇÃO DAS ATIVIDADES:&nbsp;&nbsp;&nbsp;</strong>
                                    <span style="color: red;">Não Informado</span>
                                </li>
                                @endif
                            </ul>
                            @endforeach
                            <!-------------------------------------------------------------------------------------------------------------->
                            @if($habilidades->count())
                            <h4 style="color: dodgerblue;"> HABILIDADES </h4>
                            <hr>
                            @endif
                            @foreach($habilidades as $i)
                            <ul style="list-style-type: none;">
                                <li>
                                    <strong>
                                        CATEGORIA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getTipoHab($i->tipo_idtipo)}}
                                </li>
                                <li>
                                    <strong> DESCRIÇÃO:&nbsp;&nbsp;&nbsp;</strong>
                                    {{$i->nome}}
                                </li>
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
                            @endforeach

      <!---------------------------------------------------------------------------------------------------->
                             @if($redes->count())
                                <h4 style="margin-top: 50px; color: dodgerblue;"> REDES SOCIAIS</h4>
                                <hr>
                            @endif
                            @foreach($redes as $rs)
                                                              
                            <ul style="list-style-type: none;">
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
                                  
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

</body>

</html>