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
										Endereço
										<span class="fa-stack fa-sm">
											<i class="fas fa-circle fa-stack-2x"></i>
											<i class="fas fa-map-marked-alt fa-stack-1x fa-inverse"></i>
										</span>

									</h2>

								</div>


								<div class="col-xs-8 col-md-6" style="margin-left: auto;">
									<div class="btn-group " role="group" aria-label="">
										{{-- <button class=" btn btn-link">
											<a href="/curriculo/editar/{{Auth::user()->id}}" >Editar</a>
										<span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

										</button> --}}





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


								<form action="/endereco" method="POST" enctype="multipart/form-data">
									@csrf

									<div class="form-group">
										<li><strong> CEP*:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" name="cep" id="cep"
												placeholder="Informe o seu CEP">
										</li>
									</div>




									<div class="form-group">
										<li><strong> LOGRADOURO*:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" name="logradouro" id="logradouro"
												placeholder="Ex.: Rua/Praça/ Ladeira ...">
										</li>
									</div>





									<div class="form-group">
										<li><strong> BAIRRO*:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" name="bairro" id="bairro"
												placeholder="Informe o seu bairro">
										</li>
									</div>




									<div class="form-group">
										<li><strong> NUMERO*:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" name="numero" id="numero"
												placeholder="numero">
										</li>
									</div>


									{{-- complemento  definicao pendente --}}
									<div class="form-group">
										<li><strong>COMPLEMENTO:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control"
												placeholder="Ex.:Casa, apartamento, etc..." name="complemento"
												id="complemento"></li>

									</div>




									<div class="form-group">
										<li><strong>CIDADE*:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"></span>
											<select class="custom-select" id="cidade" name="cidade_idcidade">
												<option value="" selected>Selecionar</option>
												@foreach(Helper::getCidades() as $cid)
												<option value="{{$cid->idcidade}}">{{ $cid->nome }}</option>
												@endforeach
											</select>
										</li>
									</div>






									<div class="form-group">
										<li><strong> ESTADO*:&nbsp;&nbsp;&nbsp;</strong>
											<select class="custom-select" id="estado" name="estado_idestado">
												<option value="" selected>Selecionar</option>
												@foreach(Helper::getEstados() as $est)
												<option value="{{$est->idestado}}">{{ $est->uf }}</option>
												@endforeach
											</select></li>
									</div>








									<div class="form-group">
										<li style=""><strong> PAÍS:&nbsp;&nbsp;&nbsp;</strong>
											<select class="custom-select" id="pais_idpais" name="pais_idpais">
												<option value="" selected>País</option>
												<option value="1">Brasil</option>
												<option value="2">Outro</option>
											</select> </li>
									</div>



									<div class="form-group">

										<li><strong>DISPONIBILIDADE DE MUDANÇA PARA OUTRO ESTADO OU
												CIDADE?:&nbsp;&nbsp;&nbsp;</strong><span> </span>

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

									</div>

									@if($errors->any())
									<div class="card-footer">
										@foreach($errors->all() as $error)
										<div class="alert alert-danger" role="alert">
											{{$error}}
										</div>
										@endforeach
									</div>
									@endif

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























@endsection





{{-- 

<div class="card border">
	<div class="card-body">
		<h5>Cadastrar Endereço</h5>
		<form action="/endereco" method="POST">
			@csrf
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="cep">CEP *</label>
						<input type="text" class="form-control" name="cep" placeholder="CEP">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="logradouro">Logradouro *</label>
						<input type="text" class="form-control" name="logradouro"
							placeholder="Ex.: Rua/Praça/ Ladeira ...">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="bairro">Bairro *</label>
						<input type="text" class="form-control" name="bairro" placeholder="bairro">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="numero">Número *</label>
						<input type="text" class="form-control" name="numero" placeholder="Número">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="complemento">Complemento</label>
						<input type="text" class="form-control" name="complemento" placeholder="Complemento">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="cidade">Cidade *</label>
						<select class="custom-select" id="cidade" name="cidade_idcidade">
							<option value="" selected>Selecionar</option>
							@foreach(Helper::getCidades() as $cid)
							<option value="{{$cid->idcidade}}">{{ $cid->nome }}</option>
@endforeach
</select>
</div>
</div>
<div class="col">
	<div class="form-group">
		<label for="estado">Estado *</label>
		<select class="custom-select" id="estado" name="estado_idestado">
			<option value="" selected>Selecionar</option>
			@foreach(Helper::getEstados() as $est)
			<option value="{{$est->idestado}}">{{ $est->uf }}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="col">
	<div class="form-group">
		<label for="pais">País *</label>
		<select class="custom-select" id="pais_idpais" name="pais_idpais">
			<option value="" selected>País</option>
			<option value="1">Brasil</option>
			<option value="2">Outro</option>
		</select>
	</div>
</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Tem diponibilidade para mudança de cidade ou estado?&emsp;</label>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="disp_mudanca" id="disp_mudanca" value="1">
				<label class="form-check-label">Sim</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="disp_mudanca" id="disp_mudanca" value="2">
				<label class="form-check-label">Não</label>
			</div>
		</div>
	</div>
</div>
@if($errors->any())
<div class="card-footer">
	@foreach($errors->all() as $error)
	<div class="alert alert-danger" role="alert">
		{{$error}}
	</div>
	@endforeach
</div>
@endif
<br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
</form>
</div>
</div>
@endsection --}}