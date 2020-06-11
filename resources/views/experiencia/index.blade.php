@extends('adminlte::page')

@section('content')
  <div class="card border">
    <div class= "card-body"> 
      
      <div class="row">  
        <div class="col-10"><h5>Experiência Profissional</h5></div>
        <div class="col-2"><a href="{{route('experiencia.novo')}}" class="btn btn-sm btn-primary"> Novo </a></div>
      </div>

      @foreach($experiencias as $e)
      <div class="container px-lg-5">
          <div class="row mx-lg-n5">
            <div class="col py-3 px-lg-5">             
              <p>Nome da empresa: <b>{{$e->empresa}}</b></p>
              <p>Data de início: <b>{{Helper::getData($e->dtinicio)}}</b></p>
              <p>Data de término: <b>{{Helper::getData($e->dtfim)}}</b></p>
              <p>Cargo: <b>{{$e->cargo}}</b></p>
              <p>Atividades: <b>{{$e->atividades}}</b></p>
            </div>
             <div class="col py-3 px-lg-5">   
              <a href="/experiencia/editar/{{$e->idexperiencia}}" class="btn btn-sm btn-primary"> Editar </a>      
              <a href="/experiencia/excluir/{{$e->idexperiencia}}" class="btn btn-sm btn-danger"> Excluir </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
