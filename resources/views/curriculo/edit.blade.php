@extends('adminlte::page')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="/js/Dadospessoais/edit.js"></script>


@section('content')





<div class="container">



	<div class="row">

		<div class="col-xs-1 col-md-1">


		</div>

		<div class="col-xs-10 col-md-10" >

			<div id="accordion" style="margin-top: 40px;">
				<div class="card-border-light" >
					<div class="card-header" id="headingOne" style="background-color: aliceblue;">



						<div class="container" >
			<div class="row">
		<div class="col-xs-4 col-md-4">
									<h2 class="mb-0" style="color:dodgerblue;">

										Dados Pessoais
										<span class="fa-stack fa-sm">
											<i class="fas fa-circle fa-stack-2x"></i>
											<i class="fas fa-id-card fa-stack-1x fa-inverse"></i>
										</span>

									</h2>

								</div>

							
				<div class="col-xs-8 col-md-6" style="margin-left: auto;">
				 	<div class="btn-group " role="group" aria-label="" >
					<button class=" btn btn-link">
						<a href="/curriculo/editar/{{Auth::user()->id}}" >Editar</a>
						<span class="fa fa-edit"  style="font-size: 25px; text-align: center;"></span>
					
					</button>

	


				
						<button class=" btn btn-link" style="color:red;" type="cancel">
										<a href="#" style="color: red;" >Cancelar</a>
										<span class="fas fa-window-close"  style="font-size: 25px; text-align: center;"></span>

									</button>


				

			
					<button class=" btn btn-link" style="color" type="cancel">
										<a href="/curriculo" >Voltar</a>
										<span class="fas fa-undo"  style="font-size: 25px; text-align: center;"></span>

									</button>
				</div>
			</div>
			</div>
		</div>




					</div>
					<div id="collapseOne"  class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body" style="box-sizing: border-box;">

							<ul style="list-style-type: none;">


								<form action="/curriculo/{{$c->users_id}}" method="POST" enctype="multipart/form-data">
									@csrf
									{{-- <div class="form-group">
										<label for = "nome">Nome</label>
										<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo" value="{{Auth::user()->name}}">
									</div> --}}

									<div class="form-group">
										<li><strong> NOME:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo" value="{{Auth::user()->name}}">
										</li>
									</div>
									<hr>



									{{-- <div class="col">
										<div class="form-group">
											<label for = "cpf">CPF</label>
											<input type="text" class="form-control" maxlength="11" name="cpf" id="cpf" placeholder="CPF">
										</div>
									</div> --}}



									<div class="form-group">
										<li><strong> CPF:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" maxlength="11" name="cpf" id="cpf" placeholder="CPF" value="{{$c->cpf}}">
										</li>
									</div>
									<hr>


									{{-- <div class="col">
										<div class="form-group">
											<label for = "rg">RG</label>
											<input type="text" class="form-control" maxlength="11" name="rg" id="rg" placeholder="RG">
										</div>
									</div> --}}

									<div class="form-group">
										<li><strong> RG:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" maxlength="11" name="rg" id="rg" placeholder="RG" value="{{$c->rg}}">
										</li>
									</div>
									<hr>



									{{-- <div class="col">
										<div class="form-group">
											<label for = "ctps">CTPS</label>
											<input type="text" class="form-control" name="ctps" id="ctps" placeholder="CTPS">
										</div>
									</div>		 --}}

									<div class="form-group">
										<li><strong> CTPS:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" name="ctps" id="ctps" placeholder="CTPS" value="{{$c->ctps}}">
										</li>
									</div>
									<hr>



									{{-- <div class="col">
										<div class="form-group">
											<label for="pretsalarial">Pretensão Salarial</label>
											<input type="text" class="form-control" placeholder="Ex.:9999,99" name="pretsalarial" id="pretsalarial">
										</div>
									</div> --}}


									<div class="form-group">
										<li><strong>PRETENÇÃO SALARIAL:&nbsp;&nbsp;&nbsp;</strong>
											<input type="text" class="form-control" placeholder="Ex.:9999,99" name="pretsalarial" id="pretsalarial" value="{{$c->pretsalarial}}"></li>

										</div>

										<hr>



										{{-- <div class="form-group">
											<label for="dtnascimento">Data de Nascimento</label>
											<input type="data" class="form-control" placeholder="Ex.: dd/mm/aaaa" name="dtnascimento" id="dtnascimento">
										</div> --}}

										<div class="form-group">
											<li><strong>DATA DE NASCIMENTO:&nbsp;&nbsp;&nbsp;</strong><span></span>
											<input type="date" class="form-control" placeholder="Ex.: dd/mm/aaaa" name="dtnascimento" id="dtnascimento" value="{{$c->dtnascimento}}">
											</div></li>

											<hr>




											{{-- <div class="col">
												<div class="form-group">
													<label for="dtnasc">Gênero</label>
													<select class="custom-select" id="genero" name="genero">
														<option value = "" selected>Selecionar</option>
														<option value="F">Feminino</option>
														<option value="M">Masculino</option>
														<option value="N">Prefiro não informar</option>
													</select>
												</div>
											</div> --}}

											<div class="form-group">
												<li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong>
												<select class="custom-select" id="genero" name="genero" value="{{$c->genero}}">
														<option value = "" selected>Selecionar</option>
														<option value="F">Feminino</option>
														<option value="M">Masculino</option>
														<option value="N">Prefiro não informar</option>
													</select>
												</li>
												</div>
												<hr>




												{{-- <div class="form-group">
													<label for = "nomemae">Nome da mãe</label>
													<input type="text" class="form-control" name="nomemae" id="nomemae" placeholder="Nome da mãe">
												</div>
												--}}


												
												<div class="form-group">
													<li style=""><strong> NOME DA MÃE:&nbsp;&nbsp;&nbsp;</strong>
													<input type="text" class="form-control" name="nomemae" id="nomemae" placeholder="Nome da mãe" value="{{$c->nomemae}}"></li>
													</div>






													{{--
														<div class="form-group">
															<label for = "nomepai">Nome do pai</label>
															<input type="text" class="form-control" name="nomepai" id="nomepai" placeholder="Nome do pai">
														</div> --}}

														<div class="form-group">
															<li><strong> NOME DO PAI:&nbsp;&nbsp;&nbsp;</strong>
																<input type="text" class="form-control" name="nomepai" id="nomepai" placeholder="Nome do pai" value="{{$c->nomepai}}">
															</li>
														</div>
														<hr>



														{{--
															<div class="form-group">
																<label for="dfisico">Deficiente físico?</label>
																<select class="custom-select" id="dfisico" name="dfisico">
																	<option value = "" selected>Selecionar</option>
																	<option value="1">Sim</option>
																	<option value="2">Não</option>
																</select>
															</div>
															--}}

															<div class="form-group">
																<li><strong> DEFICIENTE FISICO?&nbsp;&nbsp;&nbsp;</strong>
																	<select class="custom-select" id="dfisico" name="dfisico" value="{{$c->dfisico}}">
																		<option value = "" selected>Selecionar</option>
																		<option value="1">Sim</option>
																		<option value="2">Não</option>
																	</select> </li>
																</div>
																<hr>




																{{-- <div class="form-group">
																	<label for="nacionalidade">Nacionalidade</label>
																	<select class="custom-select" id="nacionalidade" name="nacionalidade">
																		<option value = "" selected>Selecionar</option>
																		<option value="1">Brasileira</option>
																		<option value="2">Outra</option>
																	</select>
																</div> --}}


																<div class="form-group">
																	<li><strong> NACIONALIDADE:&nbsp;&nbsp;&nbsp;</strong>
																		<select class="custom-select" id="nacionalidade" name="nacionalidade" value="{{$c->nacionalidade}}">
																			<option value = "" selected>Selecionar</option>
																			<option value="1">Brasileira</option>
																			<option value="2">Outra</option>
																		</select>	</li>
																	</div>
																	<hr>




																	{{-- <div class="form-group">
																		<label for="naturalidade">Naturalidade</label>
																		<select class="custom-select" id="naturalidade" name="naturalidade" >
																			<option value = "" selected>Selecionar</option>
																			@foreach($cidades as $cid)
																			<option value = "{{$cid->idcidade}}">{{ $cid->nome }}</option>
																			@endforeach
																		</select>
																	</div> --}}

																	<div class="form-group">
																		<li><strong> NATURALIDADE:&nbsp;&nbsp;&nbsp;</strong>
																			<select class="custom-select" id="naturalidade" name="naturalidade"value="{{$c->naturalidade}}"">
																				{{-- <option value = "" selected>Selecionar</option>
																				@foreach($cidades as $cid)
																				<option value = "{{$cid->idcidade}}">{{ $cid->nome }}</option>
																				@endforeach --}}
																			</select>	</li>
																		</div>
																		<hr>





																		{{-- <div class="form-group">
																			<label for = "telefone1">Telefone 1 *</label>
																			<input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="Telefone 1">
																		</div>--}}



																		<div class="form-group">
																			<li><strong> TELEFONE 1 &nbsp;&nbsp;&nbsp;</strong>
																				<input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="Telefone 1" value="{{$c->telefone1}}"> </li>
																			</div>
																			<hr>



																			{{-- <div class="col">
																				<div class="form-group">
																					<label for = "telefone2">Telefone 2</label>
																					<input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="Telefone 2">
																				</div>
																			</div> --}}

																			<div class="form-group">
																				<li><strong>TELEFONE 2&nbsp;&nbsp;&nbsp;</strong>
																					<input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="Telefone 2" value="{{$c->telefone2}}""> </li>
																				</div>
																				<hr>




																				{{--
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
																					</div> --}}



																					<div class="form-group">
																						<li><strong> ESTADO CIVIL:&nbsp;&nbsp;&nbsp;</strong>
																							<select class="custom-select" id="estadocivil" name="estadocivil" value="{{$c->estadocivil}}">
																								<option value="" selected>Selecionar</option>
																								<option value="1">Solteiro(a)</option>
																								<option value="2">Casado(a)</option>
																								<option value="3">Divorciado(a)</option>
																								<option value="4">Viúvo(a)</option>
																								<option value="5">Separado(a)</option>
																							</select>	</li>
																						</div>
																						<hr>




																						{{-- <div class="form-group">
																							<label for="catcnh">Categoria CNH</label>
																							<select class="custom-select" id="catcnh" name="catcnh">
																								<option value="" selected>Selecionar</option>
																								<option value="A">A</option>
																								<option value="B">B</option>
																								<option value="C">C</option>
																								<option value="D">D</option>
																								<option value="E">E</option>
																							</select>
																						</div> --}}

																						<div class="form-group">
																							<li><strong> CATEGORIA CNH:&nbsp;&nbsp;&nbsp;</strong><span> </span>
																							<select class="custom-select" id="catcnh" name="catcnh" value="{{$c->catcnh}}">
																									<option value="" selected>Selecionar</option>
																									<option value="A">A</option>
																									<option value="B">B</option>
																									<option value="C">C</option>
																									<option value="D">D</option>
																									<option value="E">E</option>
																								</select></li>
																							</div>

																							<hr>



																							{{-- <div class="col">
																								<div class="form-group">
																									<label for = "ufcnh">UF de origem CNH</label>
																									<input type="text" class="form-control" name="ufcnh" id="ufcnh" placeholder="UF">
																								</div>
																							</div>	 --}}

																							<div class="form-group">
																								<li><strong> UF DE ORIGEM DA CNH:&nbsp;&nbsp;&nbsp;</strong><span></span>
																								<input type="text" class="form-control" name="ufcnh" id="ufcnh" placeholder="UF" value="{{$c->ufcnh}}"></li>
																								</div>

																								<hr>






																								{{-- <div class="form-group">
																									<label for = "cnh">Número CNH</label>
																									<input type="text" class="form-control" name="cnh" id="cnh" placeholder="CNH">
																								</div> --}}


																								<div class="form-group">
																									<li><strong> NUMERO DA CNH :&nbsp;&nbsp;&nbsp;</strong><span > </span>
																										<input type="text" class="form-control" name="cnh" id="cnh" placeholder="CNH"value="{{$c->cnh}}">
																									</li>
																								</div>
																								<hr>

																								{{--
																									<div class="form-group">
																										<label for="sobre">Objetivos</label>
																										<textarea class="form-control" id="sobre" rows="3" name="sobre"></textarea>
																									</div> --}}

																									<div class="form-group">
																										<li><strong> OBJETIVOS :&nbsp;&nbsp;&nbsp;</strong><span > </span>
																											<textarea class="form-control" id="sobre" rows="3" name="sobre" value="{{$c->sobre}}"></textarea>
																										</li>
																									</div>
																									<hr>



																									{{--
																										<div class="form-group">
																											@if(Auth::user()->foto != null)
																											<img src="{{url('storage/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}" style="max-width: 50px;">
																											@endif
																											<label for = "foto">Foto</label>
																											<input type="file" class="form-control-file" id="foto" name="foto" file_extension=".jpg">
																										</div> --}}


																										<div class="form-group">
																											@if(Auth::user()->foto != null)
																											<img src="{{url('storage/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}" style="max-width: 50px;">
																											@endif
																											<li><strong>FOTO:&nbsp;&nbsp;&nbsp;</strong><span > </span>

																												{{-- observação....... --}}
																												<input type="file" class="form-control-file" id="foto" name="foto" file_extension=".jpg"value="{{$c->idcurriculo}}">
																											</li>

																										</div>
																										<br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
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












































{{-- 
	<div class="card border">
		<div class= "card-body">  
			<h5>Editar Dados Pessoais</h5>
			<form action="/curriculo/{{$c->users_id}}" method="POST" enctype="multipart/form-data">
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
							<input type="text" class="form-control" maxlength="11" name="cpf" id="cpf" value="{{$c->cpf}}" placeholder="CPF" >
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "rg">RG</label>
							<input type="text" class="form-control" maxlength="11" name="rg" id="rg" placeholder="RG" value="{{$c->rg}}">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "ctps">CTPS</label>
							<input type="text" class="form-control" name="ctps" id="ctps" placeholder="CTPS" value="{{$c->ctps}}">
						</div>
					</div>					
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="pretsalarial">Pretensão Salarial</label>
							<input type="text" class="form-control" placeholder="Ex.:9999,99" name="pretsalarial" id="pretsalarial" value="{{str_replace('.',',',$c->pretsalarial)}}">
						</div>
					</div>
    				<div class="col">
						<div class="form-group">
							<label for="dtnascimento">Data de Nascimento</label>
							<input type="text" class="form-control" placeholder="Ex.: dd/mm/aaaa" name="dtnascimento" id="dtnascimento" value="{{date_format(new DateTime($c->dtnascimento), 'd/m/Y')}}">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="genero">Gênero</label>
							<select class="custom-select" id="genero" name="genero" value="{{$c->genero}}"
								>
							   <option value = "">Selecionar</option>
							   <option value="1">Feminino</option>
							   <option value="2">Masculino</option>
							   <option value="3">Prefiro não informar</option>
							</select>						  
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for = "nomemae">Nome da mãe</label>
							<input type="text" class="form-control" name="nomemae" id="nomemae" placeholder="Nome da mãe" value="{{$c->nomemae}}">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "nomepai">Nome do pai</label>
							<input type="text" class="form-control" name="nomepai" id="nomepai" placeholder="Nome do pai" value="{{$c->nomepai}}">
						</div>
					</div>
				</div>
				<div class="row">
    				<div class="col">
						<div class="form-group">
							<label for="dfisico">Deficiente físico?</label>
							<select class="custom-select" id="dfisico" name="dfisico" value="{{$c->dfisico}}">
							   <option value = "" selected>Selecionar</option>
							   <option value="1">Sim</option>
							   <option value="2">Não</option>
							</select>						  
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="nacionalidade">Nacionalidade</label>
							<select class="custom-select" id="nacionalidade" name="nacionalidade" value="{{$c->nacionalidade}}">
							   <option value = "" selected>Selecionar</option>
							   <option value="1">Brasileira</option>
							   <option value="2">Outra</option>
							</select>						  
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="naturalidade">Naturalidade</label>
								<select class="custom-select" id="naturalidade" name="naturalidade" value="{{$c->naturalidade}}">
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
							<input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="Telefone 1" value="{{$c->telefone1}}">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "telefone2">Telefone 2</label>
							<input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="Telefone 2" value="{{$c->telefone2}}">
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for = "estadocivil">Estado Civil</label>
							<select class="custom-select" id="estadocivil" name="estadocivil" value="{{$c->estadocivil}}">
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
							<select class="custom-select" id="catcnh" name="catcnh" value="{{$c->catcnh}}">
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
							<input type="text" class="form-control" name="ufcnh" id="ufcnh" placeholder="UF" value="{{$c->ufcnh}}">
						</div>
					</div>					
					<div class="col">
						<div class="col">
							<div class="form-group">
								<label for = "cnh">Número CNH</label>
								<input type="text" class="form-control" name="cnh" id="cnh" placeholder="CNH" value="{{$c->cnh}}">
							</div>
						</div>
					</div>
				</div>				    				
				<div class="form-group">
					<label for="sobre">Objetivos</label>						
					<textarea class="form-control" id="sobre" rows="3" name="sobre" 
					value="{{$c->sobre}}"></textarea>
				</div>
				

				<div class="form-group">
					@if(Auth::user()->foto != null)
						<img src="{{url('storage/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}" style="max-width: 50px;">
					@endif
				    <label for = "foto">Foto</label>
				    <input type="file" class="form-control-file" id="foto" name="foto" file_extension=".jpg">
				 </div>
				  <input type="hidden" id="id" name="idcurriculo" value="{{$c->idcurriculo}}">
				<br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
				<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
			</form>
		</div>
	</div> --}}

@endsection