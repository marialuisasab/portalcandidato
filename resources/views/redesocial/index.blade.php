@extends('adminlte::page')

{{-- importação do jquery --}}
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> --}}
<script src="/vendor/jquery/jquery.min.js">
</script>

{{-- importação do arquivo JS --}}
<script src="/js/Habilidade/habilidade.js"></script>
@section('content')
@section('content')



@include('flash::message')
<div class="container">



  <div class="row">

    <div class="col-xs-1 col-md-1">


    </div>

    <div class="col-xs-10 col-md-10">

      <div id="accordion" style="margin-top: 40px;">

        <div class="card-border-light">
          <div class="card-header" id="headingTwo" style="background-color: white;">
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <h2 class="mb-0" style="color:dodgerblue; font-size: 25px;">
                    Redes Sociais
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-hashtag fa-stack-1x fa-inverse"></i>
                    </span>
                  </h2>
                </div>
                <div class="col-xs-8 col-md-8" style=" text-align:end; margin-left: auto;">
                  <div class="btn-group btn-sm" role="group">
                    @if(count($redes)==0)
                    <button class=" btn btn-primary btn-sm">
                      <a style="color:white;" href="/redesocial/novo">Adicionar
                        <span class="fa fa-plus" style="padding-left:15px;"></span></a>
                    </button>
                    @else
                    <button class=" btn btn-primary btn-sm">
                      <a style="color:white;" href="/redesocial/editar/{{Helper::getIdCurriculo()}}">Editar
                        <span class="fa fa-edit" style="padding-left:15px;"></span></a>
                    </button>
                    @endif
                    <button class=" btn btn-secondary btn-sm">
                      <a style="color: white;" href="/experiencias">Voltar<span class="fas fa-undo"
                          style="padding-left:15px;"></span></a>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              @if(count($redes)==0)
              <div class="card-footer" style="background-color: white;">
                <h5 style="color:red;text-align:center;">
                  Clique em 'Adicionar' para inserir suas redes sociais, ou prossiga para as 'Vagas Abertas'
                </h5>
              </div>
              @endif
              @foreach($redes as $rs)
              <div class="container">
                <div class="row" style="margin-top: 25px;">
                  <div class="col-sm">
                    <ul></ul>
                    <ul style="list-style-type: none; margin-right: auto;">
                      <li>
                        <strong>{{Helper::getRedeCurriculo($rs->redesocial_idredesocial)}}:&nbsp;&nbsp;&nbsp;
                        </strong>
                        @if($rs->link == null)
                        <span style="color: red;">Não informado</span>
                        @else
                        {{$rs->link}}
                        @endif
                      </li>
                      <hr>
                    </ul>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="form-group" style="text-align: center;">
            <button class=" btn btn-secondary" type="button">
              <a href="/home" style="color: white;">Início<span class="fas fa-home"
                  style="padding-left: 5px; color:white;"></span></a>
            </button>
            <button class="btn btn-success" title="Vagas">
              <a href="/vagas" style="color:white;">Vagas Abertas</a>
              <span class="fas fa-bullhorn" style="padding-left: 5px; color:white;"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-1 col-md-1"></div>
  </div>
</div>

@endsection