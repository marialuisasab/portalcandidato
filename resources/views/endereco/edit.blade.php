@extends('adminlte::page')

@section('content')
	

	<div class="card border">
		<div class= "card-body">  
			<h5>Editar Endereço</h5>
			<form action="/endereco/{{Auth::user()->id}}" method="POST">
				@csrf
				<div class="row">
    				<div class="col">
						<div class="form-group">
							<label for = "cep">CEP *</label>
							<input type="text" class="form-control" name="cep" placeholder="CEP" value="{{$e->cep}}">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "logradouro">Logradouro *</label>
							<input type="text" class="form-control" name="logradouro" placeholder="Ex.: Rua/Praça/ Ladeira ..." value="{{$e->logradouro}}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for = "bairro">Bairro *</label>
							<input type="text" class="form-control" name="bairro" placeholder="bairro" value="{{$e->bairro}}">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "numero">Número *</label>
							<input type="text" class="form-control" name="numero" placeholder="Número" value="{{$e->numero}}">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "complemento">Complemento</label>
							<input type="text" class="form-control" name="complemento" placeholder="Complemento" value="{{$e->complemento}}">
						</div>
					</div>
				</div>
				<div class="row">
    				<div class="col">
						<div class="form-group">
							<label for="cidade">Cidade *</label>
							<select class="custom-select" id="cidade" name="cidade_idcidade" value="{{$e->cidade_idcidade}}">				 
							   <option value = "">Selecionar</option>
							  	@foreach(Helper::getCidades() as $cid)
                            		<option value = "{{$cid->idcidade}}">{{ $cid->nome }}</option>
                            	@endforeach 
							</select>						  
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="estado">Estado *</label>
							<select class="custom-select" id="estado" name="estado_idestado" value="{{$e->estado_idestado}}">				 
							   <option value = "">Selecionar</option>
							  	@foreach(Helper::getEstados() as $est)
                            		<option value = "{{$est->idestado}}" >{{$est->uf}} </option>
                            	@endforeach                            
							</select>						  
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="pais">País *</label>
							<select class="custom-select" id="pais_idpais" name="pais_idpais" value="{{$e->pais_idpais}}">
							   <option value = "" selected>País</option>
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
							  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
							  <label class="form-check-label" for="inlineRadio1">Sim</label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
							  <label class="form-check-label" for="inlineRadio2">Não</label>
							</div>
						</div>
					</div>
				</div>
				<br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
				<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
			</form>
		</div>
	</div>
@endsection
<script>
		var selected = $('.selected').val();
    	$('.custom-select > option[value="selected"]').attr('selected',true);
	</script>