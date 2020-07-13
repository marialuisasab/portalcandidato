@extends('adminlte::page')
{{-- importação do jquery --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

{{-- link do javascript --}}
<script src="/js/vagas/vagas.js"></script>
@section('content')

@include('flash::message')
<div class="container">
  <div class="row">
    <div class="col-xs-1 col-md-1"></div>
    <div class="col-xs-10 col-md-10">
      <div id="accordion" style="margin-top: 40px;">
        <div class="card-border-light">
          <div class="card-header" id="headingTwo" style="background-color: white;">
            <div class="container">
              <div class="row">
                <div class="col-">
                  <h2 class="mb-0" style="color:dodgerblue;">
                    Sobre a vaga
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-tie fa-stack-1x fa-inverse"></i>
                    </span>
                  </h2>
                </div>
                <div class="col-xs-8 col-2" style="text-align:end; margin-left: auto;">
                  <div class="btn-group" role="group">
                    {{-- <button class=" btn btn-primary">
                      <a href="/experiencia/novo" style="color: white;">
                        Adicionar<span class="fa fa-plus" style="padding-left: 15px;"></span>
                      </a>
                    </button>
                    <button class=" btn btn-success">
                      <a style=" color: white;" href="/habilidades">
                        Próximo<span class="fas fa-forward" style="padding-left:15px;"></span>
                      </a>
                    </button> --}}
                    <button class=" btn btn-secondary btn-sm" style="margin-top: 15px;">
                      <a style="color: white;" href="/vagas">
                        Voltar<span class="fas fa-undo" style="padding-left: 10px; font-size:12px;"></span>
                      </a>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
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
                        {{$vaga->titulo}}
                      </li>
                      <hr>
                      <li><strong> DATA DE PUBLICAÇÃO DA VAGA:&nbsp;&nbsp;&nbsp;</strong>
                        {{Helper::getData($vaga->dtinicio)}}
                      </li>
                      <hr>
                      <li><strong> PRAZO DE ENCERRAMENTO:&nbsp;&nbsp;&nbsp;</strong>
                        {{Helper::getData($vaga->dtprazo)}}
                      </li>
                      <hr>
                      <li><strong> LOCAL:&nbsp;&nbsp;&nbsp;</strong>
                        {{$vaga->local}}
                      </li>
                      <hr>
                      <li><strong> QUANTIDADE:&nbsp;&nbsp;&nbsp;</strong>
                        {{$vaga->quant}}
                      </li>
                      <hr>
                      <li><strong> DESCRIÇÃO:&nbsp;&nbsp;&nbsp;</strong>
                        {{$vaga->descricao}}
                      </li>
                      <hr>
                      <li><strong> REQUISITOS:&nbsp;&nbsp;&nbsp;</strong>
                        {{$vaga->requisitos}}
                      </li>
                      <hr>
                      <li><strong> TIPO DE VAGA:&nbsp;&nbsp;&nbsp;</strong>
                        {{$vaga->tpvaga}}
                      </li>
                      @if($vaga->pcd == 1)
                      <hr>
                      <li>&nbsp;&nbsp;&nbsp;
                        DESTINADA A PESSOAS COM DEFICIÊNCIA
                      </li>
                      @endif
                    </ul>
                  </div>
                </div>
                <div class="row" style="margin-top: 25px; text-align:center;">
                  <div class="col-sm">
                    <button class=" btn btn-primary" value="{{$vaga->idvaga}}" id="idcandidatar">
                      <a style="color:white;" href="/vaga/candidatar/{{$vaga->idvaga}}">
                        Quero me candidatar!<span class="fa fa-check-square" style="padding-left: 15px;"></span>
                      </a>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class=" col-xs-1 col-md-1">
    </div>
  </div>
</div>
@endsection