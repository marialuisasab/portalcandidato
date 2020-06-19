@extends('adminlte::page')

@section('content')
  <div class="card border">
    <div class= "card-body">       
      <div class="row">  
        <div class="col-10"><h5>Redes Sociais</h5></div>
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
@endsection
