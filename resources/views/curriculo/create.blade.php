@extends('adminlte::page')

@section('content')

<div class="container">



    <div class="row">

        <div class="col-xs-1 col-md-1">


        </div>

        <div class="col-xs-10 col-md-10">

            <div id="accordion" style="margin-top: 40px;">
                <div class="card-border-light">
                    <div class="card-header" id="headingOne" style="background-color: aliceblue;">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-4 col-md-4">
                                    <h2 class="mb-0" style="color:dodgerblue;">

                                        Dados Pessoais
                                        <span class="fa-stack fa-sm">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-id-card fa-stack-1x fa-inverse"></i>
                                        </span>

                                    </h2>

                                </div>


                                <div class="col-xs-8 col-md-6" style="margin-left: auto;">
                                    <div class="btn-group " role="group" aria-label="">





                                        <button class=" btn btn-link" style="color:red;" type="cancel">
                                            <a href="#" style="color: red;">Cancelar</a>
                                            <span class="fas fa-window-close"
                                                style="font-size: 25px; text-align: center;"></span>

                                        </button>





                                        <button class=" btn btn-link" style="color" type="cancel">
                                            <a href="/home">Voltar</a>
                                            <span class="fas fa-undo"
                                                style="font-size: 25px; text-align: center;"></span>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body" style="box-sizing: border-box;">

                            <ul style="list-style-type: none;">


                                <form action="/curriculo" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <div class="form-group">
<label for = "nome">Nome</label>
<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo" value="{{Auth::user()->name}}">
                        </div> --}}

                        <div class="form-group">
                            <li><strong> NOME:*&nbsp;&nbsp;&nbsp;</strong>
                                <input type="text" class="form-control" name="nome" id="nome"
                                    placeholder="Nome Completo" value="{{Auth::user()->name}}">
                            </li>
                        </div>





                        <div class="form-group">
                            <li><strong> CPF:*&nbsp;&nbsp;&nbsp;</strong>
                                <input type="text" class="form-control" maxlength="11" name="cpf" id="cpf"
                                    placeholder="CPF">
                            </li>
                        </div>




                        <div class="form-group">
                            <li><strong> RG:*&nbsp;&nbsp;&nbsp;</strong>
                                <input type="text" class="form-control" maxlength="11" name="rg" id="rg"
                                    placeholder="RG">
                            </li>
                        </div>





                        <div class="form-group">
                            <li><strong> CTPS:*&nbsp;&nbsp;&nbsp;</strong>
                                <input type="text" class="form-control" name="ctps" id="ctps" placeholder="CTPS">
                            </li>
                        </div>






                        <div class="form-group">
                            <li><strong>PRETENÇÃO SALARIAL:*&nbsp;&nbsp;&nbsp;</strong>
                                <input type="text" class="form-control" placeholder="Ex.:9999,99" name="pretsalarial"
                                    id="pretsalarial"></li>

                        </div>






                        <div class="form-group">
                            <li><strong>DATA DE NASCIMENTO:*&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"></span>
                                <input type="date" class="form-control" placeholder="Ex.: dd/mm/aaaa"
                                    name="dtnascimento" id="dtnascimento">
                        </div>
                        </li>






                        <div class="form-group">
                            <li><strong> GENERO:*&nbsp;&nbsp;&nbsp;</strong>
                                <select class="custom-select" id="genero" name="genero">
                                    <option value="" selected>Selecionar</option>
                                    <option value="F">Feminino</option>
                                    <option value="M">Masculino</option>
                                    <option value="N">Prefiro não informar</option>
                                </select></li>
                        </div>







                        <div class="form-group">
                            <li style=""><strong> NOME DA MÃE:*&nbsp;&nbsp;&nbsp;</strong>
                                <input type="text" class="form-control" name="nomemae" id="nomemae"
                                    placeholder="Nome da mãe"></li>
                        </div>








                        <div class="form-group">
                            <li><strong> NOME DO PAI:&nbsp;&nbsp;&nbsp;</strong>
                                <input type="text" class="form-control" name="nomepai" id="nomepai"
                                    placeholder="Nome do pai">
                            </li>
                        </div>





                        <div class="form-group">
                            <li><strong> DEFICIENTE FISICO?*&nbsp;&nbsp;&nbsp;</strong>
                                <select class="custom-select" id="dfisico" name="dfisico">
                                    <option value="" selected>Selecionar</option>
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                </select> </li>
                        </div>






                        <div class="form-group">
                            <li><strong> NACIONALIDADE:*&nbsp;&nbsp;&nbsp;</strong>
                                <select class="custom-select" id="nacionalidade" name="nacionalidade">
                                    <option value="" selected>Selecionar</option>
                                    <option value="1">Brasileira</option>
                                    <option value="2">Outra</option>
                                </select> </li>
                        </div>








                        <div class="form-group">
                            <li><strong> NATURALIDADE:*&nbsp;&nbsp;&nbsp;</strong>
                                <select class="custom-select" id="naturalidade" name="naturalidade">
                                    <option value="" selected>Selecionar</option>
                                    {{-- @foreach($cidades as $cid)
<option value = "{{$cid->idcidade}}">{{ $cid->nome }}</option>
                                    @endforeach --}}S
                                    @foreach(Helper::getCidades() as $cid)
                                    <option value="{{$cid->idcidade}}">{{ $cid->nome }}</option>
                                    @endforeach
                                </select> </li>
                        </div>



                        <div class="form-group">
                            <li><strong> TELEFONE 1*: &nbsp;&nbsp;&nbsp;</strong>
                                <input type="text" class="form-control" name="telefone1" id="telefone1"
                                    placeholder="Telefone 1"> </li>
                        </div>






                        <div class="form-group">
                            <li><strong>TELEFONE 2:&nbsp;&nbsp;&nbsp;</strong>
                                <input type="text" class="form-control" name="telefone2" id="telefone2"
                                    placeholder="Telefone 2"> </li>
                        </div>









                        <div class="form-group">
                            <li><strong> ESTADO CIVIL:*&nbsp;&nbsp;&nbsp;</strong>
                                <select class="custom-select" id="estadocivil" name="estadocivil">
                                    <option value="" selected>Selecionar</option>
                                    <option value="1">Solteiro(a)</option>
                                    <option value="2">Casado(a)</option>
                                    <option value="3">Divorciado(a)</option>
                                    <option value="4">Viúvo(a)</option>
                                    <option value="5">Separado(a)</option>
                                </select> </li>
                        </div>







                        <div class="form-group">
                            <li><strong> CATEGORIA DA CNH:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                <select class="custom-select" id="catcnh" name="catcnh">
                                    <option value="" selected>Selecionar</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select></li>
                        </div>






                        <div class="form-group">
                            <li><strong> UF DE ORIGEM DA CNH:&nbsp;&nbsp;&nbsp;</strong><span></span>
                                <select class="custom-select" id="ufcnh" name="ufcnh" placeholder="UF">
                                    <option value="" selected>Selecionar</option>
                                    @foreach(Helper::getEstados() as $esta)
                                    <option value="{{$esta->idestado}}">{{ $esta->nome }}</option>
                                    @endforeach
                                </select>

                                {{-- <input type="text" class="form-control" name="ufcnh" id="ufcnh" placeholder="UF"></li> --}}
                        </div>




                        <div class="form-group">
                            <li><strong> NUMERO DA CNH :&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                <input type="text" class="form-control" name="cnh" id="cnh" placeholder="CNH">
                            </li>
                        </div>




                        <div class="form-group">
                            <li><strong> OBJETIVOS :&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                <textarea class="form-control" id="sobre" rows="3" name="sobre"></textarea>
                            </li>
                        </div>







                        <div class="form-group">
                            @if(Auth::user()->foto != null)
                            <img src="{{url('storage/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}"
                                style="max-width: 50px;">
                            @endif
                            <li><strong>FOTO:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                <input type="file" class="form-control-file" id="foto" name="foto"
                                    file_extension=".jpg">
                            </li>

                        </div>
                        <br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
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
























{{-- <div class="card border">
<div class= "card-body">
<h5> Dados Pessoais</h5>
<form action="/curriculo" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col">
<div class="form-group">
<label for = "nome">Nome</label>
<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo" value="{{Auth::user()->name}}">
</div>
</div>

<div class="col">
    <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" maxlength="11" name="cpf" id="cpf" placeholder="CPF">
    </div>
</div>
<div class="col">
    <div class="form-group">
        <label for="rg">RG</label>
        <input type="text" class="form-control" maxlength="11" name="rg" id="rg" placeholder="RG">
    </div>
</div>
<div class="col">
    <div class="form-group">
        <label for="ctps">CTPS</label>
        <input type="text" class="form-control" name="ctps" id="ctps" placeholder="CTPS">
    </div>
</div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="pretsalarial">Pretensão Salarial</label>
            <input type="text" class="form-control" placeholder="Ex.:9999,99" name="pretsalarial" id="pretsalarial">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="dtnascimento">Data de Nascimento</label>
            <input type="data" class="form-control" placeholder="Ex.: dd/mm/aaaa" name="dtnascimento" id="dtnascimento">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="dtnasc">Gênero</label>
            <select class="custom-select" id="genero" name="genero">
                <option value="" selected>Selecionar</option>
                <option value="F">Feminino</option>
                <option value="M">Masculino</option>
                <option value="N">Prefiro não informar</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="nomemae">Nome da mãe</label>
            <input type="text" class="form-control" name="nomemae" id="nomemae" placeholder="Nome da mãe">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="nomepai">Nome do pai</label>
            <input type="text" class="form-control" name="nomepai" id="nomepai" placeholder="Nome do pai">
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="dfisico">Deficiente físico?</label>
            <select class="custom-select" id="dfisico" name="dfisico">
                <option value="" selected>Selecionar</option>
                <option value="1">Sim</option>
                <option value="2">Não</option>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="nacionalidade">Nacionalidade</label>
            <select class="custom-select" id="nacionalidade" name="nacionalidade">
                <option value="" selected>Selecionar</option>
                <option value="1">Brasileira</option>
                <option value="2">Outra</option>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="naturalidade">Naturalidade</label>
            <select class="custom-select" id="naturalidade" name="naturalidade">
                <option value="" selected>Selecionar</option>
                @foreach($cidades as $cid)
                <option value="{{$cid->idcidade}}">{{ $cid->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="telefone1">Telefone 1 *</label>
            <input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="Telefone 1">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="telefone2">Telefone 2</label>
            <input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="Telefone 2">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="estadocivil">Estado Civil</label>
            <select class="custom-select" id="estadocivil" name="estadocivil">
                <option value="" selected>Selecionar</option>
                <option value="1">Solteiro(a)</option>
                <option value="2">Casado(a)</option>
                <option value="3">Divorciado(a)</option>
                <option value="4">Viúvo(a)</option>
                <option value="5">Separado(a)</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="catcnh">Categoria CNH</label>
            <select class="custom-select" id="catcnh" name="catcnh">
                <option value="" selected>Selecionar</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="ufcnh">UF de origem CNH</label>
            <input type="text" class="form-control" name="ufcnh" id="ufcnh" placeholder="UF">
        </div>
    </div>
    <div class="col">
        <div class="col">
            <div class="form-group">
                <label for="cnh">Número CNH</label>
                <input type="text" class="form-control" name="cnh" id="cnh" placeholder="CNH">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="sobre">Objetivos</label>
    <textarea class="form-control" id="sobre" rows="3" name="sobre"></textarea>
</div>
<div class="form-group">
    @if(Auth::user()->foto != null)
    <img src="{{url('storage/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}" style="max-width: 50px;">
    @endif
    <label for="foto">Foto</label>
    <input type="file" class="form-control-file" id="foto" name="foto" file_extension=".jpg">
</div>
<br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
</form>
</div>
</div> --}}

@endsection