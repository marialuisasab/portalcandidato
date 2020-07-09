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
          <div class="card-header" id="headingTwo" style="background-color: white;">
            <div class="container">
              <div class="row">
                <div class="col-xs-5 col-md-5">
                  <h2 class="mb-0" style="color:dodgerblue; text-align: center;">

                    Habilidades e Idiomas
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-language fa-stack-1x fa-inverse"></i>
                    </span>

                  </h2>

                </div>


                <div class="col-xs-7 col-md-7" style="margin-top: 25px; text-align:end; margin-left: auto;">

                  <div class="btn-group" role="group">
                    <button class=" btn btn-primary" title="Adicionar Habilidade">
                      <a href="{{route('habilidade.novo')}}" style="color: white;">Adicionar<span class="fa fa-plus"
                          style="padding-left:15px;"></span> </a>
                    </button>

                    <button class=" btn btn-success" title="Cadastrar Redes Sociais">
                      <a style=" color: white;" href="redessociais">Proximo
                        <span class="fas fa-forward" style="padding-left:15px;"></span>
                      </a>
                    </button>

                    <button class=" btn btn-secondary" title="Voltar">
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
              @foreach($habilidades as $i)
              <div class="container">
                <div class="row" style="margin-top: 25px; text-align:center;">
                  <div class="col-sm">

                    <button class=" btn btn-primary" title="Editar Habilidade">
                      <a style="color:white;" href="/habilidade/editar/{{$i->idhabilidade}}">Editar
                        <span class="fa fa-edit" style="padding-left:15px;"></span></a>
                    </button>


                    <button class=" btn btn-danger" name="botaoexcluirhabil" value="{{$i->idhabilidade}}"
                      title="Excluir Habilidade">
                      <a style=" color:white;">Excluir<span class=" fa fa-trash-alt" style="padding-left:15px;"></span>
                      </a>
                    </button>

                  </div>
                </div>

                <div class="row" style="margin-top: 25px;">
                  <div class="col-sm">
                    <ul></ul>
                    <ul style="list-style-type: none; margin-right: auto;">
                      <li><strong> CATEGORIA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getTipoHab($i->tipo_idtipo)}}
                      </li>
                      <hr>
                      <li><strong> DESCRIÇÃO:&nbsp;&nbsp;&nbsp;</strong>{{$i->nome}}</li>
                      <hr>
                      <li><strong>NÍVEL:&nbsp;&nbsp;&nbsp;</strong>
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
                      </li>

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














{{-- 


<div class="card border">
  <div class="card-body">

    <div class="row">
      <div class="col-10">
        <h5>Habilidades e Ferramentas</h5>
      </div>
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
@endsection --}}