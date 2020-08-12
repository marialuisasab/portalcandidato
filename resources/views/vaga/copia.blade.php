@extends('adminlte::page')
<!--Link do Bootstrap -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="/vendor/jquery/jquery.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

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
                                <div class="col-">
                                    <h2 class="mb-0" style="color:dodgerblue; font-size:25px;">
                                        Copiar Vaga
                                        <span class="fa-stack fa-sm">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-bullhorn fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </h2>
                                </div>
                                <div class="col-xs-8 col-2" style="margin-left: auto; text-align: end;">
                                    <div class="btn-group " role="group" aria-label="">
                                        <button class=" btn btn-secondary btn-sm" type="button"
                                            value="" id="" title="Voltar" style="height:30px; margin-top: 10px; width:70px;">
                                            <a href="/listar" style="color: white;">
                                                Voltar<span class="fas fa-undo" style="padding-left: 5px; color:white; font-size:9px;"></span>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body" style="box-sizing: border-box;">
                            <ul style="list-style-type: none;">

                                <form action="/salvarvaga" method="POST" enctype="multipart/form-data" id="idformselect">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <li><strong>TÍTULO:*&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text" class="form-control" placeholder="Ex.: Auxiliar de Envase" name="titulo" id="idtitulo" title="Título da vaga" value="{{$v->titulo}}">
                                        </li>
                                    </div>
                                    <div class="form-group">
                                        <li><strong> TIPO DE VAGA:*&nbsp;&nbsp;&nbsp;</strong>
                                            <select class="form-control " id="tpvaga" name="tpvaga" title="Genero">
                                                <option value="1" {{$v->tpvaga == '1' ? 'selected' : ''}}>Efetiva</option>
                                                <option value="2" {{$v->tpvaga == '2' ? 'selected' : ''}}>Temporária</option>
                                            </select>
                                           
                                            <div class="invalid-feedback" id="mensstatus" style="display: none;">
                                                Você precisa selecionar o tipo de vaga!
                                            </div>
                                        </li>
                                    </div>


                                    <div class="form-group">
                                        <li><strong> DATA DE INÍCIO:*&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="date" class="form-control " name="dtinicio" id="iddatainivaga" title="Data de inicio da postagem" value="{{$v->dtinicio}}">
                                            <div class="invalid-feedback" style="display: none;" id="mensagemdtvagaini">
                                                Você deve preencher a data de inicio!
                                            </div>

                                        </li>
                                    </div>

                                    <div class="form-group">
                                        <li><strong> PREVISÃO DE ENCERRAMENTO:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="date" class="form-control " name="dtprazo" id="iddatafimvaga" title="Data prevista de encerramento do processo seletivo" value="{{$v->dtprazo}}">                                        

                                        </li>
                                    </div>

                                    <div class="form-group">
                                        <li><strong> QUANTIDADE:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="int" class="form-control " name="quant" id="quantidade" placeholder="Quantidade de vagas" title="Quantidade de vagas disponíveis para esse cargo" value="{{$v->quant}}">                                        
                                        </li>
                                    </div>
                                    
                                    <div class="form-group">
                                        <li><strong> LOCAL:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text" class="form-control" placeholder="Ex.: Sede fabril e administrativa da Bio Extratus em Alvinópolis/MG" name="local" id="idlocal" title="Local da vaga" value="{{$v->local}}">
                                        </li>
                                        <div class="invalid-feedback" style="display: none;" id="menslocalvaga">
                                            Você deve informar o local da vaga!
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <li><strong> DESCRIÇÃO:*&nbsp;&nbsp;&nbsp;</strong>
                                            <textarea class="form-control" id="iddescricao" rows="3" name="descricao" title="Texto de descrição da vaga" placeholder="Sobre a vaga...">{{$v->descricao}}</textarea>
                                            <div class="invalid-feedback" style="display: none;" id="mensdescricaovaga">
                                                Você deve preencher a descrição da vaga!
                                            </div>
                                        </li>

                                    </div>




                                    <div class="form-group">
                                        <li><strong> REQUISITOS:*:&nbsp;&nbsp;&nbsp;</strong>
                                            <textarea class="form-control" id="idrequisitos" rows="3" name="requisitos" title="Texto informando os requisitos" placeholder="Requisitos para ocupar a vaga...">{{$v->requisitos}}</textarea>
                                            <div class="invalid-feedback" style="display: none;" id="mensrequisitosvaga">
                                                Você deve preencher os requisitos da vaga!
                                            </div>
                                        </li>
                                    </div>

                            

                                    
                                     <div class="form-group">
                                        <li><strong> PCD:*&nbsp;&nbsp;&nbsp;</strong>                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pcd"
                                                    id="pcd" value="1" {{ $v->pcd == '1' ? 'checked' : '' }}>
                                                <label class="form-check-label">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pcd"
                                                    id="pcd" value="2" {{ $v->pcd == '2' ? 'checked' : '' }}>
                                                <label class="form-check-label">Não</label>
                                            </div>
                                            <div class="invalid-feedback" id="mensstatus" style="display: none;">
                                                Você precisa selecionar o status!
                                            </div>
                                        </li>
                                    </div>

                                    <div class="form-group">
                                        <li><strong>STATUS:*&nbsp;&nbsp;&nbsp;</strong>                
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="status" value="1"  {{ $v->status == '1' ? 'checked' : '' }}>
                                                <label class="form-check-label">Visível</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="status" value="2"  {{ $v->status == '2' ? 'checked' : '' }}>
                                                <label class="form-check-label">Oculta</label>
                                            </div>
                                            <div class="invalid-feedback" id="mensstatus" style="display: none;">
                                                Você precisa selecionar o status!
                                            </div>
                                        </li>
                                    </div>
                                  

                                    <br>
                                    <div class="form-group" style="text-align: end;">
                                        <button type="submit" class="btn btn-primary" id="botaosalvarend"
                                            title="Confirmar Alterações">Salvar<span class="fas fa-save"
                                                style="padding-left: 15px;"></button>
                                        <button class=" btn btn-danger" style="color:red;" type="cancel"
                                            title="Cancelar Alterações">
                                            <a href="/listar" style="color: white;">Cancelar<span
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