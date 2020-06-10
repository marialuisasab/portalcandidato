@extends('adminlte::page')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
	integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>

<script src="/js/Dadospessoais/edit.js"></script>




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




										<button class=" btn btn-link" style="color:red;" type="cancel">
											<a href="cancel" style="color: red;">Cancelar</a>
											<span class="fas fa-window-close"
												style="font-size: 25px; text-align: center;"></span>

										</button>





										<button class=" btn btn-link" style="color" type="cancel">
											<a href="/endereco">Voltar</a>
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


								<form action="/endereco/{{Auth::user()->id}}" method="POST">
									@csrf

									<div class="form-group">
										<li><strong> CEP:*&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" name="cep" id="cep"
												placeholder="Informe o novo CEP" value="{{$e->cep}}">
										</li>
									</div>






									<div class="form-group">
										<li><strong> LOGRADOURO:*&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" name="logradouro" id="logradouro"
												placeholder="Ex.: Rua/Praça/ Ladeira ..." value="{{$e->logradouro}}">
										</li>
									</div>


									<div class="form-group">
										<li><strong>BAIRRO:*&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" name="bairro" id="bairro"
												placeholder="Bairro" value="{{$e->bairro}}">
										</li>
									</div>




									<div class="form-group">
										<li><strong> NUMERO:*&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" name="numero" id="numero"
												placeholder="numero" value="{{$e->numero}}">
										</li>
									</div>






									<div class="form-group">
										<li><strong>COMPLEMENTO:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" placeholder="Ex.:9999,99"
												name="complemento" id="complemento" value="{{$e->complemento}}"></li>

									</div>





									<div class="form-group">
										<li><strong>CIDADE:*&nbsp;&nbsp;&nbsp;</strong><span></span>
											<select class="custom-select" id="cidade" name="cidade_idcidade"
												value="{{$e->cidade_idcidade}}">
												<option value="">Selecionar</option>
												@foreach(Helper::getCidades() as $cid)
												<option value="{{$cid->idcidade}}"
													{{ $e->cidade_idcidade == $cid->idcidade ? 'selected' : '' }}>
													{{ $cid->nome }}</option>
												@endforeach
											</select>
									</div>
									</li>






									<div class="form-group">
										<li><strong>ESTADO:*&nbsp;&nbsp;&nbsp;</strong><span></span>
											<select class="custom-select" id="estado" name="estado_idestado"
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
										<li><strong>PAÍS:*&nbsp;&nbsp;&nbsp;</strong><span></span>
											<select class="custom-select" id="pais_idpais" name="pais_idpais"
												value="{{$e->pais_idpais}}">
												<option value="" selected>País</option>
												<option value="1">Brasil</option>
												<option value="2">Outro</option>
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

									@if($errors->any())
									<div class="card-footer">
										@foreach($errors->all() as $error)
										<div class="alert alert-danger" role="alert">
											{{$error}}
										</div>
										@endforeach
									</div>
									@endif

									<br><button type="submit" class="btn btn-primary btn-sm"
										id="botaosalvarend">Salvar</button>
									<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
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