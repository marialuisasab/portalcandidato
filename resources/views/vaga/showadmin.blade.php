@extends('adminlte::page')
{{-- importação do jquery --}}

<!--<script src="/vendor/jquery/jquery.min.js"></script>-->
<script src="/vendor/jquery/jquery.js"></script>

{{-- link do javascript --}}
<script src="/js/vagas/vagas.js"></script>
<script src="/js/Admin/admin.js"></script>

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
                    {{$vaga->titulo}}
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-tie fa-stack-1x fa-inverse"></i>
                    </span>
                  </h2>
                </div>
                <div class="col-xs-8 col-md-8" style=" text-align:end; margin-left: auto;">
                  <div class="btn-group btn-sm" role="group">
                    @if(is_null($vaga->dtfim))
                      <button class=" btn btn-primary btn-sm" style="margin-top: 15px;">
                        <a href="/editarvaga/{{$vaga->idvaga}}" style="color: white;">
                          Editar<span class="fa fa-edit" style="padding-left: 15px;"></span>
                        </a>
                      </button>
                      
                      <button class=" btn btn-danger btn-sm" style="margin-top: 15px;">
                        <a style=" color: white;" href="/encerrar/{{$vaga->idvaga}}">
                          Encerrar Vaga<span class="fas fa-window-close" style="padding-left:15px;"></span>
                        </a>
                      </button>
                    @endif
                    <button class=" btn btn-secondary btn-sm" style="margin-top: 15px;">
                      <a style="color: white;" href="{{route('listar')}}">
                        Voltar<span class="fas fa-undo" style="padding-left: 10px; font-size:15px;"></span>
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
                
                <div class="row" style="margin-top: 25px;">
                  <div class="col-sm">
                    <ul></ul>
                    <ul style="list-style-type: none; margin-right: auto;">
                      <li><strong> TÍTULO:&nbsp;&nbsp;&nbsp;</strong>
                        {{$vaga->titulo}}
                      </li>
                      <hr>
                      <li><strong> STATUS:&nbsp;&nbsp;&nbsp;</strong>
                        {{Helper::getStatusVaga($vaga->status)}}
                      </li>
                      <hr>
                      <li><strong> DATA DE PUBLICAÇÃO DA VAGA:&nbsp;&nbsp;&nbsp;</strong>
                        {{Helper::getData($vaga->dtinicio)}}
                      </li>
                      <hr>
                      <li><strong> PREVISÃO DE ENCERRAMENTO:&nbsp;&nbsp;&nbsp;</strong>
                        {{Helper::getData($vaga->dtprazo)}}
                      </li>
                      @if(!is_null($vaga->dtfim))
                        <hr>
                        <li><strong> DATA DE ENCERRAMENTO DA VAGA:&nbsp;&nbsp;&nbsp;</strong>
                        {{Helper::getData($vaga->dtfim)}}
                      </li>
                      @endif
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
                        @if ($vaga->tpvaga == 1)
                          Efetiva
                        @else
                          Temporária
                        @endif

                      </li>
                      @if($vaga->pcd == 1)
                      <hr>
                      <li><strong>DESTINADA A PESSOAS COM DEFICIÊNCIA&nbsp;&nbsp;&nbsp;</strong></li>                   
                      @endif
                      <hr>
                    </ul>
                  </div>
                </div>
                
                @if(count($candidatos)>0)
                  <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Candidato</th>
                            <th scope="col">Status</th>
                            <th scope="col">Data da candidatura</th>
                            <th scope="col">Observação</th>
                            <th scope="col">Opções</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($candidatos as $c)
                            <tr>
                              <th>{{$c->name}}</th>
                              <td>{{Helper::getStatusCandidatura($c->status)}}</td>
                              <td>{{Helper::getData($c->dtcandidatura)}}</td> 
                              <td>{{$c->observ}}</td> 
                              <td>
                                <a href="#" class="badge badge-primary">Visualizar Currículo</a><br>
                                <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#exampleModal">Incluir Observação</a><br>       
                                @if($c->status == 1)                                           
                                  <a href="/classificar/2/{{$vaga->idvaga}}/{{$c->curriculo_idcurriculo}}" class="badge badge-success">Classificar</a><br>   
                                  <a href="/classificar/3/{{$vaga->idvaga}}/{{$c->curriculo_idcurriculo}}" class="badge badge-danger">Desclassificar</a><br>
                                @endif             
                              </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Processo seletivo do(a) {{$c->name}}:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="/editarObs" method="POST">       
                                    @csrf
                                    <div class="modal-body">                                                                     
                                        <div class="form-group">         
                                          <label for="message-text" class="col-form-label">Observações:</label>                               
                                          <textarea class="form-control" rows="4" name="observ" id="message-text">{{$c->observ}}</textarea>
                                        </div>
                                        <div class="form-group">  
                                          <input type="hidden" name="vaga" value="{{$vaga->idvaga}}">
                                          <input type="hidden" name="curriculo" value="{{$c->curriculo_idcurriculo}}">
                                        </div>
                                      
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Salvar</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- Fim modal-->
                          @endforeach
                        </tbody>
                      </table>
                      
                    </div>
                  @else
                  <div class="card-footer" style="text-align: center;">
                    <h5>Ninguém se inscreveu nesta vaga ainda!</h5>
                  </div>
                  @endif
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