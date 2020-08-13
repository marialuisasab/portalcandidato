@extends('adminlte::page')

{{-- link css --}}
<link rel="stylesheet" href="/css/dadospessoais/dadospessoais.css">

{{-- script do js --}}
<script src="/vendor/jquery/jquery.min.js">
</script>
<script src="js/Home/home.js"></script>
<script src="/jquerymask/jquerymasky.js"></script>
<script src="/jqueryMaskMoney/jquery.maskMoney.js" type="text/javascript"></script>
<script src="/js/Dadospessoais/edit.js"></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js " type=" text / javascript "> </script>





@section('content_header')
{{-- 
	<nav aria-label="Navegação de página exemplo">
		<ul class="pagination justify-content-end">
			<li class="page-item disabled">
				<a class="page-link" href="#" tabindex="-1">Visualizar Currículo</a>
			</li>
			<li class="page-item"><a class="page-link" href="/curriculo/editar/{{Auth::user()->id}}">Editar Dados Pesoais</a>
</li>
<li class="page-item"><a class="page-link" href="#">Editar Endereço</a></li>
<li class="page-item"><a class="page-link" href="#">Editar Formação e Cursos</a></li>
<li class="page-item">
	<a class="page-link" href="#">Próximo</a>
</li>
</ul>
</nav> --}}

@endsection

@section('content')

@include('flash::message')
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
								<div class="col-sm">
									<h2 class="mb-0" style="color:dodgerblue; font-size:25px;">
										{{-- <button
											class="d-flex align-items-center justify-content-between btn btn-link collapsed"
											data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
											id="dadospessoaismostrar" aria-controls="collapseOne"> --}}
										Dados Pessoais
										<span class="fa-stack fa-sm">
											<i class="fas fa-circle fa-stack-2x"></i>
											<i class="fas fa-id-card fa-stack-1x fa-inverse"></i>
										</span>
										{{-- </button> --}}
									</h2>
								</div>
								<div class="col-xs-8 col-md-8"
									style="margin-top: 5px; margin-right: auto; text-align:end;">
									<div class="btn-group btn-sm" role="group">
										<button class=" btn btn-primary btn-sm" title="Editar Dados Pessoais "
											id="botaoeditar">
											<a style="color:white;" href="/curriculo/editar/{{Auth::user()->id}}">Editar
												<span class="fa fa-edit" style="padding-left: 15px;"></span></a>
										</button>
										<button class=" btn btn-success btn-sm" title="Cadastrar Formação">
											<a style=" color: white;" href="/endereco">Proximo<span
													class="fas fa-forward" style="padding-left: 15px;"></span>
											</a>
										</button>
										<button class=" btn btn-secondary btn-sm" style="" title="Voltar">
											<a style="color: white;" href="/home">Voltar<span class="fas fa-undo"
													style="padding-left: 15px;;"></span></a>
										</button>

									</div>
								</div>
							</div>
						</div>





					</div>
					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body" style="box-sizing: border-box;">
							@foreach($candidato as $candDados)
							<ul style="list-style-type: none;">

								@if(Auth::user()->foto != null)
								<h2> <img src="{{url('/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}"
										style="max-width: 120px; border-radius: 50%;">
								</h2>
								@else
								<h2> <img class="profile-user-img img-responsive img-circle"
										src="/img/imagemuserPadrao.jpg" alt="Usuário sem foto" style="color: red;">
								</h2>
								<p></p>
								@endif
								<hr>




								<li><strong> NOME:&nbsp;&nbsp;&nbsp;</strong> {{Auth::user()->name}}
								</li>
								<hr>


								<li><strong> CPF:&nbsp;&nbsp;&nbsp;</strong> {{$candDados->cpf}}</li>
								<hr>


								<li><strong> CARTEIRA DE IDENTIFICAÇÃO(RG):&nbsp;&nbsp;&nbsp;</strong>
									{{$candDados->rg}}</li>
								<hr>

								@if ($candDados->ctps!= null)
								<li><strong> CARTEIRA DE TRABALHO(CTPS):&nbsp;&nbsp;&nbsp;</strong>
									{{$candDados->ctps}}</li>
								@else
								<li><strong> CARTEIRA DE TRABALHO(CTPS):&nbsp;&nbsp;&nbsp;</strong>
									<span style="color: red;"> Não Informado</span></li>
								@endif

								<hr>


								<li><strong> DATA DE
										NASCIMENTO:&nbsp;&nbsp;&nbsp;</strong>{{date_format(new DateTime($candDados->dtnascimento), 'd/m/Y')}}
								</li>
								<hr>


								<li><strong> TELEFONE(PRINCIPAL):&nbsp;&nbsp;&nbsp;</strong> {{$candDados->telefone1}}
								</li>
								<hr>


								@if ($candDados ->telefone2 != null)
								<li><strong> TELEFONE(2ºOPÇÃO):&nbsp;&nbsp;&nbsp;</strong> {{$candDados->telefone2}}
								</li>
								@else
								<li><strong> TELEFONE(2ºOPÇÃO):&nbsp;&nbsp;&nbsp;</strong> <span style="color: red;">
										Não Informado!</span>
								</li>
								@endif
								<hr>


								<li><strong> EMAIL:&nbsp;&nbsp;&nbsp;</strong> {{Auth::user()->email}}</li>
								<hr>


								@if(($candDados->genero != null)&& ($candDados->genero =='M'))
								<li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong>Masculino</li>
								@elseif(($candDados->genero != null)&& ($candDados->genero =='F'))
								<li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong>Feminino</li>
								@else
								<li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
										cadastrado!</span></li>
								@endif
								<hr>


								@if(($candDados->estadocivil != null)&&($candDados->estadocivil =='1'))
								<li><strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>Solteiro</li>
								@elseif(($candDados->estadocivil != null)&&($candDados->estadocivil =='2'))
								<li><strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>Casado</li>
								@elseif(($candDados->estadocivil != null)&&($candDados->estadocivil =='3'))
								<li><strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>Divorciado</li>
								@elseif(($candDados->estadocivil != null)&&($candDados->estadocivil =='4'))
								<li><strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>Viúvo</li>
								@elseif(($candDados->estadocivil != null)&&($candDados->estadocivil =='5'))
								<li><strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>Separado</li>
								@else
								<li><strong> ESTADO CIVIL :&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
										cadastrado!</span></li>
								@endif
								<hr>

								@foreach(Helper::getPai() as $pai)
								@if($pai->idpais == $candDados->nacionalidade)
								@if($candDados->nacionalidade != null)
								<li><strong> NACIONALIDADE:&nbsp;&nbsp;&nbsp;</strong>{{$pai->nome}}</li>
								@else
								<li><strong> NACIONALIDADE:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
										Informado!</span></li>
								@endif
								@else
								@endif
								@endforeach
								<hr>




								@if($candDados->naturalidade != null)
								<li><strong>
										NATURALIDADE:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCidade($candDados->naturalidade)}}
								</li>
								@else
								<li><strong> NATURALIDADE:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
										cadastrado!</span></li>
								@endif

								<hr>



								@if(($candDados->dfisico != null) && ($candDados->dfisico == '1'))
								<li><strong> DEFICIENTE FISÍCO:&nbsp;&nbsp;&nbsp;</strong> Sim</li>
								@elseif(($candDados->dfisico != null) && ($candDados->dfisico == '2'))
								<li><strong> DEFICIENTE FISÍCO:&nbsp;&nbsp;&nbsp;</strong> Não</li>
								@else
								<li><strong> DEFICIENTE FISÍCO:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
										cadastrado!</span></li>
								@endif
								<hr>




								<li><strong> PRETENÇÃO SALARIAL:&nbsp;&nbsp;&nbsp;</strong>
									{{-- {{Helper::getPretensao($candDados->pretsalarial)}},00</li> --}}
								{{Helper::getPretensao($candDados->pretsalarial)}},00</li>
								<hr>




								@if($candDados->nomemae != null)
								<li><strong> NOME DA MÃE:&nbsp;&nbsp;&nbsp;</strong> {{$candDados->nomemae}}</li>
								@else
								<li><strong> NOME DA MÃE:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
										cadastrado!</span></li>
								@endif
								<hr>


								@if($candDados->nomepai != null)
								<li><strong> NOME DO PAI:&nbsp;&nbsp;&nbsp;</strong> {{$candDados->nomepai}}</li>
								@else
								<li><strong> NOME DA PAI:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
										Informado!</span></li>
								@endif
								<hr>


								{{-- 
										<li style="word-break: break-word;"><strong> dfisico:&nbsp;&nbsp;&nbsp;</strong> {{$candDados->dfisico}}</li>
								<hr>
								--}}


								@if ($candDados->sobre!=null)
								<li style="word-break: break-word;"><strong> OBJETIVOS:&nbsp;&nbsp;&nbsp;</strong>
									{{$candDados->sobre}}</li>
								@else
								<li style="word-break: break-word;"><strong> OBJETIVOS:&nbsp;&nbsp;&nbsp;</strong>
									<span style="color:red;">Não informado!</span></li>
								@endif
								<hr>


								<li><strong>CATEGORIA DA CNH:&nbsp;&nbsp;&nbsp;</strong>
									@if($candDados->catcnh == null)
									<span style="color: red;"> Não informado!</span>
									@else
									{{$candDados->catcnh}}
									@endif

									<hr>


									@if ($candDados->cnh!=null)
								<li><strong> CARTEIRA DE HABILITAÇÃO (Nº CNH):&nbsp;&nbsp;&nbsp;</strong>
									{{$candDados->cnh}}</li>
								@else
								<li><strong> CARTEIRA DE HABILITAÇÃO (Nº CNH):&nbsp;&nbsp;&nbsp;</strong>
									<span style="color:red;">Não Informado!</span></li>
								@endif
								<hr>


								@if ($candDados->ufcnh == null)
								<li><strong> UF DA CNH:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não
										informado!</span></li>
								@else
								@foreach (Helper::getEstados() as $estados)
								@if($estados->idestado == $candDados->ufcnh)
								<li><strong> UF DA CNH:&nbsp;&nbsp;&nbsp;</strong>{{$estados->nome}}</li>
								@else
								@endif
								@endforeach
								@endif













							</ul>
							@endforeach
						</div>
					</div>
				</div>
				{{-- <div class="card">
					<div class="card-header" id="headingTwo" style="background-color: aliceblue;">
						<div class="container">
							<div class="row">
								<div class="col-sm">
									<h2 class="mb-0">
										<button
											class="d-flex align-items-center justify-content-between btn btn-link collapsed"
											data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
											aria-controls="collapseTwo">
											Endereço
											<span class="fa-stack fa-sm">
												<i class="fas fa-circle fa-stack-2x"></i>
												<i class="fas fa-map-marked-alt fa-stack-1x fa-inverse"></i>
											</span>
										</button>
									</h2>

								</div>

								<div class="col-sm">

									<button class=" btn btn-link">
										<a href="/endereco/editar/{{Auth::user()->id}}">Editar</a>
				<span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

				</button>

				<button class=" btn btn-link" style="color" type="cancel">
					<a href="/home">Voltar</a>
					<span class="fas fa-undo" style="font-size: 25px; text-align: center;"></span>

				</button>



			</div>
		</div>
	</div>




</div>


<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
	<div class="card-body">


		@yield('conteudoendereço')






	</div>
</div>
</div> --}}




{{-- <div class="card">
					<div class="card-header" id="headingThree">
						<h2 class="mb-0">
							<button class="d-flex align-items-center justify-content-between btn btn-link collapsed"
								data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
								aria-controls="collapseThree">
								Formação e Cursos
								<span class="fa-stack fa-2x">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fas fa-plus fa-stack-1x fa-inverse"></i>
								</span>
							</button>
						</h2>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						<div class="card-body">
							<ul>
								<li>Astrophysics</li>
								<li>Informatics</li>
								<li>Criminology</li>
								<li>Economics</li>
							</ul>
						</div>
					</div>
				</div> --}}
</div>
</div>



{{-- 
					<div class="col-xs-3 col-md-3">
						
						<div class="card-border-light mb-3" style="max-width: 18rem; margin-top: 40px;">
							<div class="card-header" style=" background-color: aliceblue; text-align: center;"><p style="color: green;"> Opções</p></div>
							<div class="card-body">
								<ul style="list-style-type: none;">
									<li> <button class="btn bnt-primary" type="button">Download</button></li>
									<button type="button" class="btn btn-primary">Primary</button>
								</ul>
								
								
								
								
							</div>
						</div>
					</div> --}}




<div class="col-xs-1 col-md-1">


</div>

</div>

</div>
































@endsection