@extends('adminlte::page')

<link rel="stylesheet" href="/css/indexCurriculo.css">



@section('content_header')
{{-- 
<nav aria-label="Navegação de página exemplo">
  <ul class="pagination justify-content-end">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Visualizar Currículo</a>
    </li>
    <li class="page-item"><a class="page-link" href="/curriculo/editar/{{Auth::user()->id}}">Editar Dados Pesoais</a></li>
    <li class="page-item"><a class="page-link" href="#">Editar Endereço</a></li>
    <li class="page-item"><a class="page-link" href="#">Editar Formação e Cursos</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Próximo</a>
    </li>
  </ul>
</nav> --}}

@endsection

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
				<div class="col-xs-3 col-md-3">
 <h2 class="mb-0">
        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        Dados Pessoais
          <span class="fa-stack fa-sm">
            <i class="fas fa-circle fa-stack-2x"></i>
            <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
          </span>
		</button>  
	  </h2>
	
				</div>

				<div class="col-xs-8 col-md-6" style="margin-left: auto;">
				<div class="btn-group " role="group" aria-label="" style="margin-left: auto;">

				 
					<button class=" btn btn-link">
						<a href="/curriculo/editar/{{Auth::user()->id}}" >Editar</a>
						<span class="fa fa-edit"  style="font-size: 25px; text-align: center;"></span>
					
					</button>

				

				
		
					<button class=" btn btn-link" style="color" type="cancel">
										<a href="/home" >Voltar</a>
										<span class="fas fa-undo"  style="font-size: 25px; text-align: center;"></span>

									</button>
				</div>
			</div>
			</div>
		</div>
     
	  
	
		 
    </div>
    <div id="collapseOne"  class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body" style="box-sizing: border-box;">
		 	@foreach($candidato as $candDados)
		<ul style="list-style-type: none;">
			
			@if(Auth::user()->foto != null)
		  <h2> <img src="{{url('storage/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}" style="max-width: 120px; border-radius: 50%;">	
			</h2>
			@else
			<h2> <img class="profile-user-img img-responsive img-circle" src="" alt="Usuário sem foto" style="color: red;">	
			</h2>
			<p></p>
			@endif
		  <hr>
		  

		  
		<li><strong> NOME:&nbsp;&nbsp;&nbsp;</strong> {{Auth::user()->name}}
		 </li>
		<hr>


			
		<li><strong> EMAIL:&nbsp;&nbsp;&nbsp;</strong> {{Auth::user()->email}}</li>
		<hr>
          

		  <li><strong> DATA DE NASCIMENTO:&nbsp;&nbsp;&nbsp;</strong>{{date_format(new DateTime($candDados->dtnascimento), 'd/m/Y')}}</li>
		  
		<hr>

		@if(($candDados->genero != null)&& ($candDados->genero =='M'))
     	  <li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong>Masculino</li>
		   @elseif(($candDados->genero != null)&& ($candDados->genero =='F'))
		    <li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong>Feminino</li>
		   @else
		   <li><strong> GENERO:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não cadastrado!</span></li>
		   @endif
		<hr>


		   @if($candDados->nomemae != null)
		<li><strong> NOME DA MÃE:&nbsp;&nbsp;&nbsp;</strong> {{$candDados->nomemae}}</li>
		 @else
		 <li><strong> NOME DA MÃE:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não cadastrado!</span></li>
		   @endif

		<hr>


		     @if($candDados->nomepai != null)
		  <li><strong> NOME DO PAI:&nbsp;&nbsp;&nbsp;</strong>  {{$candDados->nomepai}}</li>
		  @else
		 <li><strong> NOME DA PAI:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não cadastrado!</span></li>
		   @endif
		<hr>



		     @if(($candDados->dfisico != null) && ($candDados->dfisico == '1'))
		  <li><strong> DEFICIENTE FISÍCO:&nbsp;&nbsp;&nbsp;</strong> Sim</li>
		  @elseif(($candDados->dfisico != null) && ($candDados->dfisico == '2'))
		  <li><strong> DEFICIENTE FISÍCO:&nbsp;&nbsp;&nbsp;</strong> Não</li>
		 <li><strong>Não Informado!&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não cadastrado!</span></li>
		 @endif

		<hr>
{{-- 
		<li style="word-break: break-word;"><strong> dfisico:&nbsp;&nbsp;&nbsp;</strong> {{$candDados->dfisico}}</li>
		<hr>
		 --}}

		
		  <li style="word-break: break-word;"><strong> OBJETIVOS:&nbsp;&nbsp;&nbsp;</strong> {{$candDados->sobre}}</li>
		<hr>
		

		  <li><strong> PRETENÇÃO SALARIAL:&nbsp;&nbsp;&nbsp;</strong> R${{$candDados->pretsalarial}},00</li>
		<hr>


		  <li><strong> TELEFONE(PRINCIPAL):&nbsp;&nbsp;&nbsp;</strong> {{$candDados->telefone1}}</li>
		<hr>


		  <li><strong> TELEFONE(2ºOPÇÃO):&nbsp;&nbsp;&nbsp;</strong> {{$candDados->telefone2}}</li>
		<hr>


		  <li><strong> CPF:&nbsp;&nbsp;&nbsp;</strong> {{$candDados->cpf}}</li>
		<hr>



		  <li><strong> CARTEIRA DE IDENTIFICAÇÃO(RG):&nbsp;&nbsp;&nbsp;</strong>  {{$candDados->rg}}</li>
		<hr>



		@if(($candDados->catcnh != null)&&($candDados->catcnh =='A'))
		 <li><strong>CATEGORIA DA CNH::&nbsp;&nbsp;&nbsp;</strong>A</li>
		 @elseif(($candDados->catcnh != null)&&($candDados->catcnh =='B'))
		 <li><strong>CATEGORIA DA CNH::&nbsp;&nbsp;&nbsp;</strong>B</li>
		 @elseif(($candDados->catcnh != null)&&($candDados->catcnh =='C'))
		 <li><strong>CATEGORIA DA CNH::&nbsp;&nbsp;&nbsp;</strong>C</li>
		 @elseif(($candDados->catcnh != null)&&($candDados->catcnh =='D'))
		 <li><strong>CATEGORIA DA CNH::&nbsp;&nbsp;&nbsp;</strong>D</li>
		 @elseif(($candDados->catcnh != null)&&($candDados->catcnh =='E'))
		 <li><strong>CATEGORIA DA CNH::&nbsp;&nbsp;&nbsp;</strong>E</li>
		 @else
			<li><strong>CATEGORIA DA CNH:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não cadastrado!</span></li>
		 @endif
		 <hr>


		  <li><strong> CARTEIRA DE HABILITAÇÃO (Nº CNH):&nbsp;&nbsp;&nbsp;</strong> {{$candDados->cnh}}</li>
		<hr>

             @if($candDados->ufcnh != null)
		  <li><strong> UF DA CNH:&nbsp;&nbsp;&nbsp;</strong>{{$candDados->ufcnh}}</li>
		  @else
			<li><strong> UF DA CNH:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não cadastrado!</span></li>
			@endif
		<hr>




		  @if($candDados->nacionalidade != null)
		  <li><strong> NACIONALIDADE:&nbsp;&nbsp;&nbsp;</strong>{{$candDados->nacionalidade}}</li>
		  @else
		   <li><strong> NACIONALIDADE:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não cadastrado!</span></li>
		   @endif
		<hr>

  
		   @if($candDados->naturalidade != null)
		  <li><strong> NATURALIDADE:&nbsp;&nbsp;&nbsp;</strong>{{$candDados->naturalidade}}</li>
		  @else
		   <li><strong> NATURALIDADE:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não cadastrado!</span></li>
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
		   <li><strong> ESTADO CIVIL :&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"> Não cadastrado!</span></li>
		   @endif
		<hr>

        
		  



		</ul>
		@endforeach
      </div>
    </div>
  </div>
  <div class="card">
   <div class="card-header" id="headingTwo" style="background-color: aliceblue;">
		<div class="container" >
			<div class="row">
				<div class="col-sm">
 <h2 class="mb-0">
        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Endereço
          <span class="fa-stack fa-sm">
            <i class="fas fa-circle fa-stack-2x"></i>
            <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
          </span>
		</button>  
	  </h2>
	
				</div>

				<div class="col-sm">
				 
					<button class=" btn btn-link">
						<a href="/curriculo/editar/{{Auth::user()->id}}" >Editar</a>
						<span class="fa fa-edit"  style="font-size: 25px; text-align: center;"></span>
					
					</button>

           
       
				</div>
			</div>
		</div>
     
	  
	
		 
    </div>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <ul>
          <li>Informatics</li>
          <li>Mathematics</li>
          <li>Greek</li>
          <li>Biostatistics</li>
          <li>English</li>
          <li>Nursing</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
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
  </div>
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