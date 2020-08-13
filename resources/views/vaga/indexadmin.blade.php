@extends('adminlte::page')
{{-- importação do jquery --}}

<script src="/vendor/jquery/jquery.min.js"></script>

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
                  <h2 class="mb-0" style="color:dodgerblue; font-size:25px;">
                    Vagas Abertas
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-tie fa-stack-1x fa-inverse"></i>
                    </span>
                  </h2>
                </div>
                <div class="col-xs-8 col-md-8" style=" text-align:end; margin-left: auto;">
                  <div class="btn-group btn-sm" role="group">
                    <button class=" btn btn-primary btn-sm" style="margin-top: 15px;">
                      <a style="color:white;" href="{{route('vaga.novo')}}">Adicionar
                        <span class="fa fa-plus" style="padding-left:15px;"></span></a>
                    </button>
                    <button class=" btn btn-secondary btn-sm" style="margin-top: 15px;">
                      <a style="color: white;" href="/home">Voltar<span class="fas fa-undo"
                          style="padding-left: 5px; color:white; font-size:9px;"></span>
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
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Título</th>
                      <th scope="col">Data de início</th>
                      <th scope="col">Previsão de encerramento</th>
                      <th scope="col">Data de encerramento</th>
                      <th scope="col">Status</th>
                      <th scope="col">Encerrada</th>
                      <th scope="col">Opções</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($vagas as $v)
                      <tr>
                        <th scope="row">
                          <a href="/detalhes/{{$v->idvaga}}">{{$v->titulo}}</a>
                        </th>
                        <td>{{Helper::getData($v->dtinicio)}}</td>                        
                        <td>{{Helper::getData($v->dtprazo)}}</td>
                        <td>{{Helper::getData($v->dtfim)}}</td>
                        <td>{{Helper::getStatusVaga($v->status)}}</td>
                        <td>@if(!is_null($v->dtfim))
                            <i class="fa fa-check" aria-hidden="true"></i>                          
                          @endif 
                        </td>
                        <td>
                          <a href="/detalhes/{{$v->idvaga}}" class="badge badge-success">Visualizar</a><br>
                          @if(is_null($v->dtfim))
                          <a href="/editarvaga/{{$v->idvaga}}" class="badge badge-secondary">Editar</a><br>
                          @endif
                          <a href="/excluirvaga/{{$v->idvaga}}" class="badge badge-danger">Excluir</a><br>
                          <a href="/copiarvaga/{{$v->idvaga}}"  class="badge badge-warning">Copiar esta vaga</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>


              </div>
             
           
            @else
            <div class="card-footer">
              <h5>Não possuímos vagas abertas no momento! <br>Mantenha seu currículo atualizado e não
                deixe de verificar se há novas vagas.</h5>
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