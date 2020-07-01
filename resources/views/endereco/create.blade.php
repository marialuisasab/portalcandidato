@extends('adminlte::page')

<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> --}}
<script src="/js/Endereco/endereco.js"></script>
<script src="/jquerymask/jquerymasky.js"></script>
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
					<div class="card-header" id="headingOne" style="background-color: aliceblue;">
						<div class="container">
							<div class="row">
								<div class="col-sm">
									<h2 class="mb-0" style="color:dodgerblue;">
										Endereço
										<span class="fa-stack fa-sm">
											<i class="fas fa-circle fa-stack-2x"></i>
											<i class="fas fa-map-marked-alt fa-stack-1x fa-inverse"></i>
										</span>

									</h2>

								</div>


								<div class="col-xs-8 col-md-2" style="margin-left: auto; margin-top:10px;">
									<div class="btn-group " role="group" aria-label="">
										{{-- <button class=" btn btn-link">
											<a href="/curriculo/editar/{{Auth::user()->id}}" >Editar</a>
										<span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

										</button>
										<button class=" btn btn-link" style="color:red;" type="cancel">
											<a href="#" style="color: red;">Cancelar</a>
											<span class="fas fa-window-close"
												style="font-size: 25px; text-align: center;"></span>

										</button>
										--}}
										<button class=" btn btn-secondary" type="button" value="{{Auth::user()->id}}"
											id="idformendereco">
											<a href="/curriculo" style="color: white;">Voltar<span class="fas fa-undo"
													style="padding-left: 15px;"></span></a>
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
										<li><strong> CEP*:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text"
												class="form-control {{ $errors->has('cep') ? 'is-invalid' : ''}}"
												name="cep" id="cep" placeholder="Informe o seu CEP">
											@if($errors->has('cep'))
											<div class="invalid-feedback">
												{{$errors->first('cep')}}
											</div>
											@endif
										</li>
									</div>




									<div class="form-group">
										<li><strong> LOGRADOURO*:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text"
												class="form-control {{$errors->has('logradouro') ? 'is-invalid' : ''}}"
												name="logradouro" id="logradouro"
												placeholder="Ex.: Rua/Praça/ Ladeira ...">
											@if($errors->has('logradouro'))
											<div class="invalid-feedback">
												{{$errors->first('logradouro')}}
											</div>
											@endif
										</li>
									</div>





									<div class="form-group">
										<li><strong> BAIRRO*:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text"
												class="form-control {{$errors->has('bairro') ? 'is-invalid' : ''}}"
												name="bairro" id="bairro" placeholder="Informe o seu bairro">
											@if($errors->has('bairro'))
											<div class="invalid-feedback">
												{{$errors->first('bairro')}}
											</div>
											@endif
										</li>
									</div>




									<div class="form-group">
										<li><strong> NUMERO*:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text"
												class="form-control {{$errors->has('numero') ? 'is-invalid' : ''}}"
												name="numero" id="numero" placeholder="numero">
											@if($errors->has('numero'))
											<div class="invalid-feedback">
												{{$errors->first('numero')}}
											</div>
											@endif
										</li>
									</div>


									{{-- complemento  definicao pendente --}}
									<div class="form-group">
										<li><strong>COMPLEMENTO:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control"
												placeholder="Ex.:Casa, apartamento, etc..." name="complemento"
												id="complemento"></li>
									</div>

									{{-- <form method="GET" action="/endereco" id="ID_DO_FORMULARIO"> --}}
									<div class="form-group">
										<li><strong> ESTADO*:&nbsp;&nbsp;&nbsp;</strong>
											<select class="form-control unput-lg dynamic" id="estado"
												name="estado_idestado" data-dependent="cidade">
												<option value="" selected>Selecionar</option>
												@foreach(Helper::getEstados() as $est)
												<option value="{{$est->idestado}}">{{ $est->uf }}</option>
												@endforeach
											</select>
										</li>
										{{csrf_field()}}
									</div>
									{{-- </form> --}}



									<div class="form-group" id="idcidadeselect">
										<li><strong>CIDADE*:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"></span>
											<select class="custom-select" id="cidade" name="cidade_idcidade">
												<option value="" selected>Selecionar</option>
												{{-- @foreach(Helper::getCidades() as $cid)
												<option value="{{$cid->idcidade}}">{{ $cid->nome }}</option>
												@endforeach --}}
											</select>
										</li>
									</div>



									<div class="form-group">
										<li style=""><strong> PAÍS:*&nbsp;&nbsp;&nbsp;</strong>
											<select class="custom-select" id="pais_idpais" name="pais_idpais">
												<option value="" selected>País</option>
												@foreach(Helper::getPai () as $pais)
												<option value="{{$pais->idpais}}">{{$pais->nome}}
												</option>
												@endforeach
											</select> </li>
									</div>



									<div class="form-group">
										<li><strong>DISPONIBILIDADE DE MUDANÇA PARA OUTRO ESTADO OU
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
									</div>

									{{-- @if($errors->any())
									<div class="card-footer">
										@foreach($errors->all() as $error)
										<div class="alert alert-danger" role="alert">
											{{$error}}
						</div>
						@endforeach
					</div>
					@endif --}}

					<br>
					<div class="form-group" style="text-align: end;">
						<button type="submit" class="btn btn-primary" id="botaosalvarend">Salvar<span
								class="fas fa-save" style="padding-left: 15px;"></button>
						<button class=" btn btn-danger" style="color:red;" type="cancel">
							<a href="cancel" style="color: white;">Cancelar<span class="fas fa-window-close"
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