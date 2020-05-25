@extends('adminlte::page')

@section('content')

	<div class="card border">
		<div class= "card-body">  
			<h5>Cadastrar Dados Pessoais</h5>
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
							<label for = "cpf">CPF</label>
							<input type="text" class="form-control" maxlength="11" name="cpf" id="cpf" placeholder="CPF">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "rg">RG</label>
							<input type="text" class="form-control" maxlength="11" name="rg" id="rg" placeholder="RG">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "ctps">CTPS</label>
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
							<input type="text" class="form-control" placeholder="Ex.: dd/mm/aaaa" name="dtnascimento" id="dtnascimento">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="dtnasc">Gênero</label>
							<select class="custom-select" id="genero" name="genero">
							   <option value = "" selected>Selecionar</option>
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
							<label for = "nomemae">Nome da mãe</label>
							<input type="text" class="form-control" name="nomemae" id="nomemae" placeholder="Nome da mãe">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "nomepai">Nome do pai</label>
							<input type="text" class="form-control" name="nomepai" id="nomepai" placeholder="Nome do pai">
						</div>
					</div>
				</div>
				<div class="row">
    				<div class="col">
						<div class="form-group">
							<label for="dfisico">Deficiente físico?</label>
							<select class="custom-select" id="dfisico" name="dfisico">
							   <option value = "" selected>Selecionar</option>
							   <option value="1">Sim</option>
							   <option value="2">Não</option>
							</select>						  
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="nacionalidade">Nacionalidade</label>
							<select class="custom-select" id="nacionalidade" name="nacionalidade">
							   <option value = "" selected>Selecionar</option>
							   <option value="1">Brasileira</option>
							   <option value="2">Outra</option>
							</select>						  
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="naturalidade">Naturalidade</label>
							<select class="custom-select" id="naturalidade" name="naturalidade">				 
							   <option value = "" selected>Selecionar</option>
							  	@foreach($cidades as $cid)
                            	<option value = "{{$cid->idcidade}}">{{ $cid->nome }}</option>
                            	@endforeach
							</select>						  
						</div>
					</div>
				</div>
				<div class="row">
    				<div class="col">
						<div class="form-group">
							<label for = "telefone1">Telefone 1 *</label>
							<input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="Telefone 1">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "telefone2">Telefone 2</label>
							<input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="Telefone 2">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "estadocivil">Estado Civil</label>
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
							<label for = "ufcnh">UF de origem CNH</label>
							<input type="text" class="form-control" name="ufcnh" id="ufcnh" placeholder="UF">
						</div>
					</div>					
					<div class="col">
						<div class="col">
							<div class="form-group">
								<label for = "cnh">Número CNH</label>
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
				    <label for = "foto">Foto</label>
				    <input type="file" class="form-control-file" id="foto" name="foto" file_extension=".jpg">
				 </div>
				<br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
				<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
			</form>
		</div>
	</div>

@endsection