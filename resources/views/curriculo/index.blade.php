@extends('adminlte::page')

@section('content')
	<div class="card border">
		<div class= "card-body"> 
			<h5>Dados Pessoais</h5>
			<table class="table table-ordered table-hover">
			
				@foreach($candidato as $candidato)
				@if(Auth::user()->foto != null)
					<tr>
						<th>Foto</th>
						<td>						
							<img src="{{url('storage/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}" style="max-width: 50px;">					
						</td>
					</tr>
				@endif
				<tr>
					<th>Nome completo</th>
					<td>{{Auth::user()->name}}</td>
				</tr>
				<tr>
					<th>E-mail</th>
					<td>{{Auth::user()->email}}</td>
				</tr>
				<tr>
					<th>Data de nascimento</th>
					<td>{{date_format(new DateTime($candidato->dtnascimento), 'd/m/Y')}}</td>
				</tr>
				<tr>
					<th>Gênero</th>
					<td>{{$candidato->genero}}</td>
				</tr>
				<tr>
					<th>Nome da Mãe</th>
					<td>{{$candidato->nomemae}}</td>
				</tr>
				<tr>
					<th>Nome do Pai</th>
					<td>{{$candidato->nomepai}}</td>
				</tr>
				<tr>						
					<th>Deficiente físico?</th>
					<td>{{$candidato->dfisico}}</td>
				</tr>
				<tr>
					<th>Objetivos</th>
					<td>{{$candidato->sobre}}</td>
				</tr>
				<tr>
					<th>Pretensão salarial</th>
					<td>{{$candidato->pretsalarial}}</td>
				</tr>
				<tr>
					<th>Telefone 1</th>
					<td>{{$candidato->telefone1}}</td>
				</tr>
				<tr>
					<th>Telefone 2</th>
					<td>{{$candidato->telefone2}}</td>
				</tr>
				<tr>
					<th>CPF</th>
					<td>{{$candidato->cpf}}</td>
				</tr>
				<tr>
					<th>RG</th>
					<td>{{$candidato->rg}}</td>
				</tr>
				<tr>
					<th>Categoria CNH</th>
					<td>{{$candidato->catcnh}}</td>
				</tr>
				<tr>
					<th>Número CNH</th>
					<td>{{$candidato->cnh}}</td>
				</tr>
				<tr>
					<th>UF CNH</th>
					<td>{{$candidato->ufcnh}}</td>
				</tr>
				<tr>	
					<th>CTPS</th>
					<td>{{$candidato->ctps}}</td>
				</tr>
				<tr>	
					<th>Nacionalidade</th>
					<td>{{$candidato->nacionalidade}}</td>
				</tr>
				<tr>	
					<th>Naturalidade</th>
					<td>{{$candidato->naturalidade}}</td>
				</tr>
				<tr>	
					<th>Estado Civil</th>
					<td>{{$candidato->estadocivil}}</td>
				</tr>
				
				@endforeach
				
			</table>
			<a href="/curriculo/editar/{{Auth::user()->id}}" class="btn btn-sm btn-primary">Editar Informações</a>
		</div>
	</div>

@endsection