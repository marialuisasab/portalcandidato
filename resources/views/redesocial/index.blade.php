@extends('adminlte::page')

{{-- importação do jquery --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
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
          <div class="card-header" id="headingTwo" style="background-color: aliceblue;">
            <div class="container">
              <div class="row">
                <div class="col-xs-5 col-md-5">
                  <h2 class="mb-0" style="color:dodgerblue; text-align: center;">
                    Redes Sociais
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-hashtag fa-stack-1x fa-inverse"></i>
                    </span>
                  </h2>
                </div>
                <div class="col-xs-7 col-md-7" style="margin-top: 10px; text-align:end; margin-left: auto;">
                  <button class=" btn btn-primary">
                    <a style="color:white;" href="/redesocial/editar/{{Helper::getIdCurriculo()}}">Editar
                      <span class="fa fa-edit" style="padding-left:15px;"></span></a>
                  </button>
                  <button class=" btn btn-secondary">
                    <a style="color: white;" href="/experiencias">Voltar<span class="fas fa-undo"
                        style="padding-left:15px;"></span></a>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              @foreach($redes as $rs)
              <div class="container">
                <div class="row" style="margin-top: 25px;">
                  <div class="col-sm">
                    <ul></ul>
                    <ul style="list-style-type: none; margin-right: auto;">
                      <li>
                        <strong>{{Helper::getRedeCurriculo($rs->redesocial_idredesocial)}}:&nbsp;&nbsp;&nbsp;</strong>{{$rs->link}}
                      </li>
                      <hr>
                    </ul>
                  </div>
                </div>
              </div>
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





{{-- @extends('adminlte::page')

@section('content')
<div class="card border">
  <div class="card-body">
    <div class="row">
      <div class="col-10">
        <h5>Redes Sociais</h5>
      </div>
      <!--<div class="col-2"><a href="{{route('redesocial.novo')}}" class="btn btn-sm btn-primary"> Novo </a></div>-->
</div>
@foreach($redes as $rs)
<div class="container px-lg-5">
  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5">
      <p>{{Helper::getRedeCurriculo($rs->redesocial_idredesocial)}}: <b>{{$rs->link}}</b></p>
    </div>
  </div>
</div>
@endforeach
<div class="col py-3 px-lg-5">
  <a href="/redesocial/editar/{{Helper::getIdCurriculo()}}" class="btn btn-sm btn-primary"> Editar </a>
</div>
</div>
</div>
@endsection --}}