@extends('adminlte::page')

@section('content')
  <div class="card border">
    <div class= "card-body"> 
      
      <div class="row">  
        <div class="col-10"><h5>Habilidades e Ferramentas</h5></div>
        <div class="col-2"><a href="{{route('habilidade.novo')}}" class="btn btn-sm btn-primary"> Novo </a></div>
      </div>

      @foreach($habilidades as $i)
      <div class="container px-lg-5">
          <div class="row mx-lg-n5">
            <div class="col py-3 px-lg-5"> 
              <p>Categoria: <b>{{Helper::getTipoHab($i->tipo_idtipo)}}</b></p>            
              <p>Descrição: <b>{{$i->nome}}</b></p>
              <p>Nível: <b>              
                @switch($i->nivel)
                  @case(1)
                      Básico
                      @break
                  @case(2)
                      Intermediário
                      @break
                  @case(3)
                      Avançado
                      @break
                  @default
                      Default case...
                @endswitch

              </b></p>
            </div>
             <div class="col py-3 px-lg-5">   
              <a href="/habilidade/editar/{{$i->idhabilidade}}" class="btn btn-sm btn-primary"> Editar </a>      
              <a href="/habilidade/excluir/{{$i->idhabilidade}}" class="btn btn-sm btn-danger"> Excluir </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
