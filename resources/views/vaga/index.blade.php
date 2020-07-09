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
                    Vagas Abertas
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
	        @if(count($vagas)>0)
	            <div class="card-body">
	              @foreach($vagas as $v)

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
								{{$v->titulo}}
							</li>
							<hr>
							<li><strong> DATA DE PUBLICAÇÃO DA VAGA:&nbsp;&nbsp;&nbsp;</strong>						{{Helper::getData($v->dtinicio)}}
							</li>
							<hr>
							<li><strong> PRAZO DE ENCERRAMENTO:&nbsp;&nbsp;&nbsp;</strong> 
								{{Helper::getData($v->dtprazo)}}
							</li>
							<hr>
							<li><strong> QUANTIDADE:&nbsp;&nbsp;&nbsp;</strong> 	
      							{{$v->quant}}
      						</li>
      						<hr>
							<li><strong> LOCAL:&nbsp;&nbsp;&nbsp;</strong> 	
								{{$v->local}}
							</li>                                            
	                    </ul>
	                  </div>
	                </div>
	                <div class="row" style="margin-top: 25px; text-align:center;">
	                  <div class="col-sm">                   
	                    <button class=" btn btn-primary">
	                      	<a style="color:white;" href="/vaga/{{$v->idvaga}}">
	                      		Mais Informações<span class="fa fa-info-circle" style="padding-left: 15px;"></span>
	                    	</a>
	                    </button>
	                  </div>                  	
	                </div>
	              </div>
	              @endforeach
	            </div>
	        @else
	          <div class="card-footer">
	          	<h5>Não possuímos vagas abertas no momento! <br>Mantenha seu currículo atualizado e não deixe de verificar se há novas vagas.</h5>
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
