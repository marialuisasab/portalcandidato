@extends('adminlte::page')

<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<script src="/js/Dadospessoais/edit.js"></script>
<script src="/js/Dadospessoais/validacaoCPFexistenteEdit.js"></script>
<script src="/jquerymask/jquerymasky.js"></script>
<script src="/jqueryMaskMoney/jquery.maskMoney.js" type="text/javascript"></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js " type=" text / javascript "> </script>
{{-- <script src="/js/Dadospessoais/edit.js"></script> --}}
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
									<h2 class="mb-0" style="color:dodgerblue; font-size: 25px;">
										Dados Pessoais
										<span class="fa-stack fa-sm">
											<i class="fas fa-circle fa-stack-2x"></i>
											<i class="fas fa-id-card fa-stack-1x fa-inverse"></i>
										</span>
									</h2>
								</div>


								<div class="col-xs-7 col-2" style="margin-left: auto;">
									{{-- <button class=" btn btn-link">
											<a href="/curriculo/editar/{{Auth::user()->id}}">Editar</a>
									<span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>
									</button> --}}

									<button class=" btn btn-secondary btn-sm" style="height:30px; margin-top: 10px;"
										id="botaovoltar" title="Voltar " value="">
										<a style="color: white;" href="/curriculo">Voltar<span class="fas fa-undo"
												style="padding-left: 5px; color:white; font-size:9px;"></span></a>
									</button>
								</div>

							</div>
						</div>
					</div>


					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body" style="box-sizing: border-box;">
							<ul style="list-style-type: none;">
								<form action="/curriculo/{{$c->users_id}}" method="POST" enctype="multipart/form-data"
									id="idformdados">
									@csrf
									{{-- <div class="form-group">
<label for = "nome">Nome</label>
<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo" value="{{Auth::user()->name}}">
						</div> --}}

						<div class="form-group">
							<li><strong> NOME:*&nbsp;&nbsp;&nbsp;</strong>
								<input type="text" class="form-control" name="nome" id="nome" autofocus
									placeholder="Nome Completo" value="{{Auth::user()->name}}" title="Nome">
							</li>
							<div class="invalid-feedback" id="mensnome" style="display: none;">
								Você precisa preencher o nome!
							</div>
						</div>



						<div class="form-group" id="id_user" data_value="{{$c->users_id}}">
							<li id="curriculo_CPF" data_value="{{Helper::getIdCurriculomenu()}}"><strong>
									CPF:*&nbsp;&nbsp;&nbsp;</strong>
								<input type="text" class="form-control" maxlength="11" name="cpf" id="cpf"
									placeholder="123.456.789-10" value="{{$c->cpf}}" title="Documento CPF">
								<div class="invalid-feedback" id="menscpf" style="display: none;">
									Você precisa preencher o CPF!
								</div>
								<div class="invalid-feedback" id="menscpfvalido" style="display: none;">
									Valor de CPF invalido! Por favor, insira um CPF valido.
								</div>
								<div class="invalid-feedback" id="menscpfexiste" style="display: none;">
									O CPF inserido já pertence a um cadastro no banco de dados!
								</div>
							</li>
						</div>


						<div class="form-group">
							<li><strong> RG:*&nbsp;&nbsp;&nbsp;</strong>
								<input type="text" class="form-control" maxlength="11" name="rg" id="rg"
									placeholder="RG" value="{{$c->rg}}" title="Documento de Identidade">
								<div class="invalid-feedback" id="mensrg" style="display: none;">
									Você precisa preencher o RG!
								</div>
							</li>
						</div>


						<div class="form-group">
							<li><strong> CTPS:&nbsp;&nbsp;&nbsp;</strong>
								<input type="text" class="form-control" name="ctps" id="ctps" placeholder="CTPS"
									value="{{$c->ctps}}" title="Numero da Carteira de Trabalho">
							</li>
						</div>

						<div class="form-group">
							<li><strong>PRETENÇÃO SALARIAL:*&nbsp;&nbsp;&nbsp;</strong>
								<input type="text" class="form-control " placeholder="Ex.:9999,99" name="pretsalarial"
									id="pretsalarial" value="{{Helper::getPretensao($c->pretsalarial)}}"
									title="Valor Pretendido para Salário">
								<div class="invalid-feedback" id="menspretsala" style="display: none;">
									Você precisa preencher a sua pretenção salarial!
								</div>
							</li>

						</div>


						<div class="form-group">
							<li><strong>DATA DE
									NASCIMENTO:*&nbsp;&nbsp;&nbsp;</strong><span></span>
								<input type="date" class="form-control" placeholder="Ex.: dd/mm/aaaa"
									name="dtnascimento" id="dtnascimento" value="{{$c->dtnascimento}}"
									title="Data de Nascimento">
								<div class="invalid-feedback" id="mensdtnasc" style="display: none;">
									Você precisa preencher a data do seu nascimento!
								</div>
						</div>
						</li>



						<div class="form-group">
							<li><strong> GENERO:*&nbsp;&nbsp;&nbsp;</strong>
								<select class="form-control" id="genero" name="genero" value="{{$c->genero}}"
									title="Genero">
									<option value="" id="idselecionargen" {{$c->genero == null ? 'selected' : ''}}>
										Selecionar</option>
									<option value="F" id="idselecionargen" {{$c->genero == 'F' ? 'selected' : ''}}>
										Feminino</option>
									<option value="M" id="idselecionargen" {{$c->genero == 'M' ? 'selected' : ''}}>
										Masculino</option>
									<option value="N" id="idselecionargen" {{$c->genero == 'N' ? 'selected' : ''}}>
										Prefiro não informar</option>
								</select>
								<div class="invalid-feedback" id="mensgenero" style="display: none;">
									Você precisa preencher o genero!
								</div>
							</li>
						</div>

						<div class="form-group">
							<li style=""><strong> NOME DA MÃE:*&nbsp;&nbsp;&nbsp;</strong>
								<input type="text" class="form-control" name="nomemae" id="nomemae"
									placeholder="Nome da mãe" value="{{$c->nomemae}}" title="Nome da Sua Mãe">
								<div class="invalid-feedback" id="mensmae" style="display: none;">
									Você precisa preencher o nome de sua mãe!
								</div>
							</li>
						</div>



						<div class="form-group">
							<li><strong> NOME DO PAI:&nbsp;&nbsp;&nbsp;</strong>
								<input type="text" class="form-control" name="nomepai" id="nomepai"
									placeholder="Nome do pai" value="{{$c->nomepai}}" title="Nome do Seu Pai">
							</li>
						</div>


						<div class="form-group">
							<li><strong> PESSOA COM DEFICIÊNCIA:*&nbsp;&nbsp;&nbsp;</strong>
								<select class="form-control" id="dfisico" name="dfisico" value="{{$c->dfisico}}"
									title="Deficiência Fisíca">
									<option value="" {{$c->dfisico == null ? 'selected' : ''}} selected>Selecionar
									</option>
									<option value="1" {{$c->dfisico == '1' ? 'selected' : ''}}>
										Sim</option>
									<option value="2" {{$c->dfisico == '2' ? 'selected' : ''}}>
										Não</option>
								</select>
								<div class="invalid-feedback" id="mensdtfisico" style="display: none;">
									Você precisa preencher se é uma pessoa com deficiência ou não.
								</div>
							</li>
						</div>

						@if ($c->dfisico =='1')
						<div class="form-group" style="" id="form_deficiencia">
							<li><strong> TIPO DE DEFICIÊNCIA: &nbsp;&nbsp;&nbsp;</strong>
								<input type="text" class="form-control" name="tpdeficiencia" id="tddefice"
									placeholder="Tipo de deficiência" title="Tipo de deficiência"
									value="{{$c->tpdeficiencia}}">
								<div class="invalid-feedback" id="menstpdeficiencia" style="display: none;">
									Você precisa preencher o tipo de deficiência!
								</div>
							</li>
						</div>
						@else
						<div class="form-group" style="display: none;" id="form_deficiencia">
							<li><strong> TIPO DE DEFICIÊNCIA: &nbsp;&nbsp;&nbsp;</strong>
								<input type="text" class="form-control" name="tpdeficiencia" id="tddefice"
									placeholder="Tipo de deficiência" title="Tipo de deficiência"
									value="{{$c->tpdeficiencia}}">
							</li>
							<div class="invalid-feedback" id="menstpdeficiencia" style="display: none;">
								Você precisa preencher o tipo de deficiência!
							</div>
						</div>
						@endif



						<div class="form-group">
							<li><strong> NACIONALIDADE:*&nbsp;&nbsp;&nbsp;</strong>
								<select class="form-control" id="nacionalidade" name="nacionalidade"
									value="{{$c->nacionalidade}}" title="Informe Sua Nacionalidade">
									{{-- <option value="">Selecionar</option>   
									<option value="1">Brasileira</option>
									<option value="2">Outra</option> --}}


									<option value="1">Brasil</option>
									{{-- @foreach(Helper::getPai() as $pai)
									<option value="{{$pai->idpais}}"
									{{ $c->nacionalidade == $pai->idpais ? 'selected' : '' }}>
									{{ $pai->nome }}</option>
									@endforeach --}}
								</select>
								<div class="invalid-feedback" id="mensnacional" style="display: none;">
									Você precisa selecionar a sua nacionalidade!
								</div>
							</li>
						</div>


						{{-- <div class="form-group">
							<li><strong> NATURALIDADE:*&nbsp;&nbsp;&nbsp;</strong>
								<select class="custom-select" id="naturalidade" name="naturalidade"
									value="{{$c->naturalidade}}">
						<option value="">Selecionar:</option>
						@foreach(Helper::getCidades() as $cid)
						<option value="{{$cid->idcidade}}" {{ $c->naturalidade == $cid->idcidade ? 'selected' : '' }}>
							{{ $cid->nome }}</option>
						@endforeach

						</select> </li>
					</div> --}}

					<div class="form-group">
						<li>
							<div class="container">
								<div class="row">
									<div class="col-sm-6" style="text-align: start;">
										<strong> ESTADO DE NATURALIDADE:*&nbsp;&nbsp;&nbsp;</strong>
										<select class="form-control " id="natural" name="natural"
											title="Estado de Origem">
											<option value="" selected>Selecionar</option>
											@foreach(Helper::getEstados() as $est)
											<option value="{{$est->idestado}}" @foreach (Helper ::getCidades() as
												$cidades)
												{{(($est->idestado == $cidades->estado_idestado)&&($cidades->idcidade == $c->naturalidade)) ? 'selected' : '' }}
												@endforeach>
												{{ $est->nome }}
											</option>
											@endforeach
										</select>
										<div class="invalid-feedback" id="mensnatural" style="display: none;">
											Você precisa selecionar a sua naturalidade!
										</div>
									</div>
									<div class="col-sm-6">
										<strong> CIDADE DE NATURALIDADE:*&nbsp;&nbsp;&nbsp;</strong>
										<select class="form-control" id="naturalidade" name="naturalidade"
											title="Cidade de Origem">
											<option value="" selected>Selecionar</option>
											@foreach (Helper::getCidades() as $cida)
											@if ($cida->idcidade == $c->naturalidade)
											@foreach (Helper::getCidades() as $cid)
											@if ($cid->estado_idestado == $cida ->estado_idestado)
											<option value="{{$cid->idcidade}}"
												{{ $cid->idcidade == $c->naturalidade ? 'selected' : '' }}>
												{{ $cid->nome }}</option>
											@else
											@endif
											@endforeach
											@else
											@endif
											@endforeach
										</select>
										<div class="invalid-feedback" id="mensnaturalidade" style="display: none;">
											Você precisa selecionar a sua naturalidade!
										</div>
									</div>
								</div>
							</div>
						</li>
					</div>


					<div class="form-group">
						<li><strong> TELEFONE (PRINCIPAL):*&nbsp;&nbsp;&nbsp;</strong>
							<input type="text" class="form-control" name="telefone1" id="telefone1"
								placeholder="(DDD)9****-**** OU (DDD)****-****" value="{{$c->telefone1}}"
								title="Telefone Principal(Fixo ou Celular)">
							<div class="invalid-feedback" id="menstelefone" style="display: none;">
								Você precisa selecionar o telefone!
							</div>
						</li>
					</div>

					<div class="form-group">
						<li><strong>TELEFONE (2º OPÇÃO):&nbsp;&nbsp;&nbsp;</strong>
							<input type="text" class="form-control" name="telefone2" id="telefone2"
								placeholder="(DDD)9****-**** OU (DDD)****-****" value="{{$c->telefone2}}"
								title="Segunda Opção(Fixo ou Celular)">
						</li>
					</div>


					<div class=" form-group">
						<li><strong> ESTADO CIVIL:*&nbsp;&nbsp;&nbsp;</strong>
							<select class="form-control" id="estadocivil" name="estadocivil" value="{{$c->estadocivil}}"
								title="Estado Civil">
								<option name="selectestadocivil" value="" {{$c->estadocivil == null ? 'selected' : ''}}>
									Selecionar</option>
								<option name="selectestadocivil" value="1" {{$c->estadocivil == '1' ? 'selected' : ''}}>
									Solteiro(a)</option>
								<option name="selectestadocivil" value="2" {{$c->estadocivil == '2' ? 'selected' : ''}}>
									Casado(a)</option>
								<option name="selectestadocivil" value="3" {{$c->estadocivil == '3' ? 'selected' : ''}}>
									Divorciado(a)</option>
								<option name="selectestadocivil" value="4" {{$c->estadocivil == '4' ? 'selected' : ''}}>
									Viúvo(a)</option>
								<option name="selectestadocivil" value="5" {{$c->estadocivil == '5' ? 'selected' : ''}}>
									Separado(a)</option>
							</select>
							<div class="invalid-feedback" id="mensestadociv" style="display: none;">
								Você precisa selecionar o seu estado civil!
							</div>
						</li>
					</div>

					@if (($c->catcnh == null) && ($c->ufcnh == null) && ($c->cnh == null))
					<div class="form-group">
						<li><strong>POSSUI CNH?&nbsp;&nbsp;&nbsp;</strong><span> </span>
							<div class="form-check form-check-inline" id="idposscnh" name="idposscnh">
								<input class="form-check-input" type="radio" name="tenhocnh" id="tenhocnh" value="1">
								Sim&nbsp;&nbsp;&nbsp;
								{{-- <label class="form-check-label">Sim&nbsp;&nbsp;&nbsp;</label> --}}


								<input class="form-check-input" type="radio" name="tenhocnh" id="tenhocnh" value="2">
								Não
								{{-- <label class="form-check-label">Não</label> --}}
							</div>
						</li>
					</div>
					@else

					@endif


					@if (($c->catcnh == null) && ($c->ufcnh == null) && ($c->cnh == null))
					<div class="form-group" style="display: none;" id="selcatcnh">
						<li><strong> CATEGORIA CNH:&nbsp;&nbsp;&nbsp;</strong><span> </span>
							<select class="custom-select" id="catcnh" name="catcnh" value="{{$c->catcnh}}"
								title="Categoria da CNH">
								<option value="" {{$c->catcnh == null ? 'selected' : ''}}>Selecionar
								</option>
								<option value="A" {{$c->catcnh == 'A' ? 'selected' : '' }}>A</option>
								<option value="B" {{$c->catcnh == 'B' ? 'selected' : '' }}>B</option>
								<option value="C" {{$c->catcnh == 'C' ? 'selected' : '' }}>C</option>
								<option value="D" {{$c->catcnh == 'D' ? 'selected' : '' }}>D</option>
								<option value="E" {{$c->catcnh == 'E' ? 'selected' : '' }}>E</option>
								<option value="AB" {{$c->catcnh == 'AB' ? 'selected' : '' }}>AB</option>
								<option value="AC" {{$c->catcnh == 'AC' ? 'selected' : '' }}>AC</option>
								<option value="AD" {{$c->catcnh == 'AD' ? 'selected' : '' }}>AD</option>
								<option value="AE" {{$c->catcnh == 'AE' ? 'selected' : '' }}>AE</option>
							</select>
							<div class="invalid-feedback" id="menscnh" style="display: none;">
								Você precisa selecionar o o tipo de CNH que possui!
							</div>
						</li>
					</div>
					@else
					<div class="form-group" id="selcatcnh">
						<li><strong> CATEGORIA CNH:&nbsp;&nbsp;&nbsp;</strong><span> </span>
							<select class="custom-select" id="catcnh" name="catcnh" value="{{$c->catcnh}}"
								title="Categoria da CNH">
								<option value="" {{$c->catcnh == null ? 'selected' : ''}}>Selecionar
								</option>
								<option value="A" {{$c->catcnh == 'A' ? 'selected' : '' }}>A</option>
								<option value="B" {{$c->catcnh == 'B' ? 'selected' : '' }}>B</option>
								<option value="C" {{$c->catcnh == 'C' ? 'selected' : '' }}>C</option>
								<option value="D" {{$c->catcnh == 'D' ? 'selected' : '' }}>D</option>
								<option value="E" {{$c->catcnh == 'E' ? 'selected' : '' }}>E</option>
								<option value="AB" {{$c->catcnh == 'AB' ? 'selected' : '' }}>AB</option>
								<option value="AC" {{$c->catcnh == 'AC' ? 'selected' : '' }}>AC</option>
								<option value="AD" {{$c->catcnh == 'AD' ? 'selected' : '' }}>AD</option>
								<option value="AE" {{$c->catcnh == 'AE' ? 'selected' : '' }}>AE</option>
							</select></li>
					</div>
					@endif



					@if (($c->catcnh == null) && ($c->ufcnh == null) && ($c->cnh == null))
					<div class="form-group" style="display: none;" id="seleorigcnh">
						<li><strong> UF DE ORIGEM DA CNH:&nbsp;&nbsp;&nbsp;</strong><span></span>
							<select class="custom-select" id="ufcnh" name="ufcnh" value="{{$c->ufcnh}}"
								title="Estado de Origem da CNH">
								<option value="">Selecionar:</option>
								@foreach(Helper::getEstados() as $est)
								<option value="{{$est->idestado}}" {{ $c->ufcnh == $est->idestado ? 'selected' : '' }}>
									{{ $est->nome }}</option>
								@endforeach
							</select>
							{{-- <input type="text" class="form-control" name="ufcnh" id="ufcnh" placeholder="UF"
									value="{{$c->ufcnh}}"> --}}
						</li>
					</div>
					@else
					<div class="form-group" id="seleorigcnh">
						<li><strong> UF DE ORIGEM DA CNH:&nbsp;&nbsp;&nbsp;</strong><span></span>
							<select class="custom-select" id="ufcnh" name="ufcnh" value="{{$c->ufcnh}}"
								title="Estado de Origem da CNH">
								<option value="">Selecionar:</option>
								@foreach(Helper::getEstados() as $est)
								<option value="{{$est->idestado}}" {{ $c->ufcnh == $est->idestado ? 'selected' : '' }}>
									{{ $est->nome }}</option>
								@endforeach
							</select>
							{{-- <input type="text" class="form-control" name="ufcnh" id="ufcnh" placeholder="UF"
															value="{{$c->ufcnh}}"> --}}
						</li>
					</div>

					@endif



					@if (($c->catcnh == null) && ($c->ufcnh == null) && ($c->cnh == null))
					<div class="form-group" style="display: none;" id="numcnh">
						<li><strong> NUMERO DA CNH:&nbsp;&nbsp;</strong><span> </span>
							<input type="text" class="form-control" name="cnh" id="cnh" placeholder="CNH"
								value="{{$c->cnh}}" title="Numero da CNH">
						</li>
					</div>
					@else
					<div class="form-group" id="numcnh">
						<li><strong> NUMERO DA CNH :&nbsp;&nbsp;&nbsp;</strong><span> </span>
							<input type="text" class="form-control" name="cnh" id="cnh" placeholder="CNH"
								value="{{$c->cnh}}" title="Numerp da CNH">
						</li>
					</div>
					@endif



					<div class="form-group">
						<li style="word-break: break-word;"><strong> OBJETIVOS :&nbsp;&nbsp;&nbsp;</strong>
							<textarea class="form-control" id="sobre" rows="3" name="sobre" value=""
								title="Objetivos Pessoais"
								placeholder="Descreva seus objetivos...">{{$c->sobre}}</textarea>
						</li>
					</div>


					<div class="form-group">
						<li><strong>FOTO:&nbsp;&nbsp;&nbsp;</strong><span> </span>
						@if(Auth::user()->foto != null)
						<img src="{{url('/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}"
							style="max-width: 50px;">
							<p>Para trocar a foto, basta anexar abaixo uma nova imagem.</p>
						@else
							<p>Anexe sua foto aqui, dessa forma seu currículo ficará mais atrativo, o que aumenta a possibilidade de ser selecionado.</p>
						@endif
						
							
							{{-- observação....... --}}
							<input type="file" class="form-control-file" id="foto" name="foto" file_extension=".jpg"
								accept='image/*' value="{{$c->idcurriculo}}" title="Alterar Foto de Perfil">
						</li>
					</div>
					{{-- 
						@if($errors->any())
						<div class="card-footer">
							@foreach($errors->all() as $error)
							<div class="alert alert-danger" role="alert">
								{{$error}}
				</div>
				@endforeach
			</div>
			@endif --}}


			{{-- @if($errors->any())
				<div class="card-footer">
					<div class="alert alert-danger" role="alert">
						{{$success}}
		</div>
	</div>
	@endif --}}

	<br>

	<div class="form-group" style="text-align: end;">
		<button type="submit" class="btn btn-primary" id="botaosalvarend">Salvar<span class="fas fa-save"
				style="padding-left: 15px;" title="Confirmar Alterações"></button>
		<button class=" btn btn-danger" type="cancel" title="Cancelar Edição">
			<a href="/curriculo" style="color:white;">Cancelar<span class="fas fa-window-close"
					style="padding-left: 15px;"></span></a>
		</button>
	</div>
	</form>
	</ul>
</div>
</div>

</div>
</div>
</div>
<div class="col-xs-1 col-md-1">


</div>
</div>
</div>
@endsection