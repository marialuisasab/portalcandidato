@extends('adminlte::page')


<script src="/vendor/jquery/jquery.js"></script>
<script src="/js/Admin/buscaarea.js"></script>
<script src="/js/Admin/filtrar_users_curriculo.js"></script>
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
                                        <a href="/vaga" style="color: white;">Voltar<span class="fas fa-undo"
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
                            <h5></h5>
                            {!!$users->links()!!}
                            <div class="col-md-12 col-2" style="text-align: end">

                                <a href="#" class="btn btn-info btn-lg" type="button"
                                    style="margin-right: auto; text-align: end;" data-toggle="modal"
                                    data-target="#modal_busca_avancada"
                                    style="padding-left: 7px; padding-right: 7px;">Busca
                                    Avançada</a><br>
                                <!-- Início Modal -->
                                <div class="modal fade" id="modal_busca_avancada">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">CAMPOS DE BUSCA AVANÇADA:</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    {{-- <div class="form-group">
                                                        <label for="message-text" class="col-form-label"></label>
                                                        <textarea class="form-control" rows="4" name="obs"
                                                            id="message-text"></textarea>
                                                    </div> --}}
                                                    <ul style="list-style-type: none;">
                                                        <div class="form-group" style="text-align: start"
                                                            id="email_modal_busca">
                                                            <li><strong> EMAIL:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                                                <input type="text" class="form-control"
                                                                    name="emailmodal" id="cnh" placeholder="email"
                                                                    title="Insira o email para a busca">
                                                            </li>
                                                        </div>
                                                        <div class="form-group" style="text-align:start"
                                                            id="nome_modal_busca">
                                                            <li><strong> NOME:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                                                <input type="text" class="form-control" name="nomemodal"
                                                                    id="nome" placeholder="nome"
                                                                    title="Insira o nome que será buscado">
                                                            </li>
                                                        </div>
                                                        <div class="form-group" id="genero_modal_busca"
                                                            style="text-align: start;">
                                                            <li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong>
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
                                                                            name="naturaidademodal"
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
                                                                    <option value="1">Academica</option>
                                                                    <option value="2">Complementar</option>
                                                                </select>
                                                            </li>
                                                        </div>

                                                        <div class="form-group" id="idnivel_modal_busca"
                                                            style="display: none; text-align:start;">
                                                            <li><strong> NÍVEL:&nbsp;&nbsp;&nbsp;
                                                                </strong>
                                                                <select class="form-control" id="nivel_idnivel"
                                                                    name="nivel_idnivelmodal"
                                                                    title="Nivel de Escolaridade">
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
                                                                    name="categoria_idcategoriamodal">
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
                                                                    name="area_idarea" title="Area de Atuação">
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
                                                            <li><strong> Curso:&nbsp;&nbsp;&nbsp;</strong><span>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    name="nomecursomodal" id="curso" placeholder="curso"
                                                                    title="Insira o curso">
                                                            </li>
                                                        </div>

                                                        <div class="form-group" style="text-align:start"
                                                            id="empresa_modal_busca">
                                                            <li><strong> Empresa:&nbsp;&nbsp;&nbsp;</strong><span>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    name="empresamodal" id="empresa"
                                                                    placeholder="empresa"
                                                                    title="Insira o nome da empresa">
                                                            </li>
                                                        </div>

                                                        <div class="form-group" style="text-align:start"
                                                            id="cargo_modal_busca">
                                                            <li><strong> CARGO:&nbsp;&nbsp;&nbsp;</strong><span>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    name="cargomodal" id="cargo" placeholder="cargo"
                                                                    title="Insira o cargo exercido">
                                                            </li>
                                                        </div>

                                                        <div class="form-group" style="display: none;"
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
                                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Modal-->
                            </div>
                        </div>

                    </div>

                    <ul style="list-style-type: none; margin-top: 50px;">
                        <div class="container col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Nome</th>
                                            <th>Naturalidade</th>
                                            <th>Cidade</th>
                                            {{-- <th>Telefone</th> --}}
                                            <th class="text-align: center;">Empresas</th>
                                            <th>Cargo</th>
                                            {{-- <th>Observação</th> --}}
                                            <th>Atualização</th>
                                            {{-- <th>Opções</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $u)
                                        <tr id="idcurriculos">
                                            <td class="nome_curriculo">{{$u->name}}
                                            </td>
                                            <td class="naturalidade_curriculo">{{Helper::getCidade($u->naturalidade)}}
                                            </td>
                                            <td class="cidade_curriculo">{{Helper::getCidade($u->cidade_idcidade)}}</td>

                                            <td class="experirencias_curriculo">
                                                @foreach (Helper::getExperiencia($u->idcurriculo) as $experiencias)
                                                @if ($experiencias->count())
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item ">
                                                        {{$experiencias->empresa}}</li>
                                                </ul>
                                                @else
                                                <p style="color:red">Nenhuma experiência cadastrada</p>
                                                @endif

                                                @endforeach
                                            </td>

                                            <td class="cargo_curriculo">
                                                @foreach (Helper::getExperiencia($u->idcurriculo) as $experiencias)
                                                @if ($experiencias->count())
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item ">
                                                        {{$experiencias->cargo}}</li>
                                                </ul>
                                                @else
                                                <p style="color:red">Nenhum cargo cadastrado</p>
                                                @endif

                                                @endforeach
                                            </td>
                                            <td class="atualizacao_curriculo">{{$u->dtatualizacao}}
                                            </td>
                                            {{-- @if ($u->obs != '')
                                                                                    <td>{{$u->obs}}</td>
                                            @else
                                            <td>-</td>
                                            @endif --}}

                                            <td>
                                                <a class="badge badge-primary badge-sm"
                                                    href="/buscarcurriculo/visualizar/{{$u->idcurriculo}}"
                                                    role="button">Visualizar Currículo</a>
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
                        {{-- <div class="form-group" style="text-align: end;">
                                    <button type="submit" class="btn btn-primary" id="botaosalvarend"
                                        title="Confirmar Alterações">Salvar<span class="fas fa-save"
                                            style="padding-left: 15px;"></button>
                                    <button class=" btn btn-danger" style="color:red;" type="cancel"
                                        title="Cancelar Alterações">
                                        <a href="home" style="color: white;">Cancelar<span class="fas fa-window-close"
                                                style="padding-left: 15px;"></span></a>
                                    </button>
                                </div> --}}
                        </form>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>


</div>




@endsection