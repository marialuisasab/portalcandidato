@extends('adminlte::page')

<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<script src="/js/Dadospessoais/edit.js"></script>
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
										title="Voltar ">
										<a style="color: white;" href="/curriculo">Voltar<span class="fas fa-undo"
												style="padding-left: 5px; color:white; font-size:9px;"></span></a>
									</button>
								</div>

							</div>
						</div>
					</div>


					<div id=" collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
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



						<div class="form-group">
							<li><strong> CPF:*&nbsp;&nbsp;&nbsp;</strong>
								<input type="text" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : ''}}"
									maxlength="11" name="cpf" id="cpf" placeholder="CPF" value="{{$c->cpf}}"
									title="Documento CPF">
								<div class="invalid-feedback" id="menscpf" style="display: none;">
									Você precisa preencher o CPF!
								</div>
							</li>
						</div>


						<div class="form-group">
							<li><strong> RG:*&nbsp;&nbsp;&nbsp;</strong>
								<input type="text" class="form-control {{$errors->has('rg') ? 'is-invalid' : ''}}"
									maxlength="11" name="rg" id="rg" placeholder="RG" value="{{$c->rg}}"
									title="Documento de Identidade">
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
								<input type="text"
									class="form-control {{$errors->has('pretsalarial') ? 'is-invalid' : ''}}"
									placeholder="Ex.:9999,99" name="pretsalarial" id="pretsalarial"
									value="{{Helper::getPretensao($c->pretsalarial)}}"
									title="Valor Pretendido para Salário">
								<div class="invalid-feedback" id="menspretsala" style="display: none;">
									Você precisa preencher a sua pretenção salarial!
								</div>
							</li>

						</div>


						<div class="form-group">
							<li><strong>DATA DE
									NASCIMENTO:*&nbsp;&nbsp;&nbsp;</strong><span></span>
								<input type="date"
									class="form-control {{$errors->has('dtnascimento') ? 'is-invalid' : ''}}"
									placeholder="Ex.: dd/mm/aaaa" name="dtnascimento" id="dtnascimento"
									value="{{$c->dtnascimento}}" title="Data de Nascimento">
								<div class="invalid-feedback" id="mensdtnasc" style="display: none;">
									Você precisa preencher a data do seu nascimento!
								</div>
						</div>
						</li>



						<div class="form-group">
							<li><strong> GENERO:*&nbsp;&nbsp;&nbsp;</strong>
								<select class="form-control {{$errors->has('genero') ? 'is-invalid' : ''}}" id="genero"
									name="genero" value="{{$c->genero}}" title="Genero">
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
								<input type="text" class="form-control {{$errors->has('nomemae') ? 'is-invalid' : ''}}"
									name="nomemae" id="nomemae" placeholder="Nome da mãe" value="{{$c->nomemae}}"
									title="Nome da Sua Mãe">
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
							<li><strong> DEFICIENTE FISICO?*&nbsp;&nbsp;&nbsp;</strong>
								<select class="form-control {{$errors->has('dfisico') ? 'is-invalid' : ''}}"
									id="dfisico" name="dfisico" value="{{$c->dfisico}}" title="Deficiência Fisíca">
									<option value="" {{$c->dfisico == null ? 'selected' : ''}} selected>Selecionar
									</option>
									<option value="1" {{$c->dfisico == '1' ? 'selected' : ''}}>
										Sim</option>
									<option value="2" {{$c->dfisico == '2' ? 'selected' : ''}}>
										Não</option>
								</select>
								<div class="invalid-feedback" id="mensdtfisico" style="display: none;">
									Você precisa preencher se é deficiente fisico!
								</div>
							</li>
						</div>


						<div class="form-group">
							<li><strong> NACIONALIDADE:*&nbsp;&nbsp;&nbsp;</strong>
								<select class="form-control {{$errors->has('nacionalidade') ? 'is-invalid' : ''}}"
									id="nacionalidade" name="nacionalidade" value="{{$c->nacionalidade}}"
									title="Informe Sua Nacionalidade">
									{{-- <option value="">Selecionar</option>   
									<option value="1">Brasileira</option>
									<option value="2">Outra</option> --}}


									<option value="">Selecionar:</option>
									@foreach(Helper::getPai() as $pai)
									<option value="{{$pai->idpais}}"
										{{ $c->nacionalidade == $pai->idpais ? 'selected' : '' }}>
										{{ $pai->nome }}</option>
									@endforeach
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
						<li><strong> NATURALIDADE:*&nbsp;&nbsp;&nbsp;</strong>
							<div class="container">
								<div class="row">
									<div class="col-sm" style="text-align: start;">

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
									<div class="col-sm">
										<select
											class="form-control {{$errors->has('naturalidade') ? 'is-invalid' : ''}}"
											id="naturalidade" name="naturalidade" title="Cidade de Origem">
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
						<li><strong> TELEFONE PRINCIPAL:*&nbsp;&nbsp;&nbsp;</strong>
							<input type="text" class="form-control {{$errors->has('telefone1') ? 'is-invalid' : ''}}"
								name="telefone1" id="telefone1" placeholder="Telefone 1" value="{{$c->telefone1}}"
								title="Telefone Principal">
							<div class="invalid-feedback" id="menstelefone" style="display: none;">
								Você precisa selecionar o telefone!
							</div>
						</li>
					</div>

					<div class="form-group">
						<li><strong>TELEFONE 2:&nbsp;&nbsp;&nbsp;</strong>
							<input type="text" class="form-control" name="telefone2" id="telefone2"
								placeholder="Telefone 2" value="{{$c->telefone2}}" title="Segunda Opção de Telefone">
						</li>
					</div>


					<div class=" form-group">
						<li><strong> ESTADO CIVIL:*&nbsp;&nbsp;&nbsp;</strong>
							<select class="form-control {{$errors->has('estadocivil') ? 'is-invalid' : ''}}"
								id="estadocivil" name="estadocivil" value="{{$c->estadocivil}}" title="Estado Civil">
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
							</select></li>
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
						@if(Auth::user()->foto != null)
						<img src="{{url('/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}"
							style="max-width: 50px;">
						@endif
						<li><strong>FOTO:&nbsp;&nbsp;&nbsp;</strong><span> </span>
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
		<button type="submit" class="btn btn-outline-primary" id="botaosalvarend">Salvar<span class="fas fa-save"
				style="padding-left: 15px;" title="Confirmar Alterações"></button>
		<button class=" btn btn-outline-danger" type="cancel" title="Cancelar Edição">
			<a href="/curriculo">Cancelar<span class="fas fa-window-close"
					style="padding-left: 15px; color:red;"></span></a>
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












































{{-- 
<div class="card border">
<div class= "card-body">  
<h5>Editar Dados Pessoais</h5>
<form action="/curriculo/{{$c->users_id}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
	<div class="col">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo"
				value="{{Auth::user()->name}}">
		</div>
	</div>

	<div class="col">
		<div class="form-group">
			<label for="cpf">CPF</label>
			<input type="text" class="form-control" maxlength="11" name="cpf" id="cpf" value="{{$c->cpf}}"
				placeholder="CPF">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="rg">RG</label>
			<input type="text" class="form-control" maxlength="11" name="rg" id="rg" placeholder="RG"
				value="{{$c->rg}}">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="ctps">CTPS</label>
			<input type="text" class="form-control" name="ctps" id="ctps" placeholder="CTPS" value="{{$c->ctps}}">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label for="pretsalarial">Pretensão Salarial</label>
			<input type="text" class="form-control" placeholder="Ex.:9999,99" name="pretsalarial" id="pretsalarial"
				value="{{str_replace('.',',',$c->pretsalarial)}}">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="dtnascimento">Data de Nascimento</label>
			<input type="text" class="form-control" placeholder="Ex.: dd/mm/aaaa" name="dtnascimento" id="dtnascimento"
				value="{{date_format(new DateTime($c->dtnascimento), 'd/m/Y')}}">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="genero">Gênero</label>
			<select class="custom-select" id="genero" name="genero" value="{{$c->genero}}">
				<option value="">Selecionar</option>
				<option value="1">Feminino</option>
				<option value="2">Masculino</option>
				<option value="3">Prefiro não informar</option>
			</select>
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label for="nomemae">Nome da mãe</label>
			<input type="text" class="form-control" name="nomemae" id="nomemae" placeholder="Nome da mãe"
				value="{{$c->nomemae}}">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="nomepai">Nome do pai</label>
			<input type="text" class="form-control" name="nomepai" id="nomepai" placeholder="Nome do pai"
				value="{{$c->nomepai}}">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label for="dfisico">Deficiente físico?</label>
			<select class="custom-select" id="dfisico" name="dfisico" value="{{$c->dfisico}}">
				<option value="" selected>Selecionar</option>
				<option value="1">Sim</option>
				<option value="2">Não</option>
			</select>
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="nacionalidade">Nacionalidade</label>
			<select class="custom-select" id="nacionalidade" name="nacionalidade" value="{{$c->nacionalidade}}">
				<option value="" selected>Selecionar</option>
				<option value="1">Brasileira</option>
				<option value="2">Outra</option>
			</select>
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="naturalidade">Naturalidade</label>
			<select class="custom-select" id="naturalidade" name="naturalidade" value="{{$c->naturalidade}}">
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
			<input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="Telefone 1"
				value="{{$c->telefone1}}">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="telefone2">Telefone 2</label>
			<input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="Telefone 2"
				value="{{$c->telefone2}}">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="estadocivil">Estado Civil</label>
			<select class="custom-select" id="estadocivil" name="estadocivil" value="{{$c->estadocivil}}">
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
			<select class="custom-select" id="catcnh" name="catcnh" value="{{$c->catcnh}}">
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
			<input type="text" class="form-control" name="ufcnh" id="ufcnh" placeholder="UF" value="{{$c->ufcnh}}">
		</div>
	</div>
	<div class="col">
		<div class="col">
			<div class="form-group">
				<label for="cnh">Número CNH</label>
				<input type="text" class="form-control" name="cnh" id="cnh" placeholder="CNH" value="{{$c->cnh}}">
			</div>
		</div>
	</div>
</div>
<div class="form-group">
	<label for="sobre">Objetivos</label>
	<textarea class="form-control" id="sobre" rows="3" name="sobre" value="{{$c->sobre}}"></textarea>
</div>


<div class="form-group">
	@if(Auth::user()->foto != null)
	<img src="{{url('storage/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}" style="max-width: 50px;">
	@endif
	<label for="foto">Foto</label>
	<input type="file" class="form-control-file" id="foto" name="foto" file_extension=".jpg">
</div>
<input type="hidden" id="id" name="idcurriculo" value="{{$c->idcurriculo}}">
<br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
</form>
</div>
</div> --}}

@endsection