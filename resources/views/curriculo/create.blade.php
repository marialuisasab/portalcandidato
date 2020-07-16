@extends('adminlte::page')

<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> --}}
<script src="/jquerymask/jquerymasky.js"></script>
<script src="/jqueryMaskMoney/jquery.maskMoney.js" type="text/javascript"></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js " type=" text / javascript "> </script>
{{-- 
<script src="vendor/jquery/jquery.js"></script> --}}
<script src="/js/Dadospessoais/edit.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
    integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
</script>


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
                                    <h2 class="mb-0" style="color:dodgerblue; font-size:25px;">
                                        Dados Pessoais
                                        <span class="fa-stack fa-sm">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-id-card fa-stack-1x fa-inverse"></i>
                                        </span>

                                    </h2>

                                </div>


                                <div class="col-xs-7 col-2" style="margin-left: auto; margin-top:7px;">
                                    <div class="btn-group " role="group" aria-label="">


                                        <button class=" btn btn-secondary btn-sm"
                                            style="height:30px; margin-top: 10px; width:70px;" title="Voltar ">
                                            <a style="color: white;" hrehref="/home">Voltar<span class="fas fa-undo"
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


                                <form action="/curriculo" method="POST" enctype="multipart/form-data" id="idformdados">
                                    @csrf

                                    <div class="form-group">
                                        <li><strong> NOME:*&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text" class="form-control" name="nome" id="nome"
                                                placeholder="Nome Completo" value="{{Auth::user()->name}}" title="Nome">
                                        </li>
                                        <div class="invalid-feedback" id="mensnome" style="display: none;">
                                            Você precisa preencher o nome!
                                        </div>
                                    </div>





                                    <div class="form-group">
                                        <li><strong> CPF:*&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text"
                                                class="form-control {{ $errors->has('cpf') ? 'is-invalid' : ''}}"
                                                maxlength="11" name="cpf" id="cpf" placeholder="CPF"
                                                title="Documento CPF">
                                            <div class="invalid-feedback" id="menscpf" style="display: none;">
                                                Você precisa preencher o CPF!
                                            </div>
                                        </li>
                                    </div>




                                    <div class="form-group">
                                        <li><strong> RG:*&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text"
                                                class="form-control {{$errors->has('rg') ? 'is-invalid' : ''}}"
                                                maxlength="11" name="rg" id="rg" placeholder="RG"
                                                title="Documento de Identidade">
                                            <div class="invalid-feedback" id="mensrg" style="display: none;">
                                                Você precisa preencher o RG!
                                            </div>
                                        </li>
                                    </div>





                                    <div class="form-group">
                                        <li><strong> CTPS:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text" class="form-control" name="ctps" id="ctps"
                                                placeholder="CTPS" title="Numero da Carteira de Trabalho">
                                        </li>
                                    </div>






                                    <div class="form-group">
                                        <li><strong>PRETENÇÃO SALARIAL:*&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text"
                                                class="form-control {{$errors->has('pretsalarial') ? 'is-invalid' : ''}}"
                                                placeholder="Ex.:9999,99" name="pretsalarial" id="pretsalarial"
                                                title="Valor Pretendido para Salário">
                                            <div class="invalid-feedback" id="menspretsala" style="display: none;">
                                                Você precisa preencher a sua pretenção salarial!
                                            </div>
                                        </li>

                                    </div>






                                    <div class="form-group">
                                        <li><strong>DATA DE NASCIMENTO:*&nbsp;&nbsp;&nbsp;</strong><span
                                                style="color: red;"></span>
                                            <input type="date"
                                                class="form-control {{$errors->has('dtnascimento') ? 'is-invalid' : ''}}"
                                                placeholder="Ex.: dd/mm/aaaa" name="dtnascimento" id="dtnascimento"
                                                title="Data de Nascimento">
                                            <div class="invalid-feedback" id="mensdtnasc" style="display: none;">
                                                Você precisa preencher a data do seu nascimento!
                                            </div>
                                        </li>
                                    </div>







                                    <div class="form-group">
                                        <li><strong> GENERO:*&nbsp;&nbsp;&nbsp;</strong>
                                            <select class="form-control {{$errors->has('genero') ? 'is-invalid' : ''}}"
                                                id="genero" name="genero" title="Genero">
                                                <option value="" selected>Selecionar</option>
                                                <option value="F">Feminino</option>
                                                <option value="M">Masculino</option>
                                                <option value="N">Prefiro não informar</option>
                                            </select>
                                            <div class="invalid-feedback" id="mensgenero" style="display: none;">
                                                Você precisa preencher o genero!
                                            </div>
                                        </li>
                                    </div>







                                    <div class="form-group">
                                        <li style=""><strong> NOME DA MÃE:*&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text"
                                                class="form-control {{$errors->has('nomemae') ? 'is-invalid' : ''}}"
                                                name="nomemae" id="nomemae" placeholder="Nome da mãe"
                                                title="Nome da Mãe">
                                            <div class="invalid-feedback" id="mensmae" style="display: none;">
                                                Você precisa preencher o nome de sua mãe!
                                            </div>
                                        </li>
                                    </div>








                                    <div class="form-group">
                                        <li><strong> NOME DO PAI:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text" class="form-control" name="nomepai" id="nomepai"
                                                placeholder="Nome do pai" title="Nome do Pai">
                                        </li>
                                    </div>





                                    <div class="form-group">
                                        <li><strong> DEFICIENTE FÍSICO?*&nbsp;&nbsp;&nbsp;</strong>
                                            <select class="form-control {{$errors->has('dfisico') ? 'is-invalid' : ''}}"
                                                id="dfisico" name="dfisico" title="Deficiência Fisíca">
                                                <option value="" selected>Selecionar</option>
                                                <option value="1">Sim</option>
                                                <option value="2">Não</option>
                                            </select>
                                            <div class="invalid-feedback" id="mensdtfisico" style="display: none;">
                                                Você precisa preencher se é deficiente fisico!
                                            </div>
                                        </li>
                                    </div>






                                    <div class="form-group">
                                        <li><strong> NACIONALIDADE:*&nbsp;&nbsp;&nbsp;</strong>
                                            <select
                                                class="form-control {{$errors->has('nacionalidade') ? 'is-invalid' : ''}}"
                                                id="nacionalidade" name="nacionalidade"
                                                title="Informe Sua Nacionalidade">
                                                <option value="">Selecionar</option>
                                                @foreach(Helper::getPai () as $pais)
                                                <option value="{{$pais->idpais}}">{{$pais->nome}}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="mensnacional" style="display: none;">
                                                Você precisa selecionar a sua nacionalidade!
                                            </div>
                                        </li>
                                    </div>








                                    <div class="form-group">
                                        <li><strong> NATURALIDADE:*&nbsp;&nbsp;&nbsp;</strong>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm" style="text-align: start;">

                                                        <select
                                                            class="form-control {{$errors->has('naturalidade') ? 'is-invalid' : ''}}"
                                                            id="natural" name="natural" title="Estado de Origem">
                                                            <option value="" selected>Selecionar</option>
                                                            @foreach(Helper::getEstados() as $est)
                                                            <option value="{{$est->idestado}}">{{ $est->nome }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback" id="mensnatural"
                                                            style="display: none;">
                                                            Você precisa selecionar a sua naturalidade!
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <select
                                                            class="form-control {{$errors->has('naturalidade') ? 'is-invalid' : ''}}"
                                                            id="naturalidade" name="naturalidade"
                                                            title="Cidade de Origem">
                                                            <option value="" selected>Selecionar</option>
                                                        </select>
                                                        <div class="invalid-feedback" id="mensnaturalidade"
                                                            style="display: none;">
                                                            Você precisa selecionar a sua naturalidade!
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                    </div>






                                    <div class="form-group">
                                        <li><strong> TELEFONE 1*: &nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text"
                                                class="form-control {{$errors->has('telefone1') ? 'is-invalid' : ''}}"
                                                name="telefone1" id="telefone1" placeholder="Telefone 1"
                                                title="Telefone Principal">
                                            <div class="invalid-feedback" id="menstelefone" style="display: none;">
                                                Você precisa selecionar o telefone!
                                            </div>
                                        </li>
                                    </div>






                                    <div class="form-group">
                                        <li><strong>TELEFONE 2:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text" class="form-control" name="telefone2" id="telefone2"
                                                placeholder="Telefone 2" title="Segunda Opção de Telefone">
                                        </li>
                                    </div>









                                    <div class="form-group">
                                        <li><strong> ESTADO CIVIL:*&nbsp;&nbsp;&nbsp;</strong>
                                            <select
                                                class="form-control {{$errors->has('estadocivil') ? 'is-invalid' : ''}}"
                                                id="estadocivil" name="estadocivil" title="Estado Civil">
                                                <option value="" selected>Selecionar</option>
                                                <option value="1">Solteiro(a)</option>
                                                <option value="2">Casado(a)</option>
                                                <option value="3">Divorciado(a)</option>
                                                <option value="4">Viúvo(a)</option>
                                                <option value="5">Separado(a)</option>
                                            </select>
                                            <div class="invalid-feedback" id="mensestadociv" style="display: none;">
                                                Você precisa selecionar o seu estado civil!
                                            </div>
                                        </li>
                                    </div>


                                    <div class="form-group">
                                        <li><strong>POSSUI CNH?&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                            <div class="form-check form-check-inline" id="idposscnh" name="idposscnh">
                                                <input class="form-check-input" type="radio" name="tenhocnh"
                                                    id="tenhocnh" value="1">
                                                Sim&nbsp;&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="tenhocnh"
                                                    id="tenhocnh" value="2">
                                                Não
                                            </div>
                                        </li>
                                    </div>





                                    <div class="form-group" style="display: none;" id="selcatcnh">
                                        <li><strong> CATEGORIA DA CNH:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                            <select class="custom-select" id="catcnh" name="catcnh"
                                                title="Categoria da CNH">
                                                <option value="" selected>Selecionar</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                            </select></li>
                                    </div>






                                    <div class="form-group" style="display: none;" id="seleorigcnh">
                                        <li><strong> UF DE ORIGEM DA CNH:&nbsp;&nbsp;&nbsp;</strong><span></span>
                                            <select class="custom-select" id="ufcnh" name="ufcnh" placeholder="UF"
                                                title="Categoria da CNH" title="Estado de Origem da CNH">
                                                <option value="" selected>Selecionar</option>
                                                @foreach(Helper::getEstados() as $esta)
                                                <option value="{{$esta->idestado}}">{{ $esta->nome }}</option>
                                                @endforeach
                                            </select>
                                    </div>




                                    <div class="form-group" style="display: none;" id="numcnh">
                                        <li><strong> NUMERO DA CNH :&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                            <input type="text" class="form-control" name="cnh" id="cnh"
                                                placeholder="CNH" title="Numero da CNH">
                                        </li>
                                    </div>




                                    <div class="form-group">
                                        <li><strong> OBJETIVOS :&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                            <textarea class="form-control" id="sobre" rows="3" name="sobre"
                                                title="Objetivos Pessoais"
                                                placeholder="Descreva seus objetivos..."></textarea>
                                        </li>
                                    </div>


                                    <div class="form-group">
                                        @if(Auth::user()->foto != null)
                                        <img src="{{url('/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}"
                                            style="max-width: 50px;">
                                        @endif
                                        <li><strong>FOTO:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="file" class="form-control-file" id="foto" name="foto"
                                                title="Alterar Foto de Perfil" accept='image/*'>
                                        </li>

                                    </div>
                                    <br>
                                    <div class="form-group" style="text-align: end;">
                                        <button type="submit" class="btn btn-outline-primary" id="botaosalvarend"
                                            title="Confirmar Alterações">Salvar<span class="fas fa-save"
                                                style="padding-left: 15px;"></button>
                                        <button class=" btn btn-outline-danger" type="cancel" title="Cancelar Edição">
                                            <a href="home">Cancelar<span class="fas fa-window-close"
                                                    style="padding-left: 15px; color: red;"></span></a>
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