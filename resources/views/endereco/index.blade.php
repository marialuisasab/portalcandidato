@extends('adminlte::page')



{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
	integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="/js/Endereco/endereco.js"></script> --}}

@section('content')


<div class="container">



	<div class="row">

		<div class="col-xs-1 col-md-1">


		</div>

		<div class="col-xs-10 col-md-10">

			<div id="accordion" style="margin-top: 40px;">

				<div class="card-border-light">
					<div class="card-header" id="headingTwo" style="background-color: aliceblue;">
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
								<div class="col-xs-1 col-md-1"></div>

								<div class="col-xs-8 col-md-6">

									<button class=" btn btn-link">
										<a style="color:dodgerblue;" href="/endereco/editar/{{Auth::user()->id}}">
											<strong>Editar</strong></a>
										<span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

									</button>

									<button class=" btn btn-link" style="color: gray;" type="cancel">
										<a style="color: gray;" href="/curriculo"><strong>Voltar</strong></a>
										<span class="fas fa-undo" style="font-size: 25px; text-align: center;"></span>

									</button>

									<button class=" btn btn-link" style="color: green;" type="cancel">
										<a style="color: green;" href="/cursos"><strong> Proximo</strong></a>
										<span class="fas fa-forward"
											style="font-size: 25px; text-align: center;"></span>

									</button>

								</div>
							</div>
						</div>




					</div>


					<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">

							@foreach($endereco as $e)
							<ul style="list-style-type: none;">
								<li><strong>CEP:&nbsp;&nbsp;&nbsp;</strong>
									{{$e->cep}}</li>
								<hr>


								<li><strong> LOGRADOURO:&nbsp;&nbsp;&nbsp;</strong> {{$e->logradouro}}
								</li>
								<hr>


								<li><strong> BAIRRO:&nbsp;&nbsp;&nbsp;</strong> {{$e->bairro}}
								</li>
								<hr>


								<li><strong> NUMERO:&nbsp;&nbsp;&nbsp;</strong> {{$e->numero}}</li>
								<hr>



								<li><strong> COMPLEMENTO:&nbsp;&nbsp;&nbsp;</strong>{{$e->complemento}}
								</li>
								<hr>

								<li><strong>
										CIDADE:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCidade($e->cidade_idcidade)}}
								</li>
								<hr>

								<li><strong>
										ESTADO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getEstado($e->estado_idestado)}}
								</li>
								<hr>

								<li><strong> PAÍS:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getPais($e->pais_idpais)}}
								</li>
								<hr>

								<li><strong> DISPONIBILIDADE DE
										MUDANÇA:&nbsp;&nbsp;&nbsp;</strong>{{$e->disp_mudanca == '1' ? 'Sim':'Não'}}
								</li>
								<hr>
							</ul>
							@endforeach



						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="col-xs-1 col-md-1"></div>

	</div>
</div>






@endsection














{{-- 
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

@endsection --}}