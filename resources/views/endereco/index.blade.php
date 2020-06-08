@extends('adminlte::page')

@section('content')

	<div class="card border">
		<div class= "card-body"> 
			<h5>Endereço</h5>
			<table class="table table-ordered table-hover">
			
			@foreach($endereco as $e)

				<tr>
					<th>CEP</th>
					<td>{{$e->cep}}</td>
				</tr>
				<tr>
					<th>Logradouro</th>
					<td>{{$e->logradouro}}</td>
				</tr>
				<tr>
					<th>Bairro</th>
					<td>{{$e->bairro}}</td>
				</tr>
				<tr>
					<th>Número</th>
					<td>{{$e->numero}}</td>
				</tr>
				<tr>
					<th>Complemento</th>
					<td>{{$e->complemento}}</td>
				</tr>
				<tr>
					<th>Cidade</th>
					<td>{{Helper::getCidade($e->cidade_idcidade)}}</td>
				</tr>
				<tr>
					<th>Estado</th>
					<td>{{Helper::getEstado($e->estado_idestado)}}</td>
				</tr>
				<tr>
					<th>Pais</th>
					<td>{{Helper::getPais($e->pais_idpais)}}</td>
				</tr>
				<tr>
					<th>Disponibilidade para mudança de cidade</th>
					<td>{{$e->disp_mudanca == '1' ? 'Sim':'Não'}}</td>
				</tr>
							
			@endforeach							
			</table>
			<a href="/endereco/editar/{{Auth::user()->id}}" class="btn btn-sm btn-primary">Editar endereço</a>
		</div>
	</div>

@endsection