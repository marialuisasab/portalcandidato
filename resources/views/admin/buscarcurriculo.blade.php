@extends('adminlte::page')


<script src="/vendor/jquery/jquery.js"></script>
<script src="/js/Admin/buscaarea.js"></script>
<script src="/js/Admin/filtrar_users_curriculo.js"></script>

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
<style>
    .bold {
        font-weight: bold;
    }

    .invisivel {
        display: none;
    }
</style>
@section('content')

<div class="container">


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

                        <div class="conatainer">
                            <div class="row">
                                <h5></h5>
                                <form class="form-inline ml-auto" style="margin-top: 20px; display:none;"
                                    id="idformfiltronome">
                                    <input class="form-control mr-sm-2" type="text" placeholder="Filtrar pelo nome"
                                        aria-label="Search" title="Buscar por Nome" id="filtrarcurriculos">
                                </form>
                                <form class="form-inline ml-auto" style="margin-top: 20px; display:none; "
                                    id="idformfiltrocpf">
                                    <input class="form-control mr-sm-2" type="text" placeholder="Filtrar pelo CPF"
                                        aria-label="Search" title="Buscar por CPF" id="filtrarcpf">
                                </form>
                                <form class="form-inline ml-auto" style="margin-top: 20px;  display:none;"
                                    id="idfornfiltroemail">
                                    <input class="form-control mr-sm-2" type="text" placeholder="Filtrar pelo Email"
                                        aria-label="Search" title="Buscar por Email" id="filtraremail">
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-sm" style="border-style: solid; border-color: rgb(223, 230, 225);">

                                    <div class="form-group" style="color:red"><strong>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox1"
                                                    name="checkfiltros" value="1">
                                                <label class="form-check-label"
                                                    for="inlineCheckbox1">Nome</label>&nbsp;&nbsp;&nbsp;

                                                <input class="form-check-input" type="radio" id="inlineCheckbox2"
                                                    name="checkfiltros" value="2">
                                                <label class="form-check-label"
                                                    for="inlineCheckbox2">CPF</label>&nbsp;&nbsp;&nbsp;

                                                <input class="form-check-input" type="radio" id="inlineCheckbox3"
                                                    name="checkfiltros" value="3">
                                                <label class="form-check-label" for="inlineCheckbox3">Email</label>
                                            </div>
                                        </strong>

                                    </div>
                                    {{-- <div class="form-group">
                                                                    <strong> AREA:&nbsp;&nbsp;&nbsp;</strong>
                                                                    <select class="custom-select buscar-area" name="buscararea" id="selectidarea"
                                                                        aria-placeholder="Areas de atuação" title="Buscar por area" multiple>
                                                                        @foreach(Helper::getAreas() as $area)
                                                                        <option value="{{$area->idarea}}">{{ $area->nome }}
                                    </option>
                                    @endforeach
                                    </select>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <ul style="list-style-type: none; margin-top: 50px;">
                        {{-- <table class="table table-striped table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome:</th>
                                            <th scope="col">Email:</th>
                                            <th scope="col">CPF:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr name="trnome">NOME:
                                            <th scope="row">1</th>

                                        </tr>
                                        <tr name="trnome">EMAIL:
                                            <th scope="row">2</th>

                                        </tr>
                                        <tr name="trnome">CPF:
                                            <th scope="row">3</th>

                                        </tr>
                                    </tbody>
                                </table> --}}
                        {{-- 
                                <table class="table table-striped table-light">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome:</th>
                                            <th scope="col">Email:</th>
                                            <th scope="col">CPF:</th>
                                            <th scope="col"> Salario:</th>
                                            <th scope="col">Telefone:</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table> --}}


                        <div class="container col">
                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Nome</th>
                                            <th>CPF</th>
                                            <th>Telefone</th>
                                            <th>Email</th>
                                            <th>Observação</th>
                                            {{-- <th>Data</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $u)
                                        <tr id="idcurriculos">
                                            <td class="nome_curriculo">{{$u->name}}
                                            </td>
                                            <td class="cpf_curriculo">{{$u->cpf}}</td>
                                            <td class="email_curriculo">{{$u->telefone1}}</td>
                                            <td class="email_curriculo">{{$u->email}}</td>
                                            @if ($u->obs != '')
                                            <td>{{$u->obs}}</td>
                                            @else
                                            <td style="color:red; text-align:center"><strong>Sem Observações</strong>
                                            </td>
                                            @endif
                                            {{-- <td>{{ $u->date }}</td> --}}
                                            <td> <a class="badge badge-info badge-sm"
                                                    href="/buscarcurriculo/visualizar/{{$u->idcurriculo}}"
                                                    role="button">Visualizar</a>
                                            </td>
                                            {{-- <td><a class="btn btn-primary" href="/home"role="button">Solicitar.</a></td> --}}

                                            {{-- <td>
                                                        <form method="post" action=""
                                                            onsubmit="return confirm('Confirma exclusão o teste?');">

                                                            @csrf
                                                            @method('DELETE')
                                                            <input class="btn btn-danger btn-sm" type="submit"
                                                                value="Excluir">
                                                        </form>
                                                    </td> --}}
                                        </tr>


                                        @endforeach
                                    </tbody>
                                </table>
                                {!!$users->links()!!}
                                {{-- {!!$c->links()!!} --}}
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
</div>



@endsection