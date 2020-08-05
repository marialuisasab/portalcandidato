@extends('adminlte::page')
{{-- Link do Bootstrap --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
{{-- <link rel ="stylesheet" href="css/homeCandidato.css"> --}}
<script src="/vendor/jquery/jquery.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

@section('content')

<div class="container">
    {{-- 
    idvaga int(11) AI PK
    dtinicio date
    dtfim date
    dtprazo date
    quant int(11)
    titulo varchar(70)
    descricao longtext
    requisitos longtext
    local varchar(100)
    status int(11)
    tpvaga int(11)
    pcd --}}

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
                                    <h2 class="mb-0" style="color:dodgerblue; font-size:25px;">
                                        Nova Vaga
                                        <span class="fa-stack fa-sm">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-bullhorn fa-stack-1x fa-inverse"></i>
                                        </span>

                                    </h2>

                                </div>


                                <div class="col-xs-8 col-2" style="margin-left: auto; text-align: end;">
                                    <div class="btn-group " role="group" aria-label="">

                                        <button class=" btn btn-secondary btn-sm" type="button"
                                            value="{{Auth::user()->id}}" id="idformendereco" title="Voltar"
                                            style="height:30px; margin-top: 10px; width:70px;">
                                            <a href="/curriculo" style="color: white;">Voltar<span class="fas fa-undo"
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


                                <form action="/endereco" method="POST" enctype="multipart/form-data" id="idformselect">
                                    @csrf

                                    <div class="form-group">
                                        <li><strong> DATA DE INICIO:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="date" class="form-control " name="dtinicio" id="iddatainivaga"
                                                title="Data de inicio da postagem">

                                            <div class="invalid-feedback" style="display: none;" id="mensagemdtvagaini">
                                                Você deve preencher a data de inicio!
                                            </div>

                                        </li>
                                    </div>




                                    <div class="form-group">
                                        <li><strong> DATA DE FIM:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="date" class="form-control " name="dtfim" id="iddatafimvaga"
                                                title="Data de fim da postagem">

                                            <div class="invalid-feedback" style="display: none;" id="mensagemdtvagafim">
                                                Você deve preencher a data de fim(REAL)da postagem!
                                            </div>

                                        </li>
                                    </div>



                                    <div class="form-group">
                                        <li><strong> INFORME O PRAZO DE VIGENCIA DA VAGA:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="date" class="form-control " name="dtprazo" id="iddtprazovaga"
                                                title="Data de fim conclusão postagem">

                                            <div class="invalid-feedback" style="display: none;" id="mensprazovaga">
                                                Você deve preencher a data de fim() da postagem!
                                            </div>

                                        </li>
                                    </div>




                                    <div class="form-group">
                                        <li><strong> QUANTIDADE:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="int" class="form-control " name="quant" id="quantidade"
                                                placeholder="Quantidade de vagas"
                                                title="Quantidade de vagas disponíveis para esse cargo">
                                            <div class="invalid-feedback" style="display: none;"
                                                id="menserroquantvagas">
                                                Você deve preencher o número de vagas para este cargo!
                                            </div>
                                        </li>
                                    </div>



                                    <div class="form-group">
                                        <li><strong>TITULO:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text" class="form-control"
                                                placeholder="Ex.:Auxiliar de Envase, Fxineiro etc..." name="titulo"
                                                id="idtitulo" title="Titulo da vaga"></li>
                                    </div>


                                    <div class="form-group">
                                        <li><strong> DESCRIÇÃO:&nbsp;&nbsp;&nbsp;</strong>
                                            <textarea class="form-control" id="iddescricao" rows="3" name="descricao"
                                                title="Texto de descrição da vaga"
                                                placeholder="Descreva a vaga..."></textarea>
                                            <div class="invalid-feedback" style="display: none;" id="mensdescricaovaga">
                                                Você deve preencher a descrição da vaga!
                                            </div>
                                        </li>

                                    </div>




                                    <div class="form-group">
                                        <li><strong> Requisitos:&nbsp;&nbsp;&nbsp;</strong>
                                            <textarea class="form-control" id="idrequisitos" rows="3" name="requisitos"
                                                title="Texto informando os requisitos"
                                                placeholder="Informe os requisitos..."></textarea>
                                            <div class="invalid-feedback" style="display: none;"
                                                id="mensrequisitosvaga">
                                                Você deve preencher os requisitos da vaga!
                                            </div>
                                        </li>
                                    </div>



                                    <div class="form-group">
                                        <li><strong>TITULO:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text" class="form-control" placeholder="Ex." name="local"
                                                id="idlocal" title="Local da vaga"></li>
                                        <div class="invalid-feedback" style="display: none;" id="menslocalvaga">
                                            Você deve informar o local da vaga!
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <li id="idbackgroud"><strong>DISPONIBILIDADE DE MUDANÇA PARA OUTRO ESTADO OU
                                                CIDADE?:*&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="disp_mudanca"
                                                    id="disp_mudanca" value="1">
                                                <label class="form-check-label">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="disp_mudanca"
                                                    id="disp_mudanca" value="2">
                                                <label class="form-check-label">Não</label>
                                            </div>
                                        </li>
                                        <div class="invalid-feedback" style="display: none;" id="mensdisponi">
                                            Você deve informar sua disponibilidade!
                                        </div>
                                    </div>

                                    <br>
                                    <div class="form-group" style="text-align: end;">
                                        <button type="submit" class="btn btn-primary" id="botaosalvarend"
                                            title="Confirmar Alterações">Salvar<span class="fas fa-save"
                                                style="padding-left: 15px;"></button>
                                        <button class=" btn btn-danger" style="color:red;" type="cancel"
                                            title="Cancelar Alterações">
                                            <a href="home" style="color: white;">Cancelar<span
                                                    class="fas fa-window-close" style="padding-left: 15px;"></span></a>
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







@endsection