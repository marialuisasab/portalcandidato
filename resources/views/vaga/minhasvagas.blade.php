@extends('adminlte::page')

@section('content')

@include('flash::message')

<div class="container">
  <div class="row">
    <div class="col-xs-1 col-md-1"></div>
    <div class="col-xs-10 col-md-10">
      <div id="accordion" style="margin-top: 40px;">
        <div class="card-border-light">
          <div class="card-header" id="headingTwo" style="background-color: aliceblue;">

            <div class="container">
              <div class="row">
                <div class="col-xs-6 col-md-6">
                  <h2 class="mb-0" style="color:dodgerblue; ">
                    Minhas Vagas
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-tie fa-stack-1x fa-inverse"></i>
                    </span>
                  </h2>
                </div>
                <div class="col-xs-6 col-md-6" style="margin-top: 25px; text-align:end; margin-left: auto;">
                  <div class="btn-group" role="group">                    
                    <button class=" btn btn-success">
                      <a style=" color: white;" href="/habilidades">
                      	Próximo<span class="fas fa-forward"style="padding-left:15px;"></span>
                      </a>
                    </button>
                    <button class=" btn btn-secondary">
                      <a style="color: white;" href="/cursos">
                      	Voltar<span class="fas fa-undo"style="padding-left: 15px;"></span>
                      </a>
                    </button>
                  </div>
                </div>                
              </div>
            </div>

          </div>
          
	      <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
	        @if(count($processos)>0)
	            <div class="card-body">
	              @for($i = 0; $i < sizeof($processos);$i++)

	              <div class="container">
	                <!--<div class="row" style="margin-top: 25px; text-align:center;">
	                  <div class="col-sm">
	                    <button class=" btn btn-primary">
	                      	<a style="color:white;" href="/vaga/editar/$v->idvaga">
	                      		Editar
	                        	<span class="fa fa-edit" style="padding-left: 15px;"></span>
	                    	</a>
	                    </button>
	                    <button class=" btn btn-danger" name="botaoexcluir" value="/vaga/excluir/$v->idvaga">
	                      	<a style="color: white;">
	                      		Excluir<span class=" fa fa-trash-alt" style="padding-left:15px;"></span>
	                      	</a>
	                    </button>                   
	                  </div>                  	
	                </div>--> 

	                <div class="row" style="margin-top: 25px;">
	                  <div class="col-sm">
	                    <ul></ul>
	                    <ul style="list-style-type: none; margin-right: auto;">
	                    	<li><strong> TÍTULO:&nbsp;&nbsp;&nbsp;</strong> 
								{{$vagas[$i]->titulo}}							
							</li>
							<li><strong> DATA CANDIDATURA:&nbsp;&nbsp;&nbsp;</strong> 
      							{{Helper::getData($processos[$i]->dtcandidatura)}}
      						</li>
							<li><strong> STATUS NO PROCESSO SELETIVO:&nbsp;&nbsp;&nbsp;</strong> 
								@switch($processos[$i]->status)
								    @case(1)
								        Em andamento
								        @break
								    @case(2)
								        Classificado
								        @break
									@case(2)
								        Desclassificado
								        @break
								    @default
								        Em andamento
								@endswitch						
							</li>
											                                          
	                    </ul>
	                  </div>
	                </div>
	                <div class="row" style="margin-top: 25px; text-align:center;">
	                  <div class="col-sm">                   
	                    <button class=" btn btn-primary">
	                      	<a style="color:white;" href="#">
	                      		Mais Informações<span class="fa fa-info-circle" style="padding-left: 15px;"></span>
	                    	</a>
	                    </button>
	                  </div>                  	
	                </div>
	              </div>
	              @endfor
	            </div>
	        @else
	          <div class="card-footer">
	          	<h5>Você ainda não se candidatou a nenhuma vaga! <br>Mantenha seu currículo atualizado e não deixe de verificar as vagas abertas.</h5>
	          	<div class="row" style="margin-top: 25px; text-align:center;">
	                  <div class="col-sm">                   
	                    <button class=" btn btn-primary">
	                      	<a style="color:white;" href="/vagas">
	                      		Consultar Vagas Abertas<span class="fa fa-info-circle" style="padding-left: 15px;"></span>
	                    	</a>
	                    </button>
	                  </div>                  	
	                </div>
	          </div>
	        @endif
          </div>          
    	</div>
      </div>
    </div>
    <div class=" col-xs-1 col-md-1">
    </div>
  </div>
</div>

@endsection
