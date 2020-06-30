@extends('adminlte::page')

<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>

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


								<div class="col-xs-8 col-md-2" style="margin-left: auto;">
									<div class="btn-group " role="group" aria-label="">




										{{--
										<button class=" btn btn-link" style="color:red;" type="cancel">
											<a href="cancel" style="color: red;">Cancelar</a>
											<span class="fas fa-window-close"
												style="font-size: 25px; text-align: center;"></span>

										</button>
										--}}
										<button class=" btn btn-secondary" type="cancel" style="margin-top: 10px;"
											id="idformendereco" value="{{Auth::user()->id}}">
											<a href="/endereco" style="color: white;">Voltar<span class="fas fa-undo"
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


								<form action="/endereco/{{Auth::user()->id}}" method="POST">
									@csrf

									<div class="form-group">
										<li><strong> CEP:*&nbsp;&nbsp;&nbsp;</strong>
											<input type="text"
												class="form-control {{ $errors->has('cep') ? 'is-invalid' : ''}}"
												name="cep" id="cep" placeholder="Informe o novo CEP"
												value="{{$e->cep}}">
											@if($errors->has('cep'))
											<div class="invalid-feedback">
												{{$errors->first('cep')}}
											</div>
											@endif
										</li>
									</div>






									<div class="form-group">
										<li><strong> LOGRADOURO:*&nbsp;&nbsp;&nbsp;</strong>
											<input type="text"
												class="form-control {{$errors->has('logradouro') ? 'is-invalid' : ''}}"
												name="logradouro" id="logradouro"
												placeholder="Ex.: Rua/Praça/ Ladeira ..." value="{{$e->logradouro}}">
											@if($errors->has('logradouro'))
											<div class="invalid-feedback">
												{{$errors->first('logradouro')}}
											</div>
											@endif
										</li>
									</div>


									<div class="form-group">
										<li><strong>BAIRRO:*&nbsp;&nbsp;&nbsp;</strong>
											<input type="text"
												class="form-control {{$errors->has('bairro') ? 'is-invalid' : ''}}"
												name="bairro" id="bairro" placeholder="Bairro" value="{{$e->bairro}}">
											@if($errors->has('bairro'))
											<div class="invalid-feedback">
												{{$errors->first('bairro')}}
											</div>
											@endif
										</li>
									</div>




									<div class="form-group">
										<li><strong> NUMERO:*&nbsp;&nbsp;&nbsp;</strong>
											<input type="text"
												class="form-control {{$errors->has('numero') ? 'is-invalid' : ''}}"
												name="numero" id="numero" placeholder="numero" value="{{$e->numero}}">
											@if($errors->has('numero'))
											<div class="invalid-feedback">
												{{$errors->first('numero')}}
											</div>
											@endif
										</li>
									</div>






									<div class="form-group">
										<li><strong>COMPLEMENTO:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" placeholder="Ex.:9999,99"
												name="complemento" id="complemento" value="{{$e->complemento}}"></li>

									</div>



									<div class="form-group">
										<li><strong>ESTADO:*&nbsp;&nbsp;&nbsp;</strong><span></span>
											<select class=" custom-select" id="estado" name="estado_idestado"
												value="{{$e->estado_idestado}}">
												<option value="">Selecionar</option>
												@foreach(Helper::getEstados() as $est)
												<option value="{{$est->idestado}}"
													{{ $e->estado_idestado == $est->idestado ? 'selected' : '' }}>
													{{$est->uf}} </option>
												@endforeach
											</select>
										</li>
									</div>





									<div class="form-group">
										<li><strong>CIDADE:*&nbsp;&nbsp;&nbsp;</strong><span></span>
											<select class="custom-select" id="cidade" name="cidade_idcidade"
												value="{{$e->cidade_idcidade}}">
												<option value="">Selecionar</option>

												@foreach(Helper::getCidades() as $cid)
												@if ($cid ->estado_idestado == $e->cidade_idcidade)
												<option value="{{$cid->idcidade}}"
													{{ $e->cidade_idcidade == $cid->idcidade ? 'selected' : '' }}>
													{{ $cid->nome }}</option>
												@else
												@endif
												@endforeach

											</select>
										</li>
									</div>









									<div class="form-group">
										<li><strong>PAÍS:*&nbsp;&nbsp;&nbsp;</strong><span></span>
											<select class="custom-select" id="pais_idpais" name="pais_idpais"
												value="{{$e->pais_idpais}}">
												<option value="">Selecionar</option>
												@foreach(Helper::getPai() as $pai)
												<option value="{{$pai->idpais}}"
													{{ $e->pais_idpais == $pai->idpais ? 'selected' : '' }}>
													{{ $pai->nome }}</option>
												@endforeach
												{{-- 
												<option value="" selected>País</option>
												<option value="1">Brasil</option>
												<option value="2">Outro</option> --}}
											</select>
										</li>
									</div>






									<div class="form-group">
										<li><strong>Tem diponibilidade para mudança de cidade ou
												estado?*&nbsp;&nbsp;&nbsp;</strong><span> </span>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" id="disp_mudanca"
													name="disp_mudanca" value="1"
													{{ $e->disp_mudanca == '1' ? 'checked' : '' }}>
												<label class="form-check-label" for="disp_mudanca">Sim</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="disp_mudanca"
													value="2" id="disp_mudanca"
													{{ $e->disp_mudanca == '2' ? 'checked' : '' }}>
												<label class="form-check-label" for="disp_mudanca">Não</label>
											</div>
										</li>
									</div>
									{{csrf_field()}}

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
<div class="col-xs-1 col-md-1">


</div>
</div>
</div>

@endsection


<script>
	$(function () {
	
	var id_estado = $("#estado").val();

	// var estado_idestado = $("input[name=estado_idestado]").val()
	alert(id_estado);
	
	if (id_estado != '') {
	
	$.get('/get-cidades/' + id_estado, function (cidades) {
	$('select[name=cidade_idcidade]').empty();
	$.each(cidades, function (key, value) {
	$('select[name=cidade_idcidade]').append('<option value=' + value.idcidade + '>' + value.nome + '</option>');
	console.log(value);
	});
	});
	
	
	} else {
	$.get('/get-cidades', function (resultado) {
	$('select[name=cidade_idcidade]').empty();
	$('select[name=cidade_idcidade]').append("<option> Selecionar </option>");
	
	});
	}

	
	


	});
</script>















{{-- 
<div class="card border">
	<div class="card-body">
		<h5>Editar Endereço</h5>
		<form action="/endereco/{{Auth::user()->id}}" method="POST">
@csrf
<div class="row">
	<div class="col">
		<div class="form-group">
			<label for="cep">CEP *</label>
			<input type="text" class="form-control" name="cep" placeholder="CEP" value="{{$e->cep}}">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="logradouro">Logradouro *</label>
			<input type="text" class="form-control" name="logradouro" placeholder="Ex.: Rua/Praça/ Ladeira ..."
				value="{{$e->logradouro}}">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label for="bairro">Bairro *</label>
			<input type="text" class="form-control" name="bairro" placeholder="bairro" value="{{$e->bairro}}">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="numero">Número *</label>
			<input type="text" class="form-control" name="numero" placeholder="Número" value="{{$e->numero}}">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="complemento">Complemento</label>
			<input type="text" class="form-control" name="complemento" placeholder="Complemento"
				value="{{$e->complemento}}">
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="form-group">
			<label for="cidade">Cidade *</label>
			<select class="custom-select" id="cidade" name="cidade_idcidade" value="{{$e->cidade_idcidade}}">
				<option value="">Selecionar</option>
				@foreach(Helper::getCidades() as $cid)
				<option value="{{$cid->idcidade}}" {{ $e->cidade_idcidade == $cid->idcidade ? 'selected' : '' }}>
					{{ $cid->nome }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="estado">Estado *</label>
			<select class="custom-select" id="estado" name="estado_idestado" value="{{$e->estado_idestado}}">
				<option value="">Selecionar</option>
				@foreach(Helper::getEstados() as $est)
				<option value="{{$est->idestado}}" {{ $e->estado_idestado == $est->idestado ? 'selected' : '' }}>
					{{$est->uf}} </option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label for="pais">País *</label>
			<select class="custom-select" id="pais_idpais" name="pais_idpais" value="{{$e->pais_idpais}}">
				<option value="">País</option>
				<option value="1" selected>Brasil</option>
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
				<input class="form-check-input" type="radio" id="disp_mudanca" name="disp_mudanca" value="1"
					{{ $e->disp_mudanca == '1' ? 'checked' : '' }}>
				<label class="form-check-label" for="disp_mudanca">Sim</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="disp_mudanca" value="2" id="disp_mudanca"
					{{ $e->disp_mudanca == '2' ? 'checked' : '' }}>
				<label class="form-check-label" for="disp_mudanca">Não</label>
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