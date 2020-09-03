@extends('adminlte::page')


<script src="/vendor/jquery/jquery.js"></script>
<script src="/js/Admin/buscaarea.js"></script>
{{-- <script src="/js/Admin/filtrar_users_curriculo.js"></script> --}}
<script src="/js/Admin/busca_avancada.js"></script>
{{-- Link do Bootstrap --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
{{-- importação select2 --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/i18n/pt-BR.js"></script>
<style>
    .bold {
        font-weight: bold;
    }

    .invisivel {
        display: none;
    }
</style>
@section('content')

@include('flash::message')

<div class="row">
    <div class="col-xs-12 col-md-12">

        <div id="accordion" style="margin-top: 40px;">
            <div class="card-border-light">
                <div class="card-header" id="headingOne" style="background-color: white;">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm" style="text-align: center;">
                                <h2 class="mb-0" style="color:dodgerblue; font-size:25px; text-align:center">
                                    Buscar Curriculo
                                    <span class="fa-stack fa-sm">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-search fa-stack-1x fa-inverse"></i>
                                    </span>
                                </h2>
                            </div>
                            <div class="col-xs-8 col-2" style="margin-left: auto; text-align: end;">
                                <div class="btn-group " role="group" aria-label="">
                                    <button class=" btn btn-secondary btn-sm" type="button" title="Voltar"
                                        style="height:30px; margin-top: 10px; width:70px;">
                                        <a href="/admin" style="color: white;">Voltar<span class="fas fa-undo"
                                                style="padding-left: 5px; color:white; font-size:9px;"></span></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body" style="box-sizing: border-box; margin-top: 30px;">

                    <div class="container">

                        <div class="row">
                            <div class="col-md-8 col-8" style="text-align: start">

                                <a href="#" class="btn btn-info btn-lg" type="button"
                                    style="margin-right: auto; text-align: end;" data-toggle="modal"
                                    data-target="#modal_busca_avancada"
                                    style="padding-left: 7px; padding-right: 7px;">Busca
                                    Avançada</a><br>
                                <!-- Início Modal -->
                                <div class="modal fade" id="modal_busca_avancada">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Busca de Currículos</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('filtrar')}}" method="POST" id="form_busca_avancada">
                                                @csrf
                                                <div class="modal-body">

                                                    <ul style="list-style-type: none;">
                                                        <div class="form-group" style="text-align: start"
                                                            id="email_modal_busca">
                                                            <li><strong> E-MAIL:&nbsp;&nbsp;&nbsp;</strong><span>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    name="emailmodal" id="email"
                                                                    title="Insira o email para a busca">
                                                            </li>
                                                        </div>
                                                        <div class="form-group" style="text-align:start"
                                                            id="nome_modal_busca">
                                                            <li><strong> NOME:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                                                <input type="text" class="form-control" name="nomemodal"
                                                                    id="nome" title="Insira o nome que será buscado">
                                                            </li>
                                                        </div>
                                                        <div class="form-group" id="genero_modal_busca"
                                                            style="text-align: start;">
                                                            <li><strong> GÊNERO:&nbsp;&nbsp;&nbsp;</strong>
                                                                <select class="form-control " id="genero"
                                                                    name="generomodal"
                                                                    title="Selecione o genero para a busca">
                                                                    <option value="" selected>Selecionar</option>
                                                                    <option value="F">Feminino</option>
                                                                    <option value="M">Masculino</option>
                                                                    <option value="N">Prefiro não informar</option>
                                                                </select>
                                                            </li>
                                                        </div>
                                                        <div class="form-group" id="pcd_modal_busca"
                                                            style="text-align: start;">
                                                            <li><strong> PCD:&nbsp;&nbsp;&nbsp;</strong>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="pcdmodal" id="pcd" value="1">
                                                                    <label class="form-check-label">Sim</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="pcdmodal" id="pcd" value="2">
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
                                                                        <select class="form-control " id="natural"
                                                                            name="naturalmodal"
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
                                                                        <select class="form-control" id="naturalidade"
                                                                            name="naturalidademodal"
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

                                                                        <select class="form-control " id="estadoatual"
                                                                            name="estadoatualmodal"
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
                                                                        <select class="form-control" id="cidadeatual"
                                                                            name="cidadeatualmodal"
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
                                                                <select class="form-control " id="escolaridade"
                                                                    name="escolaridademodal" title="Tipo de Formação">
                                                                    <option value="" selected>Selecionar</option>
                                                                    <option value="1">Acadêmica</option>
                                                                    <option value="2">Complementar</option>
                                                                </select>
                                                            </li>
                                                        </div>
                                                        <div class="form-group" id="idnivel_modal_busca"
                                                            style="display: none; text-align:start;">
                                                            <li><strong> NÍVEL:&nbsp;&nbsp;&nbsp;
                                                                </strong>
                                                                <select class="form-control" id="nivel_idnivel"
                                                                    name="nivelmodal" title="Nivel de Escolaridade">
                                                                    <option value="" selected>Selecionar</option>
                                                                    @foreach(Helper::getNiveis() as $n)
                                                                    <option value="{{$n->idnivel}}">{{ $n->nome }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </li>
                                                        </div>
                                                        <div class="form-group" id="categoria_modal_busca"
                                                            style="display: none; text-align:start;">
                                                            <li><strong> CATEGORIA:&nbsp;&nbsp;&nbsp;
                                                                </strong>
                                                                <select class="custom-select" id="categoria_idcategoria"
                                                                    name="categoriamodal">
                                                                    <option value="" selected>Selecionar</option>
                                                                    @foreach(Helper::getCategorias() as $c)
                                                                    <option value="{{$c->idcategoria}}">{{ $c->nome }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </li>
                                                        </div>
                                                        <div class="form-group" style="text-align:start; display:none"
                                                            id="area_modal_busca">
                                                            <li><strong> ÁREA:&nbsp;&nbsp;&nbsp;</strong>
                                                                <select class="custom-select" id="area_idarea"
                                                                    name="areamodal" title="Area de Atuação">
                                                                    <option value="" selected>Selecionar</option>
                                                                    @foreach(Helper::getAreas() as $a)
                                                                    <option value="{{$a->idarea}}">{{$a->nome }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </li>
                                                        </div>
                                                        <div class="form-group" style="text-align:start"
                                                            id="curso_modal_busca">
                                                            <li><strong> CURSO:&nbsp;&nbsp;&nbsp;</strong><span>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    name="nomecursomodal" id="curso"
                                                                    title="Insira o curso">
                                                            </li>
                                                        </div>
                                                        <div class="form-group" style="text-align:start"
                                                            id="empresa_modal_busca">
                                                            <li><strong> EMPRESA:&nbsp;&nbsp;&nbsp;</strong><span>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    name="empresamodal" id="empresa"
                                                                    title="Insira o nome da empresa">
                                                            </li>
                                                        </div>
                                                        <div class="form-group" style="text-align:start"
                                                            id="cargo_modal_busca">
                                                            <li><strong> CARGO:&nbsp;&nbsp;&nbsp;</strong><span>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    name="cargomodal" id="cargo"
                                                                    title="Insira o cargo exercido">
                                                            </li>
                                                        </div>
                                                        <div class="form-group" style="text-align: start;"
                                                            id="catcnh_modal_busca">
                                                            <li><strong> CATEGORIA DA
                                                                    CNH:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                                                <select class="custom-select" id="catcnh"
                                                                    name="catcnhmodal"
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
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary"
                                                        id="botao_buscar">Buscar</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Modal-->
                            </div>
                            {{-- busca por palavra chave --}}
                            <div class="col-sm" style="text-align: end; margin-top: -15px;">
                                <form action="{{route('filtrarpalavra')}}" class="form-inline ml-auto"
                                    style="margin-top: 20px;">
                                    @csrf
                                    <div class="form-group" style="text-align: start; margin-right:3px;">
                                        <input class="form-control" type="text" placeholder="Palavra-chave"
                                            aria-label="Search" name="palavrachave" title="Pesquisar palavra-chave">
                                    </div>

                                    <div class="form-group" style="text-align: end;">
                                        <button type="submit" class="btn btn-info btn-lg"
                                            title="Confirmar busca">Buscar<span class="fas fa-search"
                                                style="padding-left: 10px;"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-sm">
                                @if(isset($parametros))
                                <p>Filtros:</p>
                                <div class="d-flex flex-row bd-highlight mb-3">
                                    @if(isset($parametros['nomemodal']))
                                    @if ($parametros['nomemodal'] !='')
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">
                                            {{$parametros['nomemodal']}}
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    @if(isset($parametros['emailmodal']))
                                    @if ($parametros['emailmodal']!=null)
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">
                                            {{$parametros['emailmodal']}}
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
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
                                            Não informado
                                            @else
                                            @endif
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    @if(isset($parametros['pcdmodal']))
                                    @if ($parametros['pcdmodal']!=null)
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">
                                            @if ($parametros['pcdmodal'] =='1')
                                            Com deficiência
                                            @else
                                            Sem deficiência
                                            @endif
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    @if(isset($parametros['naturalidademodal']))
                                    @if ($parametros['naturalidademodal']!=null)
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">
                                            <i class="fas fa-check"></i>
                                            {{Helper::getCidade($parametros['naturalidademodal'])}}
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    @if(isset($parametros['cidadeatualmodal']))
                                    @if ($parametros['cidadeatualmodal']!=null)
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">
                                            {{Helper::getCidade($parametros['cidadeatualmodal'])}}
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
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
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    @if(isset($parametros['nivelmodal']))
                                    @if ($parametros['nivelmodal']!=null)
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">
                                            {{Helper::getNivel($parametros['nivelmodal'])}}
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    @if(isset($parametros['areamodal']))
                                    @if ($parametros['areamodal']!=null)
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">
                                            {{Helper::getArea($parametros['areamodal'])}}
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    @if(isset($parametros['nomecursomodal']))
                                    @if ($parametros['nomecursomodal']!=null)
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">{{$parametros['nomecursomodal']}}
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    @if(isset($parametros['cargomodal']))
                                    @if ($parametros['cargomodal']!=null)
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">{{$parametros['cargomodal']}}
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    @if(isset($parametros['empresamodal']))
                                    @if ($parametros['empresamodal']!=null)
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">{{$parametros['empresamodal']}}
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    @if(isset($parametros['catcnhmodal']))
                                    @if ($parametros['catcnhmodal']!=null)
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">{{$parametros['catcnhmodal']}}
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    @if(isset($parametros['palavrachave']))
                                    @if ($parametros['palavrachave']!=null)
                                    <div class="p-2 bd-highlight">
                                        <p class="badge badge-primary badge-primary">{{$parametros['palavrachave']}}
                                            <i class="fas fa-check"
                                                style="padding-left: 5px; padding-right: 5px; font-size: 12px;">
                                            </i>
                                        </p>
                                    </div>
                                    @else
                                    @endif
                                    @else
                                    @endif
                                    <?php 
                       $maxparametros=sizeof($parametros);
                        ?>
                                    @if ($maxparametros >0)
                                    <div class="p-2 bd-highlight">
                                        <a href="{{route('buscarcurriculo')}}" class="badge badge-danger"
                                            title="Voltar para tela inicial de busca">LIMPAR FILTRO
                                            <span class="fas fa-times" style="padding-left: 10px; color: white;"></a>
                                    </div>
                                    @else
                                    @endif

                                </div>
                                @else
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <p>Mostrando de {{$users->firstItem()}} até {{$users->lastItem()}} de
                                    {{ $users->total() }} registros</p>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col-sm">
                                @if(isset($parametros))
                                {!!$users->appends($parametros)->links()!!}
                                @else
                                {!!$users->links()!!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <ul style="list-style-type: none;">
                        <div class="container col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Nome</th>
                                            <th>Naturalidade</th>
                                            <th>Cidade</th>
                                            <th>Atualização</th>
                                            <th>observação</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $u)
                                        <tr id="idcurriculos">
                                            <td class="nome_curriculo">
                                                {{$u->name}}
                                            </td>
                                            <td class="naturalidade_curriculo">
                                                {{Helper::getCidade($u->naturalidade)}}
                                            </td>
                                            <td class="cidade_curriculo">
                                                @if(!is_null($u->cidade_idcidade))
                                                {{Helper::getCidade($u->cidade_idcidade)}}
                                                @endif
                                            </td>
                                            <td class="atualizacao_curriculo">{{Helper::getData($u->dtatualizacao)}}
                                            </td>
                                            @if ($u->obs != '')
                                            <td>{{$u->obs}}</td>
                                            @else
                                            <td>-</td>
                                            @endif
                                            <td>
                                                <a class="badge badge-primary badge-sm"
                                                    href="/buscarcurriculo/visualizar/{{$u->idcurriculo}}"
                                                    role="button">Visualizar Currículo</a>
                                                <br>
                                                <a href="#" class="badge badge-warning" data-toggle="modal"
                                                    data-target="#exampleModal{{$u->idcurriculo}}"
                                                    style="padding-left: 7px; padding-right: 7px;">Incluir
                                                    Observação</a><br>
                                            </td>
                                        </tr>

                                        <!-- Início Modal -->
                                        <div class="modal fade" id="exampleModal{{$u->idcurriculo}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{$u->name}}:</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/editarObs/{{$u->idcurriculo}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="message-text"
                                                                    class="col-form-label">Observações:</label>
                                                                <textarea class="form-control" rows="4" name="obs"
                                                                    id="message-text">{{$u->obs}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-primary">Salvar</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Fechar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fim Modal-->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <script type="text/javascript">

                        </script>
                        <br>
                        </form>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>


</div>




@endsection