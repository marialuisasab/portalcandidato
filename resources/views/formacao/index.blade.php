@extends('adminlte::page')

@section('content')
  <div class="card border">
    <div class= "card-body"> 
      
      <div class="row">  
        <div class="col-10"><h5>Formação Acadêmica e Cursos Complementares</h5></div>
        <div class="col-2"><a href="/curso/novo" class="btn btn-sm btn-primary"> Novo </a></div>
      </div>

      @foreach($cursos as $c)
      <div class="container px-lg-5">
          <div class="row mx-lg-n5">
            <div class="col py-3 px-lg-5">             
              <p>Nome do curso: <b>{{$c->nome}}</b></p>
              @if($c->escolaridade === 1)
                <p>Nível: <b>{{Helper::getNivel($c->nivel_idnivel)}}</b> </p> 
                <p>Área: <b>{{Helper::getArea($c->area_idarea)}}</b> </p> 
                @if($c->periodo)                      
                  <p>Período: <b>{{$c->periodo}}</b></p>
                @endif
              @else        
                <p>Categoria: <b>{{Helper::getCategoria($c->categoria_idcategoria)}}</b></p>
              @endif 
              <p>Data de Início: <b>{{Helper::getData($c->dtinicio)}}</b></p> 
              @if($c->dtfim)                
                <p>Data de Conclusão: <b>{{Helper::getData($c->dtfim)}}</b></p> 
              @endif
            </div>
             <div class="col py-3 px-lg-5">   
              <a href="/curso/editar/{{$c->idcurso}}" class="btn btn-sm btn-primary"> Editar </a>      
              <a href="/curso/excluir/{{$c->idcurso}}" class="btn btn-sm btn-danger"> Excluir </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
